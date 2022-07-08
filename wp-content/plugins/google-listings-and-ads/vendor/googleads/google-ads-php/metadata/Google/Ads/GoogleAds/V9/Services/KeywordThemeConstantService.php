<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/keyword_theme_constant_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V9\Services;

class KeywordThemeConstantService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
>google/ads/googleads/v9/resources/keyword_theme_constant.proto!google.ads.googleads.v9.resourcesgoogle/api/resource.protogoogle/api/annotations.proto"�
KeywordThemeConstantL
resource_name (	B5�A�A/
-googleads.googleapis.com/KeywordThemeConstant
country_code (	B�AH �
language_code (	B�AH�
display_name (	B�AH�:y�Av
-googleads.googleapis.com/KeywordThemeConstantEkeywordThemeConstants/{express_category_id}~{express_sub_category_id}B
_country_codeB
_language_codeB
_display_nameB�
%com.google.ads.googleads.v9.resourcesBKeywordThemeConstantProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v9/resources;resources�GAA�!Google.Ads.GoogleAds.V9.Resources�!Google\\Ads\\GoogleAds\\V9\\Resources�%Google::Ads::GoogleAds::V9::Resourcesbproto3
�

Egoogle/ads/googleads/v9/services/keyword_theme_constant_service.proto google.ads.googleads.v9.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto"n
GetKeywordThemeConstantRequestL
resource_name (	B5�A�A/
-googleads.googleapis.com/KeywordThemeConstant"f
#SuggestKeywordThemeConstantsRequest

query_text (	
country_code (	
language_code (	"�
$SuggestKeywordThemeConstantsResponseX
keyword_theme_constants (27.google.ads.googleads.v9.resources.KeywordThemeConstant2�
KeywordThemeConstantService�
GetKeywordThemeConstant@.google.ads.googleads.v9.services.GetKeywordThemeConstantRequest7.google.ads.googleads.v9.resources.KeywordThemeConstant"C���-+/v9/{resource_name=keywordThemeConstants/*}�Aresource_name�
SuggestKeywordThemeConstantsE.google.ads.googleads.v9.services.SuggestKeywordThemeConstantsRequestF.google.ads.googleads.v9.services.SuggestKeywordThemeConstantsResponse",���&"!/v9/keywordThemeConstants:suggest:*E�Agoogleads.googleapis.com�A\'https://www.googleapis.com/auth/adwordsB�
$com.google.ads.googleads.v9.servicesB KeywordThemeConstantServiceProtoPZHgoogle.golang.org/genproto/googleapis/ads/googleads/v9/services;services�GAA� Google.Ads.GoogleAds.V9.Services� Google\\Ads\\GoogleAds\\V9\\Services�$Google::Ads::GoogleAds::V9::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}

