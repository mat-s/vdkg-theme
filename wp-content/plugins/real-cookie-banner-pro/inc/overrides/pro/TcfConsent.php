<?php

namespace DevOwl\RealCookieBanner\lite;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\MyConsent;
use DevOwl\RealCookieBanner\settings\Consent;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Save the TCF string / consent in a dedicated cookie.
 */
class TcfConsent {
    use UtilsProvider;
    /**
     * Also ported to `getCurrentTcfStringFromCookie.tsx`.
     */
    const COOKIE_NAME_SUFFIX = '-tcf';
    /**
     * Singleton instance.
     *
     * @var TcfConsent
     */
    private static $me = null;
    /**
     * C'tor.
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * A consent got created, let's save the TCF string in a dedicated cookie.
     *
     * @param array $result
     * @param array $args
     */
    public function consentCreated($result, $args) {
        $this->setCookie($args['tcfString']);
    }
    /**
     * Automatically delete the TCF cookie when the original cookie gets deleted.
     *
     * @param string $cookieName
     * @param string $cookieValue
     * @param boolean $result Got the cookie successfully created?
     * @param boolean $revoke `true` if the cookie should be deleted
     */
    public function consentSetCookie($cookieName, $cookieValue, $result, $revoke) {
        if ($revoke) {
            $this->setCookie();
        }
    }
    /**
     * Set or update the existing cookie to the TCF string. It also respect the fact, that
     * cross-site cookies needs to be set with `SameSite=None` attribute.
     *
     * @param string $tcfString
     */
    public function setCookie($tcfString = null) {
        $cookieName = $this->getCookieName();
        $doDelete = $tcfString === null;
        $cookieValue = $doDelete ? '' : $tcfString;
        $expire = $doDelete
            ? -1
            : \time() +
                \constant('DAY_IN_SECONDS') *
                    \DevOwl\RealCookieBanner\settings\Consent::getInstance()->getCookieDuration();
        \DevOwl\RealCookieBanner\Utils::setCookie(
            $cookieName,
            $cookieValue,
            $expire,
            \constant('COOKIEPATH'),
            \constant('COOKIE_DOMAIN'),
            is_ssl(),
            \false,
            'None'
        );
    }
    /**
     * Get cookie name for the current page.
     */
    public function getCookieName() {
        return \DevOwl\RealCookieBanner\MyConsent::getInstance()->getCookieName() . self::COOKIE_NAME_SUFFIX;
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\lite\TcfConsent()) : self::$me;
    }
}
