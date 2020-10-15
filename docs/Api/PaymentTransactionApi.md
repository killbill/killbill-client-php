# Killbill\Client\Swagger\PaymentTransactionApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTransactionCustomFields**](PaymentTransactionApi.md#createtransactioncustomfields) | **POST** /1.0/kb/paymentTransactions/{transactionId}/customFields | Add custom fields to payment transaction
[**createTransactionTags**](PaymentTransactionApi.md#createtransactiontags) | **POST** /1.0/kb/paymentTransactions/{transactionId}/tags | Add tags to payment transaction
[**deleteTransactionCustomFields**](PaymentTransactionApi.md#deletetransactioncustomfields) | **DELETE** /1.0/kb/paymentTransactions/{transactionId}/customFields | Remove custom fields from payment transaction
[**deleteTransactionTags**](PaymentTransactionApi.md#deletetransactiontags) | **DELETE** /1.0/kb/paymentTransactions/{transactionId}/tags | Remove tags from payment transaction
[**getPaymentByTransactionExternalKey**](PaymentTransactionApi.md#getpaymentbytransactionexternalkey) | **GET** /1.0/kb/paymentTransactions | Retrieve a payment by transaction external key
[**getPaymentByTransactionId**](PaymentTransactionApi.md#getpaymentbytransactionid) | **GET** /1.0/kb/paymentTransactions/{transactionId} | Retrieve a payment by transaction id
[**getTransactionAuditLogsWithHistory**](PaymentTransactionApi.md#gettransactionauditlogswithhistory) | **GET** /1.0/kb/paymentTransactions/{transactionId}/auditLogsWithHistory | Retrieve payment transaction audit logs with history by id
[**getTransactionCustomFields**](PaymentTransactionApi.md#gettransactioncustomfields) | **GET** /1.0/kb/paymentTransactions/{transactionId}/customFields | Retrieve payment transaction custom fields
[**getTransactionTags**](PaymentTransactionApi.md#gettransactiontags) | **GET** /1.0/kb/paymentTransactions/{transactionId}/tags | Retrieve payment transaction tags
[**modifyTransactionCustomFields**](PaymentTransactionApi.md#modifytransactioncustomfields) | **PUT** /1.0/kb/paymentTransactions/{transactionId}/customFields | Modify custom fields to payment transaction
[**notifyStateChanged**](PaymentTransactionApi.md#notifystatechanged) | **POST** /1.0/kb/paymentTransactions/{transactionId} | Mark a pending payment transaction as succeeded or failed

# **createTransactionCustomFields**
> \Killbill\Client\Swagger\Model\CustomField[] createTransactionCustomFields($body, $xKillbillCreatedBy, $transactionId, $xKillbillReason, $xKillbillComment)

Add custom fields to payment transaction

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Killbill\Client\Swagger\Model\CustomField()); // \Killbill\Client\Swagger\Model\CustomField[] | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$transactionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $result = $apiInstance->createTransactionCustomFields($body, $xKillbillCreatedBy, $transactionId, $xKillbillReason, $xKillbillComment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->createTransactionCustomFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Swagger\Model\CustomField[]**](../Model/CustomField.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **transactionId** | [**string**](../Model/.md)|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

[**\Killbill\Client\Swagger\Model\CustomField[]**](../Model/CustomField.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createTransactionTags**
> \Killbill\Client\Swagger\Model\Tag[] createTransactionTags($body, $xKillbillCreatedBy, $transactionId, $xKillbillReason, $xKillbillComment)

Add tags to payment transaction

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array("body_example"); // string[] | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$transactionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $result = $apiInstance->createTransactionTags($body, $xKillbillCreatedBy, $transactionId, $xKillbillReason, $xKillbillComment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->createTransactionTags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**string[]**](../Model/string.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **transactionId** | [**string**](../Model/.md)|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

[**\Killbill\Client\Swagger\Model\Tag[]**](../Model/Tag.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteTransactionCustomFields**
> deleteTransactionCustomFields($transactionId, $xKillbillCreatedBy, $customField, $xKillbillReason, $xKillbillComment)

Remove custom fields from payment transaction

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transactionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$customField = array("customField_example"); // string[] | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->deleteTransactionCustomFields($transactionId, $xKillbillCreatedBy, $customField, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->deleteTransactionCustomFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transactionId** | [**string**](../Model/.md)|  |
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

# **deleteTransactionTags**
> deleteTransactionTags($transactionId, $xKillbillCreatedBy, $tagDef, $xKillbillReason, $xKillbillComment)

Remove tags from payment transaction

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transactionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$tagDef = array("tagDef_example"); // string[] | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->deleteTransactionTags($transactionId, $xKillbillCreatedBy, $tagDef, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->deleteTransactionTags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transactionId** | [**string**](../Model/.md)|  |
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

# **getPaymentByTransactionExternalKey**
> \Killbill\Client\Swagger\Model\Payment getPaymentByTransactionExternalKey($transactionExternalKey, $withPluginInfo, $withAttempts, $pluginProperty, $audit)

Retrieve a payment by transaction external key

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transactionExternalKey = "transactionExternalKey_example"; // string | 
$withPluginInfo = false; // bool | 
$withAttempts = false; // bool | 
$pluginProperty = array("pluginProperty_example"); // string[] | 
$audit = "NONE"; // string | 

try {
    $result = $apiInstance->getPaymentByTransactionExternalKey($transactionExternalKey, $withPluginInfo, $withAttempts, $pluginProperty, $audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->getPaymentByTransactionExternalKey: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transactionExternalKey** | **string**|  |
 **withPluginInfo** | **bool**|  | [optional] [default to false]
 **withAttempts** | **bool**|  | [optional] [default to false]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]
 **audit** | **string**|  | [optional] [default to NONE]

### Return type

[**\Killbill\Client\Swagger\Model\Payment**](../Model/Payment.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPaymentByTransactionId**
> \Killbill\Client\Swagger\Model\Payment getPaymentByTransactionId($transactionId, $withPluginInfo, $withAttempts, $pluginProperty, $audit)

Retrieve a payment by transaction id

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transactionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$withPluginInfo = false; // bool | 
$withAttempts = false; // bool | 
$pluginProperty = array("pluginProperty_example"); // string[] | 
$audit = "NONE"; // string | 

try {
    $result = $apiInstance->getPaymentByTransactionId($transactionId, $withPluginInfo, $withAttempts, $pluginProperty, $audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->getPaymentByTransactionId: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transactionId** | [**string**](../Model/.md)|  |
 **withPluginInfo** | **bool**|  | [optional] [default to false]
 **withAttempts** | **bool**|  | [optional] [default to false]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]
 **audit** | **string**|  | [optional] [default to NONE]

### Return type

[**\Killbill\Client\Swagger\Model\Payment**](../Model/Payment.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTransactionAuditLogsWithHistory**
> \Killbill\Client\Swagger\Model\AuditLog[] getTransactionAuditLogsWithHistory($transactionId)

Retrieve payment transaction audit logs with history by id

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transactionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 

try {
    $result = $apiInstance->getTransactionAuditLogsWithHistory($transactionId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->getTransactionAuditLogsWithHistory: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transactionId** | [**string**](../Model/.md)|  |

### Return type

[**\Killbill\Client\Swagger\Model\AuditLog[]**](../Model/AuditLog.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTransactionCustomFields**
> \Killbill\Client\Swagger\Model\CustomField[] getTransactionCustomFields($transactionId, $audit)

Retrieve payment transaction custom fields

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transactionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$audit = "NONE"; // string | 

try {
    $result = $apiInstance->getTransactionCustomFields($transactionId, $audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->getTransactionCustomFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transactionId** | [**string**](../Model/.md)|  |
 **audit** | **string**|  | [optional] [default to NONE]

### Return type

[**\Killbill\Client\Swagger\Model\CustomField[]**](../Model/CustomField.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTransactionTags**
> \Killbill\Client\Swagger\Model\Tag[] getTransactionTags($transactionId, $includedDeleted, $audit)

Retrieve payment transaction tags

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transactionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$includedDeleted = false; // bool | 
$audit = "NONE"; // string | 

try {
    $result = $apiInstance->getTransactionTags($transactionId, $includedDeleted, $audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->getTransactionTags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transactionId** | [**string**](../Model/.md)|  |
 **includedDeleted** | **bool**|  | [optional] [default to false]
 **audit** | **string**|  | [optional] [default to NONE]

### Return type

[**\Killbill\Client\Swagger\Model\Tag[]**](../Model/Tag.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **modifyTransactionCustomFields**
> modifyTransactionCustomFields($body, $xKillbillCreatedBy, $transactionId, $xKillbillReason, $xKillbillComment)

Modify custom fields to payment transaction

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Killbill\Client\Swagger\Model\CustomField()); // \Killbill\Client\Swagger\Model\CustomField[] | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$transactionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->modifyTransactionCustomFields($body, $xKillbillCreatedBy, $transactionId, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->modifyTransactionCustomFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Swagger\Model\CustomField[]**](../Model/CustomField.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **transactionId** | [**string**](../Model/.md)|  |
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

# **notifyStateChanged**
> \Killbill\Client\Swagger\Model\Payment notifyStateChanged($body, $xKillbillCreatedBy, $transactionId, $xKillbillReason, $xKillbillComment, $controlPluginName)

Mark a pending payment transaction as succeeded or failed

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: Killbill Api Key
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiKey', 'Bearer');// Configure API key authorization: Killbill Api Secret
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKey('X-Killbill-ApiSecret', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Killbill-ApiSecret', 'Bearer');// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\PaymentTransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Swagger\Model\PaymentTransaction(); // \Killbill\Client\Swagger\Model\PaymentTransaction | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$transactionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$controlPluginName = array("controlPluginName_example"); // string[] | 

try {
    $result = $apiInstance->notifyStateChanged($body, $xKillbillCreatedBy, $transactionId, $xKillbillReason, $xKillbillComment, $controlPluginName);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentTransactionApi->notifyStateChanged: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Swagger\Model\PaymentTransaction**](../Model/PaymentTransaction.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **transactionId** | [**string**](../Model/.md)|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **controlPluginName** | [**string[]**](../Model/string.md)|  | [optional]

### Return type

[**\Killbill\Client\Swagger\Model\Payment**](../Model/Payment.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

