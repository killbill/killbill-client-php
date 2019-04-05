# Killbill\Client\SubscriptionApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addSubscriptionBlockingState**](SubscriptionApi.md#addSubscriptionBlockingState) | **POST** /1.0/kb/subscriptions/{subscriptionId}/block | Block a subscription
[**cancelSubscriptionPlan**](SubscriptionApi.md#cancelSubscriptionPlan) | **DELETE** /1.0/kb/subscriptions/{subscriptionId} | Cancel an entitlement plan
[**changeSubscriptionPlan**](SubscriptionApi.md#changeSubscriptionPlan) | **PUT** /1.0/kb/subscriptions/{subscriptionId} | Change entitlement plan
[**createSubscription**](SubscriptionApi.md#createSubscription) | **POST** /1.0/kb/subscriptions | Create an subscription
[**createSubscriptionCustomFields**](SubscriptionApi.md#createSubscriptionCustomFields) | **POST** /1.0/kb/subscriptions/{subscriptionId}/customFields | Add custom fields to subscription
[**createSubscriptionTags**](SubscriptionApi.md#createSubscriptionTags) | **POST** /1.0/kb/subscriptions/{subscriptionId}/tags | 
[**createSubscriptionWithAddOns**](SubscriptionApi.md#createSubscriptionWithAddOns) | **POST** /1.0/kb/subscriptions/createSubscriptionWithAddOns | Create an entitlement with addOn products
[**createSubscriptionsWithAddOns**](SubscriptionApi.md#createSubscriptionsWithAddOns) | **POST** /1.0/kb/subscriptions/createSubscriptionsWithAddOns | Create multiple entitlements with addOn products
[**deleteSubscriptionCustomFields**](SubscriptionApi.md#deleteSubscriptionCustomFields) | **DELETE** /1.0/kb/subscriptions/{subscriptionId}/customFields | Remove custom fields from subscription
[**deleteSubscriptionTags**](SubscriptionApi.md#deleteSubscriptionTags) | **DELETE** /1.0/kb/subscriptions/{subscriptionId}/tags | Remove tags from subscription
[**getSubscription**](SubscriptionApi.md#getSubscription) | **GET** /1.0/kb/subscriptions/{subscriptionId} | Retrieve a subscription by id
[**getSubscriptionCustomFields**](SubscriptionApi.md#getSubscriptionCustomFields) | **GET** /1.0/kb/subscriptions/{subscriptionId}/customFields | Retrieve subscription custom fields
[**getSubscriptionTags**](SubscriptionApi.md#getSubscriptionTags) | **GET** /1.0/kb/subscriptions/{subscriptionId}/tags | Retrieve subscription tags
[**modifySubscriptionCustomFields**](SubscriptionApi.md#modifySubscriptionCustomFields) | **PUT** /1.0/kb/subscriptions/{subscriptionId}/customFields | Modify custom fields to subscription
[**uncancelSubscriptionPlan**](SubscriptionApi.md#uncancelSubscriptionPlan) | **PUT** /1.0/kb/subscriptions/{subscriptionId}/uncancel | Un-cancel an entitlement
[**undoChangeSubscriptionPlan**](SubscriptionApi.md#undoChangeSubscriptionPlan) | **PUT** /1.0/kb/subscriptions/{subscriptionId}/undoChangePlan | Undo a pending change plan on an entitlement
[**updateSubscriptionBCD**](SubscriptionApi.md#updateSubscriptionBCD) | **PUT** /1.0/kb/subscriptions/{subscriptionId}/bcd | Update the BCD associated to a subscription

# **addSubscriptionBlockingState**
> \Killbill\Client\Model\BlockingState[] addSubscriptionBlockingState($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment, $requestedDate, $pluginProperty)

Block a subscription

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Model\BlockingState(); // \Killbill\Client\Model\BlockingState | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$requestedDate = new \DateTime("2013-10-20"); // \DateTime | 
$pluginProperty = array("pluginProperty_example"); // string[] | 

try {
    $result = $apiInstance->addSubscriptionBlockingState($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment, $requestedDate, $pluginProperty);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->addSubscriptionBlockingState: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\BlockingState**](../Model/BlockingState.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **requestedDate** | **\DateTime**|  | [optional]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]

### Return type

[**\Killbill\Client\Model\BlockingState[]**](../Model/BlockingState.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **cancelSubscriptionPlan**
> cancelSubscriptionPlan($subscriptionId, $xKillbillCreatedBy, $requestedDate, $callCompletion, $callTimeoutSec, $entitlementPolicy, $billingPolicy, $useRequestedDateForBilling, $pluginProperty, $xKillbillReason, $xKillbillComment)

Cancel an entitlement plan

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$requestedDate = new \DateTime("2013-10-20"); // \DateTime | 
$callCompletion = true; // bool | 
$callTimeoutSec = 789; // int | 
$entitlementPolicy = "entitlementPolicy_example"; // string | 
$billingPolicy = "billingPolicy_example"; // string | 
$useRequestedDateForBilling = true; // bool | 
$pluginProperty = array("pluginProperty_example"); // string[] | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->cancelSubscriptionPlan($subscriptionId, $xKillbillCreatedBy, $requestedDate, $callCompletion, $callTimeoutSec, $entitlementPolicy, $billingPolicy, $useRequestedDateForBilling, $pluginProperty, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->cancelSubscriptionPlan: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **requestedDate** | **\DateTime**|  | [optional]
 **callCompletion** | **bool**|  | [optional]
 **callTimeoutSec** | **int**|  | [optional]
 **entitlementPolicy** | **string**|  | [optional]
 **billingPolicy** | **string**|  | [optional]
 **useRequestedDateForBilling** | **bool**|  | [optional]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **changeSubscriptionPlan**
> changeSubscriptionPlan($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment, $requestedDate, $callCompletion, $callTimeoutSec, $billingPolicy, $pluginProperty)

Change entitlement plan

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Model\Subscription(); // \Killbill\Client\Model\Subscription | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$requestedDate = new \DateTime("2013-10-20"); // \DateTime | 
$callCompletion = true; // bool | 
$callTimeoutSec = 789; // int | 
$billingPolicy = "billingPolicy_example"; // string | 
$pluginProperty = array("pluginProperty_example"); // string[] | 

try {
    $apiInstance->changeSubscriptionPlan($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment, $requestedDate, $callCompletion, $callTimeoutSec, $billingPolicy, $pluginProperty);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->changeSubscriptionPlan: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\Subscription**](../Model/Subscription.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **requestedDate** | **\DateTime**|  | [optional]
 **callCompletion** | **bool**|  | [optional]
 **callTimeoutSec** | **int**|  | [optional]
 **billingPolicy** | **string**|  | [optional]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createSubscription**
> \Killbill\Client\Model\Subscription createSubscription($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $entitlementDate, $billingDate, $renameKeyIfExistsAndUnused, $migrated, $callCompletion, $callTimeoutSec, $pluginProperty)

Create an subscription

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Model\Subscription(); // \Killbill\Client\Model\Subscription | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$entitlementDate = new \DateTime("2013-10-20"); // \DateTime | 
$billingDate = new \DateTime("2013-10-20"); // \DateTime | 
$renameKeyIfExistsAndUnused = true; // bool | 
$migrated = true; // bool | 
$callCompletion = true; // bool | 
$callTimeoutSec = 789; // int | 
$pluginProperty = array("pluginProperty_example"); // string[] | 

try {
    $result = $apiInstance->createSubscription($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $entitlementDate, $billingDate, $renameKeyIfExistsAndUnused, $migrated, $callCompletion, $callTimeoutSec, $pluginProperty);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->createSubscription: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\Subscription**](../Model/Subscription.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **entitlementDate** | **\DateTime**|  | [optional]
 **billingDate** | **\DateTime**|  | [optional]
 **renameKeyIfExistsAndUnused** | **bool**|  | [optional]
 **migrated** | **bool**|  | [optional]
 **callCompletion** | **bool**|  | [optional]
 **callTimeoutSec** | **int**|  | [optional]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]

### Return type

[**\Killbill\Client\Model\Subscription**](../Model/Subscription.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createSubscriptionCustomFields**
> createSubscriptionCustomFields($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment)

Add custom fields to subscription

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Killbill\Client\Model\CustomField()); // \Killbill\Client\Model\CustomField[] | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->createSubscriptionCustomFields($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->createSubscriptionCustomFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\CustomField[]**](../Model/CustomField.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createSubscriptionTags**
> createSubscriptionTags($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array("body_example"); // string[] | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->createSubscriptionTags($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->createSubscriptionTags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**string[]**](../Model/string.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createSubscriptionWithAddOns**
> \Killbill\Client\Model\Bundle createSubscriptionWithAddOns($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $entitlementDate, $billingDate, $migrated, $renameKeyIfExistsAndUnused, $callCompletion, $callTimeoutSec, $pluginProperty)

Create an entitlement with addOn products

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Killbill\Client\Model\Subscription()); // \Killbill\Client\Model\Subscription[] | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$entitlementDate = new \DateTime("2013-10-20"); // \DateTime | 
$billingDate = new \DateTime("2013-10-20"); // \DateTime | 
$migrated = true; // bool | 
$renameKeyIfExistsAndUnused = true; // bool | 
$callCompletion = true; // bool | 
$callTimeoutSec = 789; // int | 
$pluginProperty = array("pluginProperty_example"); // string[] | 

try {
    $result = $apiInstance->createSubscriptionWithAddOns($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $entitlementDate, $billingDate, $migrated, $renameKeyIfExistsAndUnused, $callCompletion, $callTimeoutSec, $pluginProperty);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->createSubscriptionWithAddOns: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\Subscription[]**](../Model/Subscription.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **entitlementDate** | **\DateTime**|  | [optional]
 **billingDate** | **\DateTime**|  | [optional]
 **migrated** | **bool**|  | [optional]
 **renameKeyIfExistsAndUnused** | **bool**|  | [optional]
 **callCompletion** | **bool**|  | [optional]
 **callTimeoutSec** | **int**|  | [optional]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]

### Return type

[**\Killbill\Client\Model\Bundle**](../Model/Bundle.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createSubscriptionsWithAddOns**
> \Killbill\Client\Model\Bundle[] createSubscriptionsWithAddOns($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $entitlementDate, $billingDate, $renameKeyIfExistsAndUnused, $migrated, $callCompletion, $callTimeoutSec, $pluginProperty)

Create multiple entitlements with addOn products

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Killbill\Client\Model\BulkSubscriptionsBundle()); // \Killbill\Client\Model\BulkSubscriptionsBundle[] | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$entitlementDate = new \DateTime("2013-10-20"); // \DateTime | 
$billingDate = new \DateTime("2013-10-20"); // \DateTime | 
$renameKeyIfExistsAndUnused = true; // bool | 
$migrated = true; // bool | 
$callCompletion = true; // bool | 
$callTimeoutSec = 789; // int | 
$pluginProperty = array("pluginProperty_example"); // string[] | 

try {
    $result = $apiInstance->createSubscriptionsWithAddOns($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $entitlementDate, $billingDate, $renameKeyIfExistsAndUnused, $migrated, $callCompletion, $callTimeoutSec, $pluginProperty);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->createSubscriptionsWithAddOns: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\BulkSubscriptionsBundle[]**](../Model/BulkSubscriptionsBundle.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **entitlementDate** | **\DateTime**|  | [optional]
 **billingDate** | **\DateTime**|  | [optional]
 **renameKeyIfExistsAndUnused** | **bool**|  | [optional]
 **migrated** | **bool**|  | [optional]
 **callCompletion** | **bool**|  | [optional]
 **callTimeoutSec** | **int**|  | [optional]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]

### Return type

[**\Killbill\Client\Model\Bundle[]**](../Model/Bundle.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteSubscriptionCustomFields**
> deleteSubscriptionCustomFields($subscriptionId, $xKillbillCreatedBy, $customField, $xKillbillReason, $xKillbillComment)

Remove custom fields from subscription

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$customField = array("customField_example"); // string[] | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->deleteSubscriptionCustomFields($subscriptionId, $xKillbillCreatedBy, $customField, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->deleteSubscriptionCustomFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **customField** | [**string[]**](../Model/string.md)|  | [optional]
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteSubscriptionTags**
> deleteSubscriptionTags($subscriptionId, $xKillbillCreatedBy, $tagDef, $xKillbillReason, $xKillbillComment)

Remove tags from subscription

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$tagDef = array("tagDef_example"); // string[] | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->deleteSubscriptionTags($subscriptionId, $xKillbillCreatedBy, $tagDef, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->deleteSubscriptionTags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **tagDef** | [**string[]**](../Model/string.md)|  | [optional]
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSubscription**
> \Killbill\Client\Model\Subscription getSubscription($subscriptionId, $audit)

Retrieve a subscription by id

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$audit = "audit_example"; // string | 

try {
    $result = $apiInstance->getSubscription($subscriptionId, $audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->getSubscription: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscriptionId** | [**string**](../Model/.md)|  |
 **audit** | **string**|  | [optional]

### Return type

[**\Killbill\Client\Model\Subscription**](../Model/Subscription.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSubscriptionCustomFields**
> \Killbill\Client\Model\CustomField[] getSubscriptionCustomFields($subscriptionId, $audit)

Retrieve subscription custom fields

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$audit = "audit_example"; // string | 

try {
    $result = $apiInstance->getSubscriptionCustomFields($subscriptionId, $audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->getSubscriptionCustomFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscriptionId** | [**string**](../Model/.md)|  |
 **audit** | **string**|  | [optional]

### Return type

[**\Killbill\Client\Model\CustomField[]**](../Model/CustomField.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSubscriptionTags**
> \Killbill\Client\Model\Tag[] getSubscriptionTags($subscriptionId, $includedDeleted, $audit)

Retrieve subscription tags

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$includedDeleted = true; // bool | 
$audit = "audit_example"; // string | 

try {
    $result = $apiInstance->getSubscriptionTags($subscriptionId, $includedDeleted, $audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->getSubscriptionTags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscriptionId** | [**string**](../Model/.md)|  |
 **includedDeleted** | **bool**|  | [optional]
 **audit** | **string**|  | [optional]

### Return type

[**\Killbill\Client\Model\Tag[]**](../Model/Tag.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **modifySubscriptionCustomFields**
> modifySubscriptionCustomFields($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment)

Modify custom fields to subscription

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Killbill\Client\Model\CustomField()); // \Killbill\Client\Model\CustomField[] | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->modifySubscriptionCustomFields($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->modifySubscriptionCustomFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\CustomField[]**](../Model/CustomField.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uncancelSubscriptionPlan**
> uncancelSubscriptionPlan($subscriptionId, $xKillbillCreatedBy, $pluginProperty, $xKillbillReason, $xKillbillComment)

Un-cancel an entitlement

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$pluginProperty = array("pluginProperty_example"); // string[] | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->uncancelSubscriptionPlan($subscriptionId, $xKillbillCreatedBy, $pluginProperty, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->uncancelSubscriptionPlan: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **undoChangeSubscriptionPlan**
> undoChangeSubscriptionPlan($subscriptionId, $xKillbillCreatedBy, $pluginProperty, $xKillbillReason, $xKillbillComment)

Undo a pending change plan on an entitlement

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$pluginProperty = array("pluginProperty_example"); // string[] | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->undoChangeSubscriptionPlan($subscriptionId, $xKillbillCreatedBy, $pluginProperty, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->undoChangeSubscriptionPlan: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateSubscriptionBCD**
> updateSubscriptionBCD($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment, $effectiveFromDate, $forceNewBcdWithPastEffectiveDate)

Update the BCD associated to a subscription

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Model\Subscription(); // \Killbill\Client\Model\Subscription | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$subscriptionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$effectiveFromDate = new \DateTime("2013-10-20"); // \DateTime | 
$forceNewBcdWithPastEffectiveDate = true; // bool | 

try {
    $apiInstance->updateSubscriptionBCD($body, $xKillbillCreatedBy, $subscriptionId, $xKillbillReason, $xKillbillComment, $effectiveFromDate, $forceNewBcdWithPastEffectiveDate);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->updateSubscriptionBCD: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\Subscription**](../Model/Subscription.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **subscriptionId** | [**string**](../Model/.md)|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **effectiveFromDate** | **\DateTime**|  | [optional]
 **forceNewBcdWithPastEffectiveDate** | **bool**|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

