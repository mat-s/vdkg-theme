<?php

namespace DevOwl\RealCookieBanner\lite;

use DevOwl\RealCookieBanner\Vendor\DevOwl\Freemium\CorePro;
use DevOwl\RealCookieBanner\comp\language\Hooks as LanguageHooks;
use DevOwl\RealCookieBanner\lite\comp\language\Hooks;
use DevOwl\RealCookieBanner\lite\presets\ActiveCampaignSiteTrackingPreset;
use DevOwl\RealCookieBanner\lite\presets\AddThisPreset;
use DevOwl\RealCookieBanner\lite\presets\AddToAnyPreset;
use DevOwl\RealCookieBanner\lite\presets\AdInserterPreset;
use DevOwl\RealCookieBanner\lite\presets\AdobeTypekitPreset;
use DevOwl\RealCookieBanner\lite\presets\AmazonAssociatesWidgetPreset;
use DevOwl\RealCookieBanner\lite\presets\Analytify4Preset;
use DevOwl\RealCookieBanner\lite\presets\AnalytifyPreset;
use DevOwl\RealCookieBanner\lite\presets\AnchorFmPreset;
use DevOwl\RealCookieBanner\lite\presets\AppleMusicPreset;
use DevOwl\RealCookieBanner\lite\presets\AwinLinkImageAdsPreset;
use DevOwl\RealCookieBanner\lite\presets\AwinPublisherMasterTagPreset;
use DevOwl\RealCookieBanner\lite\presets\BingAdsPreset;
use DevOwl\RealCookieBanner\lite\presets\BingMapsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ActiveCampaignFormPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ActiveCampaignSiteTrackingPreset as BlockerActiveCampaignSiteTrackingPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\AddThisPreset as BlockerAddThisPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\AddToAnyPreset as BlockerAddToAnyPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\AdInserterPreset as BlockerAdInserterPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\AdobeTypekitPreset as BlockerAdobeTypekitPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\Analytify4Preset as BlockerAnalytify4Preset;
use DevOwl\RealCookieBanner\lite\presets\blocker\AnalytifyPreset as BlockerAnalytifyPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\AnchorFmPreset as BlockerAnchorFmPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\AppleMusicPreset as BlockerAppleMusicPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\AwinLinkImageAdsPreset as BlockerAwinLinkImageAdsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\BingMapsPreset as BlockerBingMapsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\BloomPreset as BlockerBloomPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\CalderaFormsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\CalendlyPreset as BlockerCalendlyPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\CleverReachRecaptchaPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ContactForm7RecaptchaPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ConvertKitPreset as BlockerConvertKitPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\CustomFacebookFeedPreset as BlockerCustomFacebookFeedPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\CustomTwitterFeedPreset as BlockerCustomTwitterFeedPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\DailymotionPreset as BlockerDailymotionPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\DiscordWidgetPreset as BlockerDiscordWidgetPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\DiviContactFormPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ElementorFormsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\EtrackerPreset as BlockerEtrackerPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\EtrackerWithConsentPreset as BlockerEtrackerWithConsentPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ExactMetrics4Preset as BlockerExactMetrics4Preset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ExactMetricsPreset as BlockerExactMetricsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FacebookForWooCommercePreset as BlockerFacebookForWooCommercePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FacebookGraphPreset as BlockerFacebookGraphPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FacebookLikePreset as BlockerFacebookLikePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FacebookPagePluginPreset as BlockerFacebookPagePluginPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FacebookPixelPreset as BlockerFacebookPixelPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FacebookPostPreset as BlockerFacebookPostPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FacebookSharePreset as BlockerFacebookSharePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FeedsForYoutubePreset as BlockerFeedsForYoutubePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FiveStarRestaurantReservationsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FlickrPreset as BlockerFlickrPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FormidablePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\FormMakerRecaptchaPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GAGoogleAnalytics4Preset as BlockerGAGoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GAGoogleAnalyticsPreset as BlockerGAGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GetYourGuidePreset as BlockerGetYourGuidePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GiphyPreset as BlockerGiphyPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GoogleAnalytics4Preset as BlockerGoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GoogleAnalyticsPreset as BlockerGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GoogleMapsPreset as BlockerGoogleMapsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GoogleRecaptchaPreset as BlockerGoogleRecaptchaPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GoogleTranslatePreset as BlockerGoogleTranslatePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GoogleTrendsPreset as BlockerGoogleTrendsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\GoogleUserContentPreset as BlockerGoogleUserContentPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\HappyFormsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\HotjarPreset as BlockerHotjarPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ImgurPreset as BlockerImgurPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\InstagramPostPreset as BlockerInstagramPostPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\IntercomChatPreset as BlockerIntercomChatPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\IssuuPreset as BlockerIssuuPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\KlaviyoPreset as BlockerKlaviyoPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\KlikenPreset as BlockerKlikenPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\KomootPreset as BlockerKomootPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\LinkedInAdsPreset as BlockerLinkedInAdsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\LoomPreset as BlockerLoomPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MailchimpForWooCommercePreset as BlockerMailchimpForWooCommercePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MailerLitePreset as BlockerMailerLitePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MailPoetPreset as BlockerMailPoetPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MatomoIntegrationPluginPreset as BlockerMatomoIntegrationPluginPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MatomoPluginPreset as BlockerMatomoPluginPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MetricoolPreset as BlockerMetricoolPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MicrosoftClarityPreset as BlockerMicrosoftClarityPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MonsterInsights4Preset as BlockerMonsterInsights4Preset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MonsterInsightsPreset as BlockerMonsterInsightsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MouseflowPreset as BlockerMouseflowPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MyCruiseExcursionPreset as BlockerMyCruiseExcursionPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\MyFontsPreset as BlockerMyFontsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\NinjaFormsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\OpenStreetMapPreset as BlockerOpenStreetMapPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\PerfmattersGA4Preset as BlockerPerfmattersGA4Preset;
use DevOwl\RealCookieBanner\lite\presets\blocker\PerfmattersGAPreset as BlockerPerfmattersGAPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\PinterestPreset as BlockerPinterestPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\PinterestTagPreset as BlockerPinterestTagPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\PiwikProPreset as BlockerPiwikProPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\PodigeePreset as BlockerPodigeePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\PopupMakerPreset as BlockerPopupMakerPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ProvenExpertWidgetPreset as BlockerProvenExpertWidgetPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\QuformRecaptchaPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\RankMathGAPreset as BlockerRankMathGAPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\RankMathGA4Preset as BlockerRankMathGA4Preset;
use DevOwl\RealCookieBanner\lite\presets\blocker\RedditPreset as BlockerRedditPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\SendinbluePreset as BlockerSendinbluePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\SmashBalloonSocialPhotoFeedPreset as BlockerSmashBalloonSocialPhotoFeedPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\SoundCloudPreset as BlockerSoundCloudPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\SpotifyPreset as BlockerSpotifyPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\TaboolaPreset as BlockerTaboolaPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\TawkToChatPreset as BlockerTawkToChatPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ThriveLeadsPreset as BlockerThriveLeadsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\TidioChatPreset as BlockerTidioChatPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\TikTokPreset as BlockerTikTokPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\TiWooCommerceWishlistPreset as BlockerTiWooCommerceWishlistPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\TrustindexIoPreset as BlockerTrustindexIoPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\TwitterTweetPreset as BlockerTwitterTweetPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\TypeformPreset as BlockerTypeformPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\UserlikePreset as BlockerUserlikePreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\VGWortPreset as BlockerVGWortPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\VimeoPreset as BlockerVimeoPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\WooCommerceGoogleAnalytics4Preset as BlockerWooCommerceGoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\lite\presets\blocker\WooCommerceGoogleAnalyticsPreset as BlockerWooCommerceGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\WooCommerceGoogleAnalyticsProPreset as BlockerWooCommerceGoogleAnalyticsProPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\WPFormsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\XingEventsPreset as BlockerXingEventsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\YandexMetricaPreset as BlockerYandexMetricaPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ZendeskChatPreset as BlockerZendeskChatPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ZohoBookingsPreset as BlockerZohoBookingsPreset;
use DevOwl\RealCookieBanner\lite\presets\blocker\ZohoFormsPreset as BlockerZohoFormsPreset;
use DevOwl\RealCookieBanner\lite\presets\BloomPreset;
use DevOwl\RealCookieBanner\lite\presets\CalendlyPreset;
use DevOwl\RealCookieBanner\lite\presets\CleanTalkSpamProtectPreset;
use DevOwl\RealCookieBanner\lite\presets\CloudflarePreset;
use DevOwl\RealCookieBanner\lite\presets\ConvertKitPreset;
use DevOwl\RealCookieBanner\lite\presets\CustomFacebookFeedPreset;
use DevOwl\RealCookieBanner\lite\presets\CustomTwitterFeedPreset;
use DevOwl\RealCookieBanner\lite\presets\DailyMotionPreset;
use DevOwl\RealCookieBanner\lite\presets\DiscordWidgetPreset;
use DevOwl\RealCookieBanner\lite\presets\EtrackerPreset;
use DevOwl\RealCookieBanner\lite\presets\EtrackerWithConsentPreset;
use DevOwl\RealCookieBanner\lite\presets\ExactMetrics4Preset;
use DevOwl\RealCookieBanner\lite\presets\ExactMetricsPreset;
use DevOwl\RealCookieBanner\lite\presets\EzoicEssentialPreset;
use DevOwl\RealCookieBanner\lite\presets\EzoicMarketingPreset;
use DevOwl\RealCookieBanner\lite\presets\EzoicPreferencesPreset;
use DevOwl\RealCookieBanner\lite\presets\EzoicStatisticPreset;
use DevOwl\RealCookieBanner\lite\presets\FacebookForWooCommercePreset;
use DevOwl\RealCookieBanner\lite\presets\FacebookGraphPreset;
use DevOwl\RealCookieBanner\lite\presets\FacebookLikePreset;
use DevOwl\RealCookieBanner\lite\presets\FacebookPagePluginPreset;
use DevOwl\RealCookieBanner\lite\presets\FacebookPixelPreset;
use DevOwl\RealCookieBanner\lite\presets\FacebookPostPreset;
use DevOwl\RealCookieBanner\lite\presets\FacebookSharePreset;
use DevOwl\RealCookieBanner\lite\presets\FeedsForYoutubePreset;
use DevOwl\RealCookieBanner\lite\presets\FlickrPreset;
use DevOwl\RealCookieBanner\lite\presets\FoundEePreset;
use DevOwl\RealCookieBanner\lite\presets\FreshchatPreset;
use DevOwl\RealCookieBanner\lite\presets\GAGoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\lite\presets\GAGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\lite\presets\GetYourGuidePreset;
use DevOwl\RealCookieBanner\lite\presets\GiphyPreset;
use DevOwl\RealCookieBanner\lite\presets\GoogleAds;
use DevOwl\RealCookieBanner\lite\presets\GoogleAdSensePreset;
use DevOwl\RealCookieBanner\lite\presets\GoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\lite\presets\GoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\lite\presets\GoogleMapsPreset;
use DevOwl\RealCookieBanner\lite\presets\GoogleRecaptchaPreset;
use DevOwl\RealCookieBanner\lite\presets\GoogleTranslatePreset;
use DevOwl\RealCookieBanner\lite\presets\GoogleTrendsPreset;
use DevOwl\RealCookieBanner\lite\presets\GoogleUserContentPreset;
use DevOwl\RealCookieBanner\lite\presets\GtmPreset;
use DevOwl\RealCookieBanner\lite\presets\HCaptchaPreset;
use DevOwl\RealCookieBanner\lite\presets\HelpCrunchChatPreset;
use DevOwl\RealCookieBanner\lite\presets\HelpScoutChatPreset;
use DevOwl\RealCookieBanner\lite\presets\HotjarPreset;
use DevOwl\RealCookieBanner\lite\presets\ImgurPreset;
use DevOwl\RealCookieBanner\lite\presets\InstagramPostPreset;
use DevOwl\RealCookieBanner\lite\presets\IntercomChatPreset;
use DevOwl\RealCookieBanner\lite\presets\IssuuPreset;
use DevOwl\RealCookieBanner\lite\presets\KlarnaCheckoutWooCommercePreset;
use DevOwl\RealCookieBanner\lite\presets\KlaviyoPreset;
use DevOwl\RealCookieBanner\lite\presets\KlikenPreset;
use DevOwl\RealCookieBanner\lite\presets\KomootPreset;
use DevOwl\RealCookieBanner\lite\presets\LinkedInAdsPreset;
use DevOwl\RealCookieBanner\lite\presets\LoomPreset;
use DevOwl\RealCookieBanner\lite\presets\LuckyOrangePreset;
use DevOwl\RealCookieBanner\lite\presets\MailchimpForWooCommercePreset;
use DevOwl\RealCookieBanner\lite\presets\MailerLitePreset;
use DevOwl\RealCookieBanner\lite\presets\MailPoetPreset;
use DevOwl\RealCookieBanner\lite\presets\MatomoIntegrationPluginPreset;
use DevOwl\RealCookieBanner\lite\presets\MatomoPluginPreset;
use DevOwl\RealCookieBanner\lite\presets\MatomoPreset;
use DevOwl\RealCookieBanner\lite\presets\MetricoolPreset;
use DevOwl\RealCookieBanner\lite\presets\MtmPreset;
use DevOwl\RealCookieBanner\lite\presets\PaddleComPreset;
use DevOwl\RealCookieBanner\lite\presets\PinterestPreset;
use DevOwl\RealCookieBanner\lite\presets\PolyLangPreset;
use DevOwl\RealCookieBanner\lite\presets\ReamazeChatPreset;
use DevOwl\RealCookieBanner\lite\presets\TawkToChatPreset;
use DevOwl\RealCookieBanner\lite\presets\TidioChatPreset;
use DevOwl\RealCookieBanner\lite\presets\TwitterTweetPreset;
use DevOwl\RealCookieBanner\lite\presets\UltimateMemberPreset;
use DevOwl\RealCookieBanner\lite\presets\VGWortPreset;
use DevOwl\RealCookieBanner\lite\presets\WooCommercePreset;
use DevOwl\RealCookieBanner\lite\presets\WPMLPreset;
use DevOwl\RealCookieBanner\lite\presets\ZendeskChatPreset;
use DevOwl\RealCookieBanner\lite\presets\MicrosoftClarityPreset;
use DevOwl\RealCookieBanner\lite\presets\MonsterInsights4Preset;
use DevOwl\RealCookieBanner\lite\presets\MonsterInsightsPreset;
use DevOwl\RealCookieBanner\lite\presets\MouseflowPreset;
use DevOwl\RealCookieBanner\lite\presets\MyCruiseExcursionPreset;
use DevOwl\RealCookieBanner\lite\presets\MyFontsPreset;
use DevOwl\RealCookieBanner\lite\presets\OpenStreetMapPreset;
use DevOwl\RealCookieBanner\lite\presets\PerfmattersGA4Preset;
use DevOwl\RealCookieBanner\lite\presets\PerfmattersGAPreset;
use DevOwl\RealCookieBanner\lite\presets\PinterestTagPreset;
use DevOwl\RealCookieBanner\lite\presets\PiwikProPreset;
use DevOwl\RealCookieBanner\lite\presets\PodigeePreset;
use DevOwl\RealCookieBanner\lite\presets\PopupMakerPreset;
use DevOwl\RealCookieBanner\lite\presets\ProvenExpertWidgetPreset;
use DevOwl\RealCookieBanner\lite\presets\QuformPreset;
use DevOwl\RealCookieBanner\lite\presets\RankMathGAPreset;
use DevOwl\RealCookieBanner\lite\presets\RankMathGA4Preset;
use DevOwl\RealCookieBanner\lite\presets\RedditPreset;
use DevOwl\RealCookieBanner\lite\presets\SendinbluePreset;
use DevOwl\RealCookieBanner\lite\presets\SmashBalloonSocialPhotoFeedPreset;
use DevOwl\RealCookieBanner\lite\presets\SoundCloudPreset;
use DevOwl\RealCookieBanner\lite\presets\SpotifyPreset;
use DevOwl\RealCookieBanner\lite\presets\StripePreset;
use DevOwl\RealCookieBanner\lite\presets\TaboolaPreset;
use DevOwl\RealCookieBanner\lite\presets\ThriveLeadsPreset;
use DevOwl\RealCookieBanner\lite\presets\TikTokPixelPreset;
use DevOwl\RealCookieBanner\lite\presets\TikTokPreset;
use DevOwl\RealCookieBanner\lite\presets\TiWooCommerceWishlistPreset;
use DevOwl\RealCookieBanner\lite\presets\TranslatePressPreset;
use DevOwl\RealCookieBanner\lite\presets\TrustindexIoPreset;
use DevOwl\RealCookieBanner\lite\presets\TypeformPreset;
use DevOwl\RealCookieBanner\lite\presets\UserlikePreset;
use DevOwl\RealCookieBanner\lite\presets\VimeoPreset;
use DevOwl\RealCookieBanner\lite\presets\WooCommerceGatewayStripePreset;
use DevOwl\RealCookieBanner\lite\presets\WooCommerceGeolocationPreset;
use DevOwl\RealCookieBanner\lite\presets\WooCommerceGoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\lite\presets\WooCommerceGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\lite\presets\WooCommerceGoogleAnalyticsProPreset;
use DevOwl\RealCookieBanner\lite\presets\WordfencePreset;
use DevOwl\RealCookieBanner\lite\presets\WPCerberSecurityPreset;
use DevOwl\RealCookieBanner\lite\presets\XingEventsPreset;
use DevOwl\RealCookieBanner\lite\presets\YandexMetricaPreset;
use DevOwl\RealCookieBanner\lite\presets\ZohoBookingsPreset;
use DevOwl\RealCookieBanner\lite\presets\ZohoFormsPreset;
use DevOwl\RealCookieBanner\lite\view\Misc;
use DevOwl\RealCookieBanner\lite\rest\Forwarding as RestForwarding;
use DevOwl\RealCookieBanner\lite\rest\TCF;
use DevOwl\RealCookieBanner\lite\settings\Affiliate;
use DevOwl\RealCookieBanner\lite\settings\TcfRevision;
use DevOwl\RealCookieBanner\lite\view\TcfBanner;
use DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration;
use DevOwl\RealCookieBanner\lite\view\customize\banner\TcfBodyDesign;
use DevOwl\RealCookieBanner\lite\view\customize\banner\TcfTexts;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\settings\TCF as SettingsTCF;
use DevOwl\RealCookieBanner\view\BannerCustomize;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
trait Core {
    use CorePro;
    /**
     * The updater instance.
     *
     * @see https://github.com/Capevace/wordpress-plugin-updater
     */
    private $updater;
    // Documented in IOverrideCore
    public function overrideConstruct() {
        add_action('admin_init', [
            \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::getInstance(),
            'register_cap'
        ]);
        add_filter('RCB/Presets/Cookies', [$this, 'createProCookiePresets']);
        add_filter('RCB/Presets/Blocker', [$this, 'createProBlockerPresets']);
        add_filter('RCB/Revision/Option/' . \DevOwl\RealCookieBanner\settings\General::SETTING_HIDE_PAGE_IDS, [
            \DevOwl\RealCookieBanner\lite\comp\language\Hooks::getInstance(),
            'revisionOptionValue_additionalHidePageIds'
        ]);
        add_filter('RCB/Customize/Animation/In', [
            \DevOwl\RealCookieBanner\lite\view\Misc::getInstance(),
            'animationsIn'
        ]);
        add_filter('RCB/Customize/Animation/Out', [
            \DevOwl\RealCookieBanner\lite\view\Misc::getInstance(),
            'animationsOut'
        ]);
        add_filter('DevOwl/Customize/Sections/' . \DevOwl\RealCookieBanner\view\BannerCustomize::PANEL_MAIN, [
            \DevOwl\RealCookieBanner\lite\view\customize\banner\TcfBodyDesign::getInstance(),
            'stacks'
        ]);
        add_filter('DevOwl/Customize/Sections/' . \DevOwl\RealCookieBanner\view\BannerCustomize::PANEL_MAIN, [
            \DevOwl\RealCookieBanner\lite\view\customize\banner\TcfTexts::getInstance(),
            'stacks'
        ]);
        add_filter('plugins_loaded', [\DevOwl\RealCookieBanner\lite\view\TcfBanner::getInstance(), 'hooks']);
    }
    // Documented in IOverrideCore
    public function overrideRegisterSettings() {
        \DevOwl\RealCookieBanner\lite\settings\Affiliate::getInstance()->register();
    }
    // Documented in IOverrideCore
    public function overrideRegisterPostTypes() {
        \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::getInstance()->register();
    }
    // Documented in IOverrideCore
    public function overrideInit() {
        $affiliateSettings = \DevOwl\RealCookieBanner\lite\settings\Affiliate::getInstance();
        $tcfService = \DevOwl\RealCookieBanner\lite\rest\TCF::instance();
        add_action('rest_api_init', [\DevOwl\RealCookieBanner\lite\rest\Forwarding::instance(), 'rest_api_init']);
        add_action('rest_api_init', [$tcfService, 'rest_api_init']);
        add_filter(
            'rest_prepare_' . \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::CPT_NAME,
            [$tcfService, 'rest_prepare_vendor'],
            10,
            2
        );
        add_filter('RCB/Revision/Array', [
            \DevOwl\RealCookieBanner\lite\settings\TcfRevision::getInstance(),
            'revisionArray'
        ]);
        add_filter('RCB/Revision/Array/Independent', [
            \DevOwl\RealCookieBanner\lite\settings\TcfRevision::getInstance(),
            'revisionArrayIndependent'
        ]);
        add_filter('RCB/Revision/Array/Independent', [
            \DevOwl\RealCookieBanner\lite\Forwarding::getInstance(),
            'revisionArrayIndependent'
        ]);
        add_filter(
            'RCB/Forward/Endpoints',
            [\DevOwl\RealCookieBanner\lite\comp\language\Hooks::getInstance(), 'forwardEndpoints'],
            10,
            4
        );
        add_filter(
            'RCB/Consent/Created/Response',
            [\DevOwl\RealCookieBanner\lite\Forwarding::getInstance(), 'consentCreatedResponse'],
            10,
            2
        );
        add_filter('RCB/Localize', [$affiliateSettings, 'localize'], 10, 2);
        add_filter('RCB/Localize', [\DevOwl\RealCookieBanner\settings\TCF::getInstance(), 'localize'], 10, 2);
        add_filter('RCB/Localize', [\DevOwl\RealCookieBanner\lite\Forwarding::getInstance(), 'localize']);
        add_filter(
            'RCB/Consent/Created',
            [\DevOwl\RealCookieBanner\lite\TcfConsent::getInstance(), 'consentCreated'],
            10,
            2
        );
        add_action(
            'RCB/Consent/SetCookie',
            [\DevOwl\RealCookieBanner\lite\TcfConsent::getInstance(), 'consentSetCookie'],
            10,
            4
        );
        // Multilingual
        add_filter('rest_' . \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::CPT_NAME . '_query', [
            \DevOwl\RealCookieBanner\comp\language\Hooks::getInstance(),
            'rest_query'
        ]);
        $affiliateSettings->enableOptionsAutoload();
        \DevOwl\RealCookieBanner\lite\view\TcfBanner::getInstance()->multilingual();
    }
    /**
     * Create PRO-specific cookie presets.
     *
     * @param array $result
     */
    public function createProCookiePresets($result) {
        return \array_merge($result, [
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CLOUDFLARE =>
                \DevOwl\RealCookieBanner\lite\presets\CloudflarePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::POLYLANG =>
                \DevOwl\RealCookieBanner\lite\presets\PolyLangPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WPML =>
                \DevOwl\RealCookieBanner\lite\presets\WPMLPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE =>
                \DevOwl\RealCookieBanner\lite\presets\WooCommercePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ULTIMATE_MEMBER =>
                \DevOwl\RealCookieBanner\lite\presets\UltimateMemberPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GTM =>
                \DevOwl\RealCookieBanner\lite\presets\GtmPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MTM =>
                \DevOwl\RealCookieBanner\lite\presets\MtmPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_MAPS =>
                \DevOwl\RealCookieBanner\lite\presets\GoogleMapsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_POST =>
                \DevOwl\RealCookieBanner\lite\presets\FacebookPostPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::INSTAGRAM_POST =>
                \DevOwl\RealCookieBanner\lite\presets\InstagramPostPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TWITTER_TWEET =>
                \DevOwl\RealCookieBanner\lite\presets\TwitterTweetPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\GoogleRecaptchaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_ANALYTICS =>
                \DevOwl\RealCookieBanner\lite\presets\GoogleAnalyticsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MATOMO =>
                \DevOwl\RealCookieBanner\lite\presets\MatomoPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_AD_SENSE =>
                \DevOwl\RealCookieBanner\lite\presets\GoogleAdSensePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_ADS =>
                \DevOwl\RealCookieBanner\lite\presets\GoogleAds::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_PIXEL =>
                \DevOwl\RealCookieBanner\lite\presets\FacebookPixelPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_LIKE =>
                \DevOwl\RealCookieBanner\lite\presets\FacebookLikePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_SHARE =>
                \DevOwl\RealCookieBanner\lite\presets\FacebookSharePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::HOTJAR =>
                \DevOwl\RealCookieBanner\lite\presets\HotjarPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::AMAZON_ASSOCIATES_WIDGET =>
                \DevOwl\RealCookieBanner\lite\presets\AmazonAssociatesWidgetPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::INTERCOM_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\IntercomChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ZENDESK_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\ZendeskChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FRESHCHAT =>
                \DevOwl\RealCookieBanner\lite\presets\FreshchatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::HELP_CRUNCH_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\HelpCrunchChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::HELP_SCOUT_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\HelpScoutChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TIDIO_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\TidioChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TAWK_TO_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\TawkToChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::REAMAZE_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\ReamazeChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PINTEREST =>
                \DevOwl\RealCookieBanner\lite\presets\PinterestPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::IMGUR =>
                \DevOwl\RealCookieBanner\lite\presets\ImgurPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_TRANSLATE =>
                \DevOwl\RealCookieBanner\lite\presets\GoogleTranslatePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ADOBE_TYPEKIT =>
                \DevOwl\RealCookieBanner\lite\presets\AdobeTypekitPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_PAGE_PLUGIN =>
                \DevOwl\RealCookieBanner\lite\presets\FacebookPagePluginPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FLICKR =>
                \DevOwl\RealCookieBanner\lite\presets\FlickrPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::VG_WORT =>
                \DevOwl\RealCookieBanner\lite\presets\VGWortPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PADDLE_COM =>
                \DevOwl\RealCookieBanner\lite\presets\PaddleComPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_ANALYTICS_4 =>
                \DevOwl\RealCookieBanner\lite\presets\GoogleAnalytics4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MICROSOFT_CLARITY =>
                \DevOwl\RealCookieBanner\lite\presets\MicrosoftClarityPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_TRENDS =>
                \DevOwl\RealCookieBanner\lite\presets\GoogleTrendsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ZOHO_BOOKINGS =>
                \DevOwl\RealCookieBanner\lite\presets\ZohoBookingsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ZOHO_FORMS =>
                \DevOwl\RealCookieBanner\lite\presets\ZohoFormsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ADD_TO_ANY =>
                \DevOwl\RealCookieBanner\lite\presets\AddToAnyPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::APPLE_MUSIC =>
                \DevOwl\RealCookieBanner\lite\presets\AppleMusicPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ANCHOR_FM =>
                \DevOwl\RealCookieBanner\lite\presets\AnchorFmPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::SPOTIFY =>
                \DevOwl\RealCookieBanner\lite\presets\SpotifyPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::REDDIT =>
                \DevOwl\RealCookieBanner\lite\presets\RedditPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TIKTOK =>
                \DevOwl\RealCookieBanner\lite\presets\TikTokPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::BING_MAPS =>
                \DevOwl\RealCookieBanner\lite\presets\BingMapsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ADD_THIS =>
                \DevOwl\RealCookieBanner\lite\presets\AddThisPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ACTIVE_CAMPAIGN_SITE_TRACKING =>
                \DevOwl\RealCookieBanner\lite\presets\ActiveCampaignSiteTrackingPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::DISCORD_WIDGET =>
                \DevOwl\RealCookieBanner\lite\presets\DiscordWidgetPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MY_FONTS =>
                \DevOwl\RealCookieBanner\lite\presets\MyFontsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PROVEN_EXPERT_WIDGET =>
                \DevOwl\RealCookieBanner\lite\presets\ProvenExpertWidgetPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::USERLIKE =>
                \DevOwl\RealCookieBanner\lite\presets\UserlikePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MOUSEFLOW =>
                \DevOwl\RealCookieBanner\lite\presets\MouseflowPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MONSTERINSIGHTS =>
                \DevOwl\RealCookieBanner\lite\presets\MonsterInsightsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GA_GOOGLE_ANALYTICS =>
                \DevOwl\RealCookieBanner\lite\presets\GAGoogleAnalyticsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GA_GOOGLE_ANALYTICS_4 =>
                \DevOwl\RealCookieBanner\lite\presets\GAGoogleAnalytics4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EXACT_METRICS =>
                \DevOwl\RealCookieBanner\lite\presets\ExactMetricsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ANALYTIFY =>
                \DevOwl\RealCookieBanner\lite\presets\AnalytifyPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GOOGLE_ANALYTICS =>
                \DevOwl\RealCookieBanner\lite\presets\WooCommerceGoogleAnalyticsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GOOGLE_ANALYTICS_4 =>
                \DevOwl\RealCookieBanner\lite\presets\WooCommerceGoogleAnalytics4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_FOR_WOOCOMMERCE =>
                \DevOwl\RealCookieBanner\lite\presets\FacebookForWooCommercePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MATOMO_PLUGIN =>
                \DevOwl\RealCookieBanner\lite\presets\MatomoPluginPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::STRIPE =>
                \DevOwl\RealCookieBanner\lite\presets\StripePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GATEWAY_STRIPE =>
                \DevOwl\RealCookieBanner\lite\presets\WooCommerceGatewayStripePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MAILCHIMP_FOR_WOOCOMMERCE =>
                \DevOwl\RealCookieBanner\lite\presets\MailchimpForWooCommercePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::LUCKY_ORANGE =>
                \DevOwl\RealCookieBanner\lite\presets\LuckyOrangePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CUSTOM_FACEBOOK_FEED =>
                \DevOwl\RealCookieBanner\lite\presets\CustomFacebookFeedPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CUSTOM_TWITTER_FEED =>
                \DevOwl\RealCookieBanner\lite\presets\CustomTwitterFeedPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FEEDS_FOR_YOUTUBE =>
                \DevOwl\RealCookieBanner\lite\presets\FeedsForYoutubePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MAILERLITE =>
                \DevOwl\RealCookieBanner\lite\presets\MailerLitePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CLEANTALK_SPAM_PROTECT =>
                \DevOwl\RealCookieBanner\lite\presets\CleanTalkSpamProtectPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WORDFENCE =>
                \DevOwl\RealCookieBanner\lite\presets\WordfencePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TRANSLATEPRESS =>
                \DevOwl\RealCookieBanner\lite\presets\TranslatePressPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ISSUU =>
                \DevOwl\RealCookieBanner\lite\presets\IssuuPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KLARNA_CHECKOUT_WOOCOMMERCE =>
                \DevOwl\RealCookieBanner\lite\presets\KlarnaCheckoutWooCommercePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::QUFORM =>
                \DevOwl\RealCookieBanner\lite\presets\QuformPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PINTEREST_TAG =>
                \DevOwl\RealCookieBanner\lite\presets\PinterestTagPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::HCAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\HCaptchaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::BING_ADS =>
                \DevOwl\RealCookieBanner\lite\presets\BingAdsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::YANDEX_METRICA =>
                \DevOwl\RealCookieBanner\lite\presets\YandexMetricaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FOUND_EE =>
                \DevOwl\RealCookieBanner\lite\presets\FoundEePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::BLOOM =>
                \DevOwl\RealCookieBanner\lite\presets\BloomPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TYPEFORM =>
                \DevOwl\RealCookieBanner\lite\presets\TypeformPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::RANKMATH_GA =>
                \DevOwl\RealCookieBanner\lite\presets\RankMathGAPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::THRIVE_LEADS =>
                \DevOwl\RealCookieBanner\lite\presets\ThriveLeadsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::POPUP_MAKER =>
                \DevOwl\RealCookieBanner\lite\presets\PopupMakerPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::METRICOOL =>
                \DevOwl\RealCookieBanner\lite\presets\MetricoolPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EZOIC_ESSENTIAL =>
                \DevOwl\RealCookieBanner\lite\presets\EzoicEssentialPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EZOIC_PREFERENCES =>
                \DevOwl\RealCookieBanner\lite\presets\EzoicPreferencesPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EZOIC_STATISTIC =>
                \DevOwl\RealCookieBanner\lite\presets\EzoicStatisticPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EZOIC_MARKETING =>
                \DevOwl\RealCookieBanner\lite\presets\EzoicMarketingPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::SOUNDCLOUD =>
                \DevOwl\RealCookieBanner\lite\presets\SoundCloudPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::VIMEO =>
                \DevOwl\RealCookieBanner\lite\presets\VimeoPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::XING_EVENTS =>
                \DevOwl\RealCookieBanner\lite\presets\XingEventsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::SENDINBLUE =>
                \DevOwl\RealCookieBanner\lite\presets\SendinbluePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::AWIN_LINK_AND_IMAGE_ADS =>
                \DevOwl\RealCookieBanner\lite\presets\AwinLinkImageAdsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::AWIN_PUBLISHER_MASTERTAG =>
                \DevOwl\RealCookieBanner\lite\presets\AwinPublisherMasterTagPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CONVERTKIT =>
                \DevOwl\RealCookieBanner\lite\presets\ConvertKitPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MATOMO_INTEGRATION_PLUGIN =>
                \DevOwl\RealCookieBanner\lite\presets\MatomoIntegrationPluginPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GETYOURGUIDE =>
                \DevOwl\RealCookieBanner\lite\presets\GetYourGuidePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CALENDLY =>
                \DevOwl\RealCookieBanner\lite\presets\CalendlyPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MY_CRUISE_EXCURSION =>
                \DevOwl\RealCookieBanner\lite\presets\MyCruiseExcursionPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MAILPOET =>
                \DevOwl\RealCookieBanner\lite\presets\MailPoetPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::SMASH_BALLOON_SOCIAL_PHOTO_FEED =>
                \DevOwl\RealCookieBanner\lite\presets\SmashBalloonSocialPhotoFeedPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PODIGEE =>
                \DevOwl\RealCookieBanner\lite\presets\PodigeePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::AD_INSERTER =>
                \DevOwl\RealCookieBanner\lite\presets\AdInserterPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::DAILYMOTION =>
                \DevOwl\RealCookieBanner\lite\presets\DailyMotionPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GIPHY =>
                \DevOwl\RealCookieBanner\lite\presets\GiphyPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::LINKEDIN_ADS =>
                \DevOwl\RealCookieBanner\lite\presets\LinkedInAdsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::LOOM =>
                \DevOwl\RealCookieBanner\lite\presets\LoomPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::OPEN_STREET_MAP =>
                \DevOwl\RealCookieBanner\lite\presets\OpenStreetMapPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TIKTOK_PIXEL =>
                \DevOwl\RealCookieBanner\lite\presets\TikTokPixelPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TABOOLA =>
                \DevOwl\RealCookieBanner\lite\presets\TaboolaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PERFMATTERS_GA =>
                \DevOwl\RealCookieBanner\lite\presets\PerfmattersGAPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PERFMATTERS_GA4 =>
                \DevOwl\RealCookieBanner\lite\presets\PerfmattersGA4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WP_CERBER_SECURITY =>
                \DevOwl\RealCookieBanner\lite\presets\WPCerberSecurityPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KOMOOT =>
                \DevOwl\RealCookieBanner\lite\presets\KomootPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GEOLOCATION =>
                \DevOwl\RealCookieBanner\lite\presets\WooCommerceGeolocationPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KLIKEN =>
                \DevOwl\RealCookieBanner\lite\presets\KlikenPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KLAVIYO =>
                \DevOwl\RealCookieBanner\lite\presets\KlaviyoPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TI_WOOCOMMERCE_WISHLIST =>
                \DevOwl\RealCookieBanner\lite\presets\TiWooCommerceWishlistPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ANALYTIFY_4 =>
                \DevOwl\RealCookieBanner\lite\presets\Analytify4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MONSTERINSIGHTS_4 =>
                \DevOwl\RealCookieBanner\lite\presets\MonsterInsights4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EXACT_METRICS_4 =>
                \DevOwl\RealCookieBanner\lite\presets\ExactMetrics4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GOOGLE_ANALYTICS_PRO =>
                \DevOwl\RealCookieBanner\lite\presets\WooCommerceGoogleAnalyticsProPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PIWIK_PRO =>
                \DevOwl\RealCookieBanner\lite\presets\PiwikProPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_GRAPH =>
                \DevOwl\RealCookieBanner\lite\presets\FacebookGraphPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_USER_CONTENT =>
                \DevOwl\RealCookieBanner\lite\presets\GoogleUserContentPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TRUSTINDEX_IO =>
                \DevOwl\RealCookieBanner\lite\presets\TrustindexIoPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ETRACKER =>
                \DevOwl\RealCookieBanner\lite\presets\EtrackerPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ETRACKER_WITH_CONSENT =>
                \DevOwl\RealCookieBanner\lite\presets\EtrackerWithConsentPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::RANKMATH_GA_4 =>
                \DevOwl\RealCookieBanner\lite\presets\RankMathGA4Preset::class
        ]);
    }
    /**
     * Create PRO-specific blocker presets.
     *
     * @param array $result
     */
    public function createProBlockerPresets($result) {
        return \array_merge($result, [
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PINTEREST =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\PinterestPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::IMGUR =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ImgurPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_TRANSLATE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GoogleTranslatePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GoogleRecaptchaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ADOBE_TYPEKIT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\AdobeTypekitPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_MAPS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GoogleMapsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TWITTER_TWEET =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\TwitterTweetPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FLICKR =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FlickrPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::INSTAGRAM_POST =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\InstagramPostPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_PAGE_PLUGIN =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FacebookPagePluginPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_SHARE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FacebookSharePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_LIKE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FacebookLikePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_POST =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FacebookPostPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CONTACT_FORM_7_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ContactForm7RecaptchaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FORM_MAKER_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FormMakerRecaptchaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CALDERA_FORMS_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\CalderaFormsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::NINJA_FORMS_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\NinjaFormsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WPFORMS_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\WPFormsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FORMIDABLE_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FormidablePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::VG_WORT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\VGWortPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_TRENDS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GoogleTrendsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ZOHO_BOOKINGS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ZohoBookingsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ZOHO_FORMS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ZohoFormsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ADD_TO_ANY =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\AddToAnyPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::APPLE_MUSIC =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\AppleMusicPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ANCHOR_FM =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\AnchorFmPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::SPOTIFY =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\SpotifyPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::REDDIT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\RedditPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TIKTOK =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\TikTokPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::BING_MAPS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\BingMapsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ADD_THIS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\AddThisPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ACTIVE_CAMPAIGN_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ActiveCampaignFormPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::DISCORD_WIDGET =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\DiscordWidgetPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_PIXEL =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FacebookPixelPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MY_FONTS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MyFontsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PROVEN_EXPERT_WIDGET =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ProvenExpertWidgetPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_ANALYTICS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GoogleAnalyticsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MONSTERINSIGHTS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MonsterInsightsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GA_GOOGLE_ANALYTICS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GAGoogleAnalyticsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EXACT_METRICS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ExactMetricsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ANALYTIFY =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\AnalytifyPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GOOGLE_ANALYTICS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\WooCommerceGoogleAnalyticsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_FOR_WOOCOMMERCE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FacebookForWooCommercePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MATOMO_PLUGIN =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MatomoPluginPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MAILCHIMP_FOR_WOOCOMMERCE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MailchimpForWooCommercePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CLEVERREACH_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\CleverReachRecaptchaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CUSTOM_FACEBOOK_FEED =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\CustomFacebookFeedPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CUSTOM_TWITTER_FEED =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\CustomTwitterFeedPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FEEDS_FOR_YOUTUBE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FeedsForYoutubePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MAILERLITE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MailerLitePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ISSUU =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\IssuuPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::QUFORM =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\QuformRecaptchaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PINTEREST_TAG =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\PinterestTagPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::YANDEX_METRICA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\YandexMetricaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::BLOOM =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\BloomPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TYPEFORM =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\TypeformPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::RANKMATH_GA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\RankMathGAPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::THRIVE_LEADS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ThriveLeadsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::POPUP_MAKER =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\PopupMakerPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::METRICOOL =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MetricoolPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::SOUNDCLOUD =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\SoundCloudPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::VIMEO =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\VimeoPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::XING_EVENTS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\XingEventsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::SENDINBLUE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\SendinbluePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::AWIN_LINK_AND_IMAGE_ADS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\AwinLinkImageAdsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CONVERTKIT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ConvertKitPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MATOMO_INTEGRATION_PLUGIN =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MatomoIntegrationPluginPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GETYOURGUIDE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GetYourGuidePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CALENDLY =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\CalendlyPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MY_CRUISE_EXCURSION =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MyCruiseExcursionPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MAILPOET =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MailPoetPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::SMASH_BALLOON_SOCIAL_PHOTO_FEED =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\SmashBalloonSocialPhotoFeedPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ACTIVE_CAMPAIGN_SITE_TRACKING =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ActiveCampaignSiteTrackingPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::HOTJAR =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\HotjarPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::INTERCOM_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\IntercomChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MICROSOFT_CLARITY =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MicrosoftClarityPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MOUSEFLOW =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MouseflowPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TAWK_TO_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\TawkToChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TIDIO_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\TidioChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::USERLIKE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\UserlikePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ZENDESK_CHAT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ZendeskChatPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_ANALYTICS_4 =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GoogleAnalytics4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GA_GOOGLE_ANALYTICS_4 =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GAGoogleAnalytics4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GOOGLE_ANALYTICS_4 =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\WooCommerceGoogleAnalytics4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PODIGEE =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\PodigeePreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::AD_INSERTER =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\AdInserterPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::DAILYMOTION =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\DailymotionPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GIPHY =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GiphyPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::LINKEDIN_ADS =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\LinkedInAdsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::LOOM =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\LoomPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::OPEN_STREET_MAP =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\OpenStreetMapPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TABOOLA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\TaboolaPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ELEMENTOR_FORMS_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ElementorFormsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PERFMATTERS_GA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\PerfmattersGAPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PERFMATTERS_GA4 =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\PerfmattersGA4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KOMOOT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\KomootPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KLIKEN =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\KlikenPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KLAVIYO =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\KlaviyoPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TI_WOOCOMMERCE_WISHLIST =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\TiWooCommerceWishlistPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::HAPPYFORMS_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\HappyFormsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ANALYTIFY_4 =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\Analytify4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MONSTERINSIGHTS_4 =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\MonsterInsights4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EXACT_METRICS_4 =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\ExactMetrics4Preset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GOOGLE_ANALYTICS_PRO =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\WooCommerceGoogleAnalyticsProPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FIVE_STAR_RESTAURANT_RESERVATION =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FiveStarRestaurantReservationsPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::DIVI_CONTACT_FORM_RECAPTCHA =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\DiviContactFormPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::PIWIK_PRO =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\PiwikProPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FACEBOOK_GRAPH =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\FacebookGraphPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_USER_CONTENT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\GoogleUserContentPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::TRUSTINDEX_IO =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\TrustindexIoPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ETRACKER =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\EtrackerPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ETRACKER_WITH_CONSENT =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\EtrackerWithConsentPreset::class,
            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::RANKMATH_GA_4 =>
                \DevOwl\RealCookieBanner\lite\presets\blocker\RankMathGA4Preset::class
        ]);
    }
}
