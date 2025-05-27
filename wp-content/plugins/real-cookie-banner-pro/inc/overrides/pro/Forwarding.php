<?php

namespace DevOwl\RealCookieBanner\lite;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\lite\rest\Forwarding as RestForwarding;
use DevOwl\RealCookieBanner\MyConsent;
use DevOwl\RealCookieBanner\settings\Cookie;
use DevOwl\RealCookieBanner\settings\CookieGroup;
use DevOwl\RealCookieBanner\settings\Multisite;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Service;
use WP_Error;
use WP_REST_Request;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Handle consent forwarding.
 */
class Forwarding {
    use UtilsProvider;
    const QUERY_BLOG_ID = 'blog';
    const ENDPOINT_FILTER_ALL = 'all';
    const ENDPOINT_FILTER_NOT_CURRENT = 'notCurrent';
    const ENDPOINT_FILTER_ONLY_CURRENT = 'onlyCurrent';
    const ALL_ENDPOINT_FILTERS = [
        self::ENDPOINT_FILTER_ALL,
        self::ENDPOINT_FILTER_NOT_CURRENT,
        self::ENDPOINT_FILTER_ONLY_CURRENT
    ];
    /**
     * Singleton instance.
     *
     * @var Forwarding
     */
    private static $me = null;
    /**
     * C'tor.
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * Persist a forwarded user consent to the database.
     *
     * @param string $uuid
     * @param int $consentId
     * @param string[] $cookies
     * @param string $buttonClicked
     * @param int $viewPortWidth
     * @param int $viewPortHeight
     * @param string $referer
     * @param boolean $blocker If the consent came from a content blocker, mark this in our database
     * @param string $tcfString
     * @return array Result of MyConsent#persist()
     */
    public function persist(
        $uuid,
        $consentId,
        $cookies,
        $buttonClicked,
        $viewPortWidth,
        $viewPortHeight,
        $referer,
        $blocker,
        $tcfString
    ) {
        return \DevOwl\RealCookieBanner\MyConsent::getInstance()->persist(
            $this->uniqueNamesToCookieIds($cookies),
            \false,
            $buttonClicked,
            $viewPortWidth,
            $viewPortHeight,
            $referer,
            0,
            null,
            $consentId,
            $uuid,
            $blocker,
            $tcfString
        );
    }
    /**
     * Modify independent revision array and add the external hosts of consent forwarding.
     *
     * @param array $result
     */
    public function revisionArrayIndependent($result) {
        $hosts = $this->getExternalHosts();
        if ($hosts !== \false) {
            $result['consentForwardingExternalHosts'] = $hosts;
        }
        return $result;
    }
    /**
     * Localize frontend.
     *
     * @param array $arr
     */
    public function localize($arr) {
        $hosts = $this->getExternalHosts();
        if ($hosts !== \false) {
            $arr['consentForwardingExternalHosts'] = $hosts;
        }
        return $arr;
    }
    /**
     * Modify the response of the Consent API and add a `forward` property if
     * Consent Forwarding is available. The client needs to handle the rest.
     *
     * @see https://dev.to/zubairmohsin33/sending-cookies-with-cross-origin-cors-request-44m
     * @see https://javascript.info/fetch-crossorigin
     * @param array $result
     * @param WP_REST_Request $request
     */
    public function consentCreatedResponse($result, $request) {
        $mu = \DevOwl\RealCookieBanner\settings\Multisite::getInstance();
        if ($mu->isConsentForwarding() && !$request->get_param('markAsDoNotTrack')) {
            $endpoints = $this->getCurrentEndpoints();
            $tcfString = $request->get_param('tcfString');
            if (\count($endpoints) > 0) {
                $data = [
                    'uuid' => $result['uuid'],
                    'consentId' => $result['consent_id'],
                    'blocker' => $request->get_param('blocker') > 0,
                    'buttonClicked' => $request->get_param('buttonClicked'),
                    'viewPortWidth' => $request->get_param('viewPortWidth'),
                    'viewPortHeight' => $request->get_param('viewPortHeight'),
                    'groups' => $this->groupIdsToUniqueName(\array_keys($result['decision_in_cookie'])),
                    'cookies' => $this->cookieIdsToUniqueName($result['decision_in_cookie']),
                    '_wp_http_referer' => wp_get_raw_referer()
                ];
                if (\is_string($tcfString)) {
                    $data['tcfString'] = $tcfString;
                }
                $result['forward'] = ['endpoints' => $endpoints, 'data' => $data];
            }
        }
        return $result;
    }
    /**
     * Transform a given consent decision in string[] (unique cookie names) to a map of groups with cookie ids.
     * It automatically accepts all essential cookies.
     *
     * @param string[] $cookies
     */
    protected function uniqueNamesToCookieIds($cookies) {
        $decision = [];
        $essentialGroup = \DevOwl\RealCookieBanner\settings\CookieGroup::getInstance()->getEssentialGroup();
        foreach (\DevOwl\RealCookieBanner\settings\CookieGroup::getInstance()->getOrdered() as $group) {
            foreach (\DevOwl\RealCookieBanner\settings\Cookie::getInstance()->getOrdered($group->term_id) as $cookie) {
                $optIn = \false;
                // Accept all essential cookies
                if ($essentialGroup->term_id === $group->term_id) {
                    $optIn = \true;
                } else {
                    // Check if unique name is equal
                    $uniqueName = empty($cookie->metas[\DevOwl\RealCookieBanner\settings\Cookie::META_NAME_UNIQUE_NAME])
                        ? $cookie->post_name
                        : $cookie->metas[\DevOwl\RealCookieBanner\settings\Cookie::META_NAME_UNIQUE_NAME];
                    if (\in_array($uniqueName, $cookies, \true)) {
                        $optIn = \true;
                    }
                }
                // Add to decision
                if ($optIn) {
                    if (!isset($decision[$group->term_id])) {
                        $decision[$group->term_id] = [];
                    }
                    $decision[$group->term_id][] = $cookie->ID;
                }
            }
        }
        return $decision;
    }
    /**
     * Transform a given consent decision (groups IDs) to a map of unique names.
     *
     * @param int[] $groupsIds
     */
    protected function groupIdsToUniqueName($groupsIds) {
        $ids = [];
        $groups = \DevOwl\RealCookieBanner\settings\CookieGroup::getInstance()->getOrdered();
        foreach ($groupsIds as $groupId) {
            foreach ($groups as $group) {
                if ($group->term_id === $groupId) {
                    $ids[] = $group->slug;
                }
            }
        }
        return $ids;
    }
    /**
     * Transform a given consent decision (groups with cookie IDs) to a map of unique names.
     *
     * @param array $decision
     */
    protected function cookieIdsToUniqueName($decision) {
        $ids = [];
        foreach ($decision as $groupId => $cookieIds) {
            $cookies = \DevOwl\RealCookieBanner\settings\Cookie::getInstance()->getOrdered($groupId);
            foreach ($cookies as $cookie) {
                if (\in_array($cookie->ID, $cookieIds, \true)) {
                    $ids[] = empty($cookie->metas[\DevOwl\RealCookieBanner\settings\Cookie::META_NAME_UNIQUE_NAME])
                        ? $cookie->post_name
                        : $cookie->metas[\DevOwl\RealCookieBanner\settings\Cookie::META_NAME_UNIQUE_NAME];
                }
            }
        }
        return $ids;
    }
    /**
     * Get all available cookies by an unique name.
     *
     * @param string $slug
     */
    public function getByUniqueName($slug) {
        $result = [];
        // unique IDs because we fetch multiple times
        $byMeta = get_posts(
            \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                [
                    'post_type' => \DevOwl\RealCookieBanner\settings\Cookie::CPT_NAME,
                    'posts_per_page' => -1,
                    'meta_query' => [
                        [
                            'key' => \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_UNIQUE_NAME,
                            'value' => $slug,
                            'compare' => '='
                        ]
                    ]
                ],
                'forwardingGetUniqueNameByMeta'
            )
        );
        foreach ($byMeta as $row) {
            $result[$row->ID] = $row;
        }
        if (\count($result) === 0) {
            return new \WP_Error('not_found', __('Not found'), ['status' => 404]);
        }
        return \array_values(
            \DevOwl\RealCookieBanner\settings\Cookie::getInstance()->getOrdered(null, \false, $result)
        );
    }
    /**
     * Check if external hosts need to be contacted and return the external hosts including subdomain.
     * Returns `false` if no external host gets contacted.
     */
    public function getExternalHosts() {
        if (\DevOwl\RealCookieBanner\settings\Multisite::getInstance()->isConsentForwarding()) {
            $currentHost = \parse_url(home_url(), \PHP_URL_HOST);
            $urls = $this->getCurrentEndpoints();
            $hosts = \array_values(
                // `array_values` again cause we need to force an array instead of object (https://stackoverflow.com/a/25296770/5506547)
                \array_unique(
                    \array_values(
                        \array_filter(
                            \array_map(function ($url) {
                                return \parse_url($url, \PHP_URL_HOST);
                            }, $urls),
                            function ($url) use ($currentHost) {
                                return $currentHost !== $url;
                            }
                        )
                    )
                )
            );
            return \count($hosts) > 0 ? $hosts : \false;
        }
        return \false;
    }
    /**
     * Get the endpoints computed for the current context.
     *
     * @return string[]
     */
    public function getCurrentEndpoints() {
        $endpoints = [];
        $mu = \DevOwl\RealCookieBanner\settings\Multisite::getInstance();
        // Get configured known endpoints and only allow not-current one
        $forwardTo = $mu->getForwardTo();
        $notCurrentForwardTo = \array_keys($this->getAvailableEndpoints(self::ENDPOINT_FILTER_NOT_CURRENT));
        foreach ($forwardTo as $ft) {
            if (\in_array($ft, $notCurrentForwardTo, \true)) {
                $endpoints[] = $ft;
            }
        }
        // Get configured unknown-cross-domains and only allow not-current one
        $crossDomains = $mu->getCrossDomains();
        $currentForwardTo = \array_keys($this->getAvailableEndpoints(self::ENDPOINT_FILTER_ONLY_CURRENT));
        foreach ($crossDomains as $cd) {
            if (!\in_array($cd, $currentForwardTo, \true)) {
                $endpoints[] = $cd;
            }
        }
        /**
         * (Pro only) Get all forward endpoints independent of current option. This allows you to create custom
         * and computed endpoints depending on the current context.
         *
         * @hook RCB/Forward/Endpoints/Computed
         * @param {string[]} $endpoints
         * @return {string[]}
         */
        return apply_filters('RCB/Forward/Endpoints/Computed', $endpoints);
    }
    /**
     * See filter RCB/Forward/Endpoints.
     *
     * @param string $filter
     */
    public function getAvailableEndpoints($filter = self::ENDPOINT_FILTER_ALL) {
        $isMu = is_multisite();
        $currentBlogId = get_current_blog_id();
        $endpoints = [];
        // Multisite (all blog IDs)
        $blogIds = [];
        if (
            $isMu &&
            \function_exists('get_sites') &&
            \class_exists('WP_Site_Query') &&
            $filter !== self::ENDPOINT_FILTER_ONLY_CURRENT
        ) {
            $blogIds = get_sites(['number' => 0, 'fields' => 'ids']);
        } else {
            $blogIds[] = $currentBlogId;
        }
        foreach ($blogIds as $blogId) {
            if ($isMu) {
                switch_to_blog($blogId);
            }
            $siteEndpoints = [];
            // Add this blog only if requested
            $addThis = \true;
            if ($filter === self::ENDPOINT_FILTER_NOT_CURRENT && $blogId === $currentBlogId) {
                $addThis = \false;
            }
            if ($filter === self::ENDPOINT_FILTER_ONLY_CURRENT && $blogId !== $currentBlogId) {
                $addThis = \false;
            }
            if ($addThis) {
                $restUrl = \DevOwl\RealCookieBanner\Core::getInstance()
                    ->getAssets()
                    ->getAsciiUrl(
                        \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Service::getUrl(
                            \DevOwl\RealCookieBanner\Core::getInstance(),
                            null,
                            \DevOwl\RealCookieBanner\lite\rest\Forwarding::ENDPOINT_CONSENT_FORWARD
                        )
                    );
                // Add `blog` query argument so we can identify the query at option-update runtime (see Multisite::update_option_forward_to)
                $restUrl = add_query_arg(self::QUERY_BLOG_ID, $blogId, $restUrl);
                $siteEndpoints[$restUrl] = get_bloginfo('name');
            }
            /**
             * (Pro only) Get all available and predefined endpoints. E. g. if your are running within a mulitisite,
             * you will get all available WP REST API endpoints for each site within this multisite. That means, you need
             * to add your endpoint as follows: `$endpoints["https://example.com/wp-json/real-cookie-banner/v1/consent/forward"] = 'My example'.`
             *
             * Attention: This filter can be run multiple times when you are within a multisite. For each blog, the filter is applied.
             *
             * @hook RCB/Forward/Endpoints
             * @param {array} $endpoints
             * @param {boolean} $filter Can be `all`, `notCurrent` and `onlyCurrent`
             * @param {int} $requestBlogId since 2.15.1
             * @param {int} $currentBlogId since 2.15.1
             * @return {array}
             */
            $endpoints = \array_merge(
                $endpoints,
                apply_filters('RCB/Forward/Endpoints', $siteEndpoints, $filter, $currentBlogId, $blogId)
            );
            if ($isMu) {
                restore_current_blog();
            }
        }
        return $endpoints;
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\lite\Forwarding()) : self::$me;
    }
}
