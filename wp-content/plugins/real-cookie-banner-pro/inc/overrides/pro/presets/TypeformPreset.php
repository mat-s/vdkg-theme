<?php

namespace DevOwl\RealCookieBanner\lite\presets;

use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\presets\pro\TypeformPreset as ProTypeformPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Typeform cookie preset.
 */
class TypeformPreset extends \DevOwl\RealCookieBanner\presets\pro\TypeformPreset {
    // Documented in AbstractPreset
    public function common() {
        $parent = parent::common();
        return \array_merge($parent, [
            'attributes' => [
                'name' => $parent['name'],
                'group' => __('Functional', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                'purpose' => __(
                    'Typeform is a form system that allows us to add contact, newsletter, survey and other forms to the website. The cookies are used for visitor security by preventing the faking of cross-site requests and to uniquely identify users and display personalized content based on their input.',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                'provider' => 'TYPEFORM SL',
                'providerPrivacyPolicyUrl' => 'https://admin.typeform.com/to/dwk6gt',
                'technicalDefinitions' => [
                    [
                        'type' => 'http',
                        'name' => '__cf_bm',
                        'host' => '.typeform.com',
                        'durationUnit' => 'm',
                        'isSessionDuration' => \false,
                        'duration' => 30
                    ],
                    [
                        'type' => 'http',
                        'name' => 'attribution_user_id',
                        'host' => '.typeform.com',
                        'duration' => 1,
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false
                    ],
                    [
                        'type' => 'local',
                        'name' => 'segmentio.*.inProgress',
                        'host' => 'typeform.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'segmentio.*.reclaimEnd',
                        'host' => 'typeform.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'segmentio.*.queue',
                        'host' => 'typeform.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'segmentio.*.ack',
                        'host' => 'typeform.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'segmentio.*.reclaimStart',
                        'host' => 'typeform.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => '*-visitorId',
                        'host' => 'typeform.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'ajs_anonymous_id',
                        'host' => 'typeform.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ],
                    [
                        'type' => 'local',
                        'name' => 'debug',
                        'host' => 'typeform.com',
                        'durationUnit' => 'y',
                        'isSessionDuration' => \false,
                        'duration' => 0
                    ]
                ],
                'ePrivacyUSA' => \true
            ]
        ]);
    }
    // Documented in AbstractPreset
    public function managerNone() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerGtm() {
        return \false;
    }
    // Documented in AbstractPreset
    public function managerMtm() {
        return \false;
    }
}
