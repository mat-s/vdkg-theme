<?php

namespace DevOwl\RealCookieBanner\lite\settings;

use DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\Iso3166OneAlpha2;
use DevOwl\RealCookieBanner\Assets;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\lite\view\TcfBanner;
use DevOwl\RealCookieBanner\settings\Consent;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\settings\Revision;
use DevOwl\RealCookieBanner\settings\TCF as SettingsTCF;
use DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants;
use WP_Error;
use WP_REST_Request;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
trait TCF {
    /**
     * Save the state of currently active so we can calculate the timestamps for (first) accepted time.
     *
     * @var boolean
     */
    private $previousActive = null;
    // Documented in IOverrideGeneral
    public function overrideEnableOptionsAutoload() {
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF,
            \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF,
            'boolval'
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_PUBLISHER_CC,
            \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_PUBLISHER_CC
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_FIRST_ACCEPTED_TIME,
            \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_FIRST_ACCEPTED_TIME,
            'strval'
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_ACCEPTED_TIME,
            \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_ACCEPTED_TIME,
            'strval'
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_SCOPE_OF_CONSENT,
            \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_SCOPE_OF_CONSENT,
            function ($value) {
                if (!\in_array($value, \DevOwl\RealCookieBanner\settings\TCF::ALLOWED_SCOPE_OF_CONSENT, \true)) {
                    return \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_SCOPE_OF_CONSENT;
                }
                return $value;
            }
        );
        \DevOwl\RealCookieBanner\settings\General::enableOptionAutoload(
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_GVL_DOWNLOAD_TIME,
            \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_GVL_DOWNLOAD_TIME,
            'strval'
        );
        add_action('RCB/Settings/Updated', [$this, 'updated_option_active'], 10, 2);
        add_filter('rest_pre_get_setting', [$this, 'rest_pre_get_setting'], 10, 3);
    }
    // Documented in IOverrideTCF
    public function overrideRegister() {
        register_setting(
            \DevOwl\RealCookieBanner\settings\TCF::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF,
            ['type' => 'boolean', 'show_in_rest' => \true]
        );
        register_setting(
            \DevOwl\RealCookieBanner\settings\TCF::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_PUBLISHER_CC,
            [
                'type' => 'string',
                'sanitize_callback' => 'strtoupper',
                'show_in_rest' => [
                    'schema' => [
                        'type' => 'string',
                        'enum' => \array_merge(
                            \array_keys(
                                \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\Iso3166OneAlpha2::getCodes()
                            ),
                            [\DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_PUBLISHER_CC]
                        )
                    ]
                ]
            ]
        );
        register_setting(
            \DevOwl\RealCookieBanner\settings\TCF::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_ACCEPTED_TIME,
            ['type' => 'string', 'show_in_rest' => \true]
        );
        register_setting(
            \DevOwl\RealCookieBanner\settings\TCF::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_FIRST_ACCEPTED_TIME,
            ['type' => 'string', 'show_in_rest' => \true]
        );
        register_setting(
            \DevOwl\RealCookieBanner\settings\TCF::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_SCOPE_OF_CONSENT,
            ['type' => 'string', 'show_in_rest' => \true]
        );
        register_setting(
            \DevOwl\RealCookieBanner\settings\TCF::OPTION_GROUP,
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_GVL_DOWNLOAD_TIME,
            ['type' => 'string', 'show_in_rest' => \true]
        );
        $this->previousActive = $this->isActive();
    }
    // Documented in IOverrideTCF
    public function probablyUpdateGvl() {
        if (
            $this->isActive() &&
            \time() > get_option(\DevOwl\RealCookieBanner\settings\TCF::OPTION_TCF_GVL_NEXT_DOWNLOAD_TIME, 0)
        ) {
            $this->updateGvl();
        }
    }
    // Documented in IOverrideTCF
    public function updateGvl($force = \false) {
        if ($this->isActive() || $force) {
            $license = \DevOwl\RealCookieBanner\Core::getInstance()
                ->getRpmInitiator()
                ->getPluginUpdater()
                ->getCurrentBlogLicense();
            $normalizer = \DevOwl\RealCookieBanner\Core::getInstance()->getTcfVendorListNormalizer();
            $normalizer->setFetchQueryArgs([
                'licenseKey' => $license->getActivation()->getCode(),
                'clientUuid' => $license->getUuid()
            ]);
            $result = $normalizer->update();
            if (is_wp_error($result)) {
                return new \WP_Error(
                    'tcf_gvl_fetch_failed',
                    \sprintf(
                        // translators:
                        __('Downloading the GVL has failed. Please try again later! (%1$s: %2$s)', RCB_TD),
                        $result->get_error_code(),
                        $result->get_error_message()
                    ),
                    $result->get_error_data()
                );
            }
            // Persist last successful download and save the timestamp when it should get automatically be updated
            if ($result === \true) {
                update_option(
                    \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_GVL_DOWNLOAD_TIME,
                    current_time('mysql')
                );
                // Determine next update
                $hasDefectVendors = $normalizer->getQuery()->hasDefectVendors();
                update_option(
                    \DevOwl\RealCookieBanner\settings\TCF::OPTION_TCF_GVL_NEXT_DOWNLOAD_TIME,
                    $hasDefectVendors ? \strtotime('+6 hours') : self::getNextUpdateTime()
                );
                // Automatically request new consent
                \DevOwl\RealCookieBanner\settings\Revision::getInstance()->create(\true);
            }
            return $result;
        }
        return new \WP_Error(
            'rcb_update_gvl_not_active',
            __('This functionality is currently not available.', RCB_TD),
            ['status' => 500]
        );
    }
    // Documented in IOverrideTCF
    public function clearGvl() {
        \DevOwl\RealCookieBanner\Core::getInstance()
            ->getTcfVendorListNormalizer()
            ->getPersist()
            ->clear();
        update_option(\DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_GVL_DOWNLOAD_TIME, '');
        update_option(\DevOwl\RealCookieBanner\settings\TCF::OPTION_TCF_GVL_NEXT_DOWNLOAD_TIME, '');
    }
    /**
     * The option to enable TCF got updated, let's save the time of consent.
     *
     * @param WP_REST_Response $response
     * @param WP_REST_Request $request
     */
    public function updated_option_active($response, $request) {
        $active = $request->get_param(\DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF);
        // Clear GVL if TCF gets disabled
        if ($active === \false && $this->previousActive) {
            $this->clearGvl();
        }
        // Check if switch from "Disabled" to "Enabled" is done and save timestamps
        if (
            $active === \true &&
            !$this->previousActive &&
            \DevOwl\RealCookieBanner\Core::getInstance()->isLicenseActive()
        ) {
            $firstAcceptedTime = $this->getFirstAcceptedTime();
            if (empty($firstAcceptedTime)) {
                $firstAcceptedTime = empty($firstAcceptedTime) ? current_time('mysql') : $firstAcceptedTime;
                update_option(
                    \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_FIRST_ACCEPTED_TIME,
                    $firstAcceptedTime
                );
                // Deactivate "Respect DnT header" option
                update_option(\DevOwl\RealCookieBanner\settings\Consent::SETTING_RESPECT_DO_NOT_TRACK, \false);
            }
            $acceptedTime = current_time('mysql');
            update_option(\DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_ACCEPTED_TIME, $acceptedTime);
            // Normalize `vendor-list` and persist to database
            $this->updateGvl(\true);
        }
        // Output as ISO strings
        $response->data[\DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_FIRST_ACCEPTED_TIME] = mysql2date(
            'c',
            $this->getFirstAcceptedTime(),
            \false
        );
        $response->data[\DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_ACCEPTED_TIME] = mysql2date(
            'c',
            $this->getAcceptedTime(),
            \false
        );
        $response->data[\DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_GVL_DOWNLOAD_TIME] = mysql2date(
            'c',
            $this->getGvlDownloadTime(),
            \false
        );
        return $response;
    }
    /**
     * Output the accepted time as ISO string instead of mysql formatted string.
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
                [
                    \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_ACCEPTED_TIME,
                    \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_FIRST_ACCEPTED_TIME,
                    \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_GVL_DOWNLOAD_TIME
                ],
                \true
            )
        ) {
            return $result;
        }
        $value = get_option($args['option_name'], $args['schema']['default']);
        return empty($value) ? null : mysql2date('c', $value, \false);
    }
    /**
     * Localize frontend.
     *
     * @param array $arr
     * @param string $context
     */
    public function localize($arr, $context) {
        $isActive = $this->isActive();
        $isFrontend =
            $context === \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_FRONTEND ||
            is_customize_preview();
        $banner = \DevOwl\RealCookieBanner\lite\view\TcfBanner::getInstance();
        if ($isFrontend) {
            $arr['tcf'] = $banner->localize();
            $arr['tcfMetadata'] = $banner->localizeMetadata();
        }
        if (
            ($isFrontend && $isActive) ||
            $context === \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_ADMIN
        ) {
            $arr['bannerI18n'] = \array_merge($arr['bannerI18n'], $banner->localizeTexts());
        }
        return $arr;
    }
    // Documented in IOverrideTCF
    public function isActive() {
        return get_option(\DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF) &&
            \DevOwl\RealCookieBanner\Core::getInstance()->isLicenseActive();
    }
    // Documented in IOverrideTCF
    public function getPublisherCountryCode() {
        return get_option(
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_PUBLISHER_CC,
            \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_PUBLISHER_CC
        );
    }
    // Documented in IOverrideTCF
    public function getFirstAcceptedTime() {
        return get_option(
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_FIRST_ACCEPTED_TIME,
            \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_FIRST_ACCEPTED_TIME
        );
    }
    // Documented in IOverrideTCF
    public function getAcceptedTime() {
        return get_option(
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_ACCEPTED_TIME,
            \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_ACCEPTED_TIME
        );
    }
    // Documented in IOverrideTCF
    public function getGvlDownloadTime() {
        return get_option(
            \DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_GVL_DOWNLOAD_TIME,
            \DevOwl\RealCookieBanner\settings\TCF::DEFAULT_TCF_GVL_DOWNLOAD_TIME
        );
    }
    // Documented in IOverrideTCF
    public function getScopeOfConsent() {
        return get_option(\DevOwl\RealCookieBanner\settings\TCF::SETTING_TCF_SCOPE_OF_CONSENT);
    }
    /**
     * Changes to the Global Vendor List are published weekly at 5:00 PM Central European Time on Thursdays.
     */
    public static function getNextUpdateTime() {
        return \strtotime('next thursday 4:00 PM');
        // convert CET to UTC (+01:00)
    }
}
