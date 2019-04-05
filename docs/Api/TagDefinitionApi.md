# Killbill\Client\TagDefinitionApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createTagDefinition**](TagDefinitionApi.md#createTagDefinition) | **POST** /1.0/kb/tagDefinitions | Create a tag definition
[**deleteTagDefinition**](TagDefinitionApi.md#deleteTagDefinition) | **DELETE** /1.0/kb/tagDefinitions/{tagDefinitionId} | Delete a tag definition
[**getTagDefinition**](TagDefinitionApi.md#getTagDefinition) | **GET** /1.0/kb/tagDefinitions/{tagDefinitionId} | Retrieve a tag definition
[**getTagDefinitionAuditLogsWithHistory**](TagDefinitionApi.md#getTagDefinitionAuditLogsWithHistory) | **GET** /1.0/kb/tagDefinitions/{tagDefinitionId}/auditLogsWithHistory | Retrieve tag definition audit logs with history by id
[**getTagDefinitions**](TagDefinitionApi.md#getTagDefinitions) | **GET** /1.0/kb/tagDefinitions | List tag definitions

# **createTagDefinition**
> \Killbill\Client\Model\TagDefinition createTagDefinition($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment)

Create a tag definition

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


$apiInstance = new Killbill\Client\Api\TagDefinitionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Model\TagDefinition(); // \Killbill\Client\Model\TagDefinition | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $result = $apiInstance->createTagDefinition($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagDefinitionApi->createTagDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\TagDefinition**](../Model/TagDefinition.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

[**\Killbill\Client\Model\TagDefinition**](../Model/TagDefinition.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteTagDefinition**
> deleteTagDefinition($tagDefinitionId, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment)

Delete a tag definition

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


$apiInstance = new Killbill\Client\Api\TagDefinitionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$tagDefinitionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->deleteTagDefinition($tagDefinitionId, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling TagDefinitionApi->deleteTagDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tagDefinitionId** | [**string**](../Model/.md)|  |
 **xKillbillCreatedBy** | **string**|  |
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

# **getTagDefinition**
> \Killbill\Client\Model\TagDefinition getTagDefinition($tagDefinitionId, $audit)

Retrieve a tag definition

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


$apiInstance = new Killbill\Client\Api\TagDefinitionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$tagDefinitionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$audit = "audit_example"; // string | 

try {
    $result = $apiInstance->getTagDefinition($tagDefinitionId, $audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagDefinitionApi->getTagDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tagDefinitionId** | [**string**](../Model/.md)|  |
 **audit** | **string**|  | [optional]

### Return type

[**\Killbill\Client\Model\TagDefinition**](../Model/TagDefinition.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTagDefinitionAuditLogsWithHistory**
> \Killbill\Client\Model\AuditLog[] getTagDefinitionAuditLogsWithHistory($tagDefinitionId)

Retrieve tag definition audit logs with history by id

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


$apiInstance = new Killbill\Client\Api\TagDefinitionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$tagDefinitionId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 

try {
    $result = $apiInstance->getTagDefinitionAuditLogsWithHistory($tagDefinitionId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagDefinitionApi->getTagDefinitionAuditLogsWithHistory: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tagDefinitionId** | [**string**](../Model/.md)|  |

### Return type

[**\Killbill\Client\Model\AuditLog[]**](../Model/AuditLog.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTagDefinitions**
> \Killbill\Client\Model\TagDefinition[] getTagDefinitions($audit)

List tag definitions

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


$apiInstance = new Killbill\Client\Api\TagDefinitionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$audit = "audit_example"; // string | 

try {
    $result = $apiInstance->getTagDefinitions($audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagDefinitionApi->getTagDefinitions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **audit** | **string**|  | [optional]

### Return type

[**\Killbill\Client\Model\TagDefinition[]**](../Model/TagDefinition.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

