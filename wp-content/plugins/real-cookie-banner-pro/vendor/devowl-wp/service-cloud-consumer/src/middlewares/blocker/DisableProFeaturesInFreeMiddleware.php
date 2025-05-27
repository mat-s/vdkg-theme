<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\ServiceCloudConsumer\middlewares\blocker;

use DevOwl\RealCookieBanner\Vendor\DevOwl\ServiceCloudConsumer\middlewares\AbstractTemplateMiddleware;
use DevOwl\RealCookieBanner\Vendor\DevOwl\ServiceCloudConsumer\templates\AbstractTemplate;
use DevOwl\RealCookieBanner\Vendor\DevOwl\ServiceCloudConsumer\templates\BlockerTemplate;
/**
 * Middleware to remove some `attributes` in free content blocker presets which are only available in PRO.
 */
class DisableProFeaturesInFreeMiddleware extends
    \DevOwl\RealCookieBanner\Vendor\DevOwl\ServiceCloudConsumer\middlewares\AbstractTemplateMiddleware {
    // Documented in AbstractTemplateMiddleware
    public function beforePersistTemplate($template, &$allTemplates) {
        if (
            $template instanceof \DevOwl\RealCookieBanner\Vendor\DevOwl\ServiceCloudConsumer\templates\BlockerTemplate
        ) {
            if (
                $this->getVariableResolver()->resolveRequired('tier') ===
                \DevOwl\RealCookieBanner\Vendor\DevOwl\ServiceCloudConsumer\templates\AbstractTemplate::TIER_FREE
            ) {
                $template->visualType = null;
            }
        }
    }
    // Documented in AbstractTemplateMiddleware
    public function beforeUsingTemplate($template) {
        // Silence is golden.
    }
}
