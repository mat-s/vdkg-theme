<?php

namespace DevOwl\RealCookieBanner\lite\settings;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\lite\view\TcfBanner;
use DevOwl\RealCookieBanner\settings\TCF;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Append TCF settings to the documented revision.
 */
class TcfRevision {
    use UtilsProvider;
    /**
     * Singleton instance.
     *
     * @var TcfVendorConfiguration
     */
    private static $me = null;
    /**
     * C'tor.
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * Modify revision array and add configured vendors and declarations so they
     * trigger a new "Request new consent".
     *
     * @param array $result
     */
    public function revisionArray($result) {
        if (\DevOwl\RealCookieBanner\settings\TCF::getInstance()->isActive()) {
            $result['tcf'] = \DevOwl\RealCookieBanner\lite\view\TcfBanner::getInstance()->localize();
        }
        return $result;
    }
    /**
     * Modify independent revision array and add the time of the latest GVL download and
     * latest `vendorListVersion`.
     *
     * @param array $result
     */
    public function revisionArrayIndependent($result) {
        if (\DevOwl\RealCookieBanner\settings\TCF::getInstance()->isActive()) {
            $result['tcfMeta'] = \DevOwl\RealCookieBanner\lite\view\TcfBanner::getInstance()->localizeMetadata();
        }
        return $result;
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\lite\settings\TcfRevision()) : self::$me;
    }
}
