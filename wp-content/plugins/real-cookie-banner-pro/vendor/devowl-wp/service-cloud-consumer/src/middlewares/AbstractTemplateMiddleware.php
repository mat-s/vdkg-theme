<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\ServiceCloudConsumer\middlewares;

use DevOwl\RealCookieBanner\Vendor\DevOwl\ServiceCloudConsumer\templates\AbstractTemplate;
/**
 * Abstract implementation of a middleware for templates.
 */
abstract class AbstractTemplateMiddleware extends
    \DevOwl\RealCookieBanner\Vendor\DevOwl\ServiceCloudConsumer\middlewares\AbstractMiddleware {
    /**
     * Before persisting the template instance to the storage we can modify it.
     *
     * Example: Calculate `recommendedWhenOneOf`.
     *
     * @param AbstractTemplate $template
     * @param AbstractTemplate[] $allTemplates
     * @return void
     */
    abstract public function beforePersistTemplate($template, &$allTemplates);
    /**
     * Before using the template (e.g. expose it to the frontend UI form) we can modify it.
     *
     * Example: Replace variables with values.
     *
     * @param AbstractTemplate $template
     * @return void
     */
    abstract public function beforeUsingTemplate($template);
}
