<?php

namespace DevOwl\RealCookieBanner\lite\settings;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\lite\MaxMindDatabase;
use DevOwl\RealCookieBanner\MyConsent;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\settings\CountryBypass as SettingsCountryBypass;
use DevOwl\RealCookieBanner\settings\TCF;
use DevOwl\RealCookieBanner\UserConsent;
use DevOwl\RealCookieBanner\Utils;
use WP_Error;
use WP_REST_Request;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
trait CountryBypass {
    /**
     * Save the state of currently active so we can update country database at toggle time.
     *
     * @var boolean
     */
    private $previousActive = null;
    // Documented in IOverrideGeneral
    public function overrideEnableOptionsAutoload() {
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_ACTIVE,
            \DevOwl\RealCookieBanner\settings\CountryBypass::DEFAULT_COUNTRY_BYPASS_ACTIVE,
            'boolval'
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_COUNTRIES,
            \DevOwl\RealCookieBanner\settings\CountryBypass::DEFAULT_COUNTRY_BYPASS_COUNTRIES
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_TYPE,
            \DevOwl\RealCookieBanner\settings\CountryBypass::DEFAULT_COUNTRY_BYPASS_TYPE
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_DB_DOWNLOAD_TIME,
            \DevOwl\RealCookieBanner\settings\CountryBypass::DEFAULT_COUNTRY_BYPASS_DB_DOWNLOAD_TIME,
            'strval'
        );
        add_action('RCB/Settings/Updated', [$this, 'updated_option_active'], 10, 2);
        add_filter('rest_pre_get_setting', [$this, 'rest_pre_get_setting'], 10, 3);
    }
    // Documented in IOverrideCountryBypass
    public function overrideRegister() {
        register_setting(
            \DevOwl\RealCookieBanner\settings\CountryBypass::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_ACTIVE,
            ['type' => 'boolean', 'show_in_rest' => \true]
        );
        // WP < 5.3 does not support array types yet, so we need to store serialized
        register_setting(
            \DevOwl\RealCookieBanner\settings\CountryBypass::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_COUNTRIES,
            ['type' => 'string', 'show_in_rest' => \true]
        );
        register_setting(
            \DevOwl\RealCookieBanner\settings\CountryBypass::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_TYPE,
            [
                'type' => 'string',
                'show_in_rest' => [
                    'schema' => [
                        'type' => 'string',
                        'enum' => [
                            \DevOwl\RealCookieBanner\settings\CountryBypass::TYPE_ALL,
                            \DevOwl\RealCookieBanner\settings\CountryBypass::TYPE_ESSENTIALS
                        ]
                    ]
                ]
            ]
        );
        register_setting(
            \DevOwl\RealCookieBanner\settings\CountryBypass::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_DB_DOWNLOAD_TIME,
            ['type' => 'string', 'show_in_rest' => \true]
        );
        $this->previousActive = $this->isActive();
    }
    // Documented in IOverrideCountryBypass
    public function probablyUpdateDatabase() {
        if (
            $this->isActive() &&
            \time() >
                get_option(\DevOwl\RealCookieBanner\settings\CountryBypass::OPTION_COUNTRY_DB_NEXT_DOWNLOAD_TIME, 0)
        ) {
            $this->updateDatabase();
        }
    }
    /**
     * A consent got created, let's save the user country to the associated consent.
     *
     * @param array $result
     */
    public function consentCreated($result) {
        global $wpdb;
        $country = \DevOwl\RealCookieBanner\lite\MaxMindDatabase::getInstance()->lookupCountryCode(
            \DevOwl\RealCookieBanner\Utils::getIpAddress()
        );
        if (!empty($country)) {
            $wpdb->update(
                $this->getTableName(\DevOwl\RealCookieBanner\UserConsent::TABLE_NAME),
                ['user_country' => $country],
                ['id' => $result['consent_id']]
            );
        }
    }
    /**
     * Add the country bypass metadata (like MaxMind DB download time) to the independent revision.
     *
     * @param array $arr
     */
    public function revisionArrayIndependent($arr) {
        $arr['countryBypassDbDownload'] = mysql2date('c', $this->getDatabaseDownloadTime(), \false);
        return $arr;
    }
    /**
     * Determines, if the current page request is outside our defined countries so
     * all cookies are automatically accepted.
     *
     * @param false|string $result
     * @param WP_REST_Request $request
     */
    public function dynamicPredecision($result, $request) {
        $isLighthouse = \preg_match('/chrome-lighthouse/i', $_SERVER['HTTP_USER_AGENT']);
        if ($result === \false && !$isLighthouse) {
            // Lookup for the current country and do not show banner if it is outside our defined countries
            $countries = $this->getCountries();
            $countryCode = \DevOwl\RealCookieBanner\lite\MaxMindDatabase::getInstance()->lookupCountryCode(
                \DevOwl\RealCookieBanner\Utils::getIpAddress()
            );
            if (!\is_string($countryCode) || \in_array(\strtoupper($countryCode), $countries, \true)) {
                // Skip custom bypass
                return \false;
            }
            $this->persistConsent(
                $this->getType(),
                $request->get_param('viewPortWidth'),
                $request->get_param('viewPortHeight')
            );
            return 'consent';
            // Through the above code we have ensured there is a cookie set, so we can use the current consent
        }
        return $result;
    }
    /**
     * Create the consent for the Custom Bypass.
     *
     * @param string $accept Can be `essentials` or `all`
     * @param int $viewPortWidth
     * @param int $viewPortHeight
     */
    protected function persistConsent($accept, $viewPortWidth, $viewPortHeight) {
        // Disable TCF for this user
        add_filter('RCB/Revision/Option/' . \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF, '__return_false');
        remove_filter('RCB/Revision/Array', [
            \DevOwl\RealCookieBanner\lite\settings\TcfRevision::getInstance(),
            'revisionArray'
        ]);
        remove_filter('RCB/Revision/Array/Independent', [
            \DevOwl\RealCookieBanner\lite\settings\TcfRevision::getInstance(),
            'revisionArrayIndependent'
        ]);
        // Simulate the new consent but also respect the previous one (e.g. opt-out to some cookies)
        $previousConsent = \DevOwl\RealCookieBanner\MyConsent::getInstance()->getCurrentUser();
        if ($previousConsent !== \false) {
            $newConsent = \DevOwl\RealCookieBanner\UserConsent::getInstance()->applyCustomDecisionFromPreviousConsent(
                $previousConsent['decision_in_cookie'],
                $accept,
                $accept === 'all' ? 'opt-out' : 'opt-in'
            );
        } else {
            $newConsent = \DevOwl\RealCookieBanner\UserConsent::getInstance()->validate($accept);
        }
        // Persist the new consent
        \DevOwl\RealCookieBanner\MyConsent::getInstance()->persist(
            $newConsent,
            \false,
            'none',
            $viewPortWidth,
            $viewPortHeight,
            wp_get_raw_referer(),
            0,
            null,
            0,
            null,
            \false,
            // The GDPR does not apply here, so we do not need to set a TCF string
            null,
            \DevOwl\RealCookieBanner\settings\CountryBypass::CUSTOM_BYPASS
        );
        remove_filter('RCB/Revision/Option/' . \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF, '__return_false');
        add_filter('RCB/Revision/Array', [
            \DevOwl\RealCookieBanner\lite\settings\TcfRevision::getInstance(),
            'revisionArray'
        ]);
        add_filter('RCB/Revision/Array/Independent', [
            \DevOwl\RealCookieBanner\lite\settings\TcfRevision::getInstance(),
            'revisionArrayIndependent'
        ]);
    }
    /**
     * Modify the countries list when it gets saved to the revision.
     */
    public function revisionOptionCountriesExpandPredefinedLists() {
        return \join(',', $this->getCountries());
    }
    // Documented in IOverrideCountryBypass
    public function updateDatabase($force = \false) {
        if ($this->isActive() || $force) {
            $license = \DevOwl\RealCookieBanner\Core::getInstance()
                ->getRpmInitiator()
                ->getPluginUpdater()
                ->getCurrentBlogLicense();
            $result = \DevOwl\RealCookieBanner\lite\MaxMindDatabase::getInstance()->download([
                'licenseKey' => $license->getActivation()->getCode(),
                'clientUuid' => $license->getUuid()
            ]);
            // Persist the timestamp when it should get automatically be updated
            if ($result === \true) {
                update_option(
                    \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_DB_DOWNLOAD_TIME,
                    current_time('mysql')
                );
                update_option(
                    \DevOwl\RealCookieBanner\settings\CountryBypass::OPTION_COUNTRY_DB_NEXT_DOWNLOAD_TIME,
                    self::getNextUpdateTime()
                );
            }
            return $result;
        }
        return new \WP_Error(
            'rcb_update_country_db_not_active',
            __('This functionality is currently not available.', RCB_TD),
            ['status' => 500]
        );
    }
    // Documented in IOverrideCountryBypass
    public function clearDatabase() {
        \DevOwl\RealCookieBanner\lite\MaxMindDatabase::getInstance()->clear();
        update_option(\DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_DB_DOWNLOAD_TIME, '');
        update_option(\DevOwl\RealCookieBanner\settings\CountryBypass::OPTION_COUNTRY_DB_NEXT_DOWNLOAD_TIME, '');
    }
    /**
     * The option to enable Country Bypass got updated, let's automatically download the country database.
     *
     * @param WP_REST_Response $response
     * @param WP_REST_Request $request
     */
    public function updated_option_active($response, $request) {
        $active = $request->get_param(\DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_ACTIVE);
        // Clear database if Country Bypass gets disabled
        if ($active === \false && $this->previousActive) {
            $this->clearDatabase();
        }
        // Check if switch from "Disabled" to "Enabled" is done and automatically download database
        if (
            $active === \true &&
            !$this->previousActive &&
            \DevOwl\RealCookieBanner\Core::getInstance()->isLicenseActive()
        ) {
            $this->updateDatabase(\true);
        }
        // Output as ISO strings
        $response->data[
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_DB_DOWNLOAD_TIME
        ] = mysql2date('c', $this->getDatabaseDownloadTime(), \false);
        return $response;
    }
    /**
     * Output the download time as ISO string instead of mysql formatted string.
     *
     * @param mixed  $result Value to use for the requested setting. Can be a scalar
     *                       matching the registered schema for the setting, or null to
     *                       follow the default get_option() behavior.
     * @param string $name   Setting name (as shown in REST API responses).
     * @param array  $args   Arguments passed to register_setting() for this setting.
     */
    public function rest_pre_get_setting($result, $name, $args) {
        if (
            !\in_array(
                $args['option_name'],
                [\DevOwl\RealCookieBanner\settings\CountryBypass::DEFAULT_COUNTRY_BYPASS_DB_DOWNLOAD_TIME],
                \true
            )
        ) {
            return $result;
        }
        $value = get_option($args['option_name'], $args['schema']['default']);
        return empty($value) ? null : mysql2date('c', $value, \false);
    }
    // Documented in IOverrideCountryBypass
    public function isActive() {
        return get_option(\DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_ACTIVE) &&
            \DevOwl\RealCookieBanner\Core::getInstance()->isLicenseActive();
    }
    // Documented in IOverrideCountryBypass
    public function getCountries() {
        $list = get_option(\DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_COUNTRIES);
        if (empty($list)) {
            return [];
        }
        $result = [];
        $list = \explode(',', $list);
        // Expand predefined lists
        foreach ($list as $code) {
            if (\strlen($code) !== 2) {
                $predefinedList =
                    \DevOwl\RealCookieBanner\settings\CountryBypass::PREDEFINED_COUNTRY_LISTS[$code] ?? [];
                $result = \array_merge($result, $predefinedList);
            } else {
                $result[] = $code;
            }
        }
        return $result;
    }
    // Documented in IOverrideCountryBypass
    public function getType() {
        return get_option(
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_TYPE,
            \DevOwl\RealCookieBanner\settings\CountryBypass::DEFAULT_COUNTRY_BYPASS_TYPE
        );
    }
    // Documented in IOverrideCountryBypass
    public function getDatabaseDownloadTime() {
        return get_option(
            \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_DB_DOWNLOAD_TIME,
            \DevOwl\RealCookieBanner\settings\CountryBypass::DEFAULT_COUNTRY_BYPASS_DB_DOWNLOAD_TIME
        );
    }
    /**
     * Changes to the country database are published daily, but we do this only once a week.
     */
    public static function getNextUpdateTime() {
        return \strtotime('next sunday 11:59 PM');
    }
}
