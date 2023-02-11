# Killbill\Client\Swagger\TagApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTagAuditLogsWithHistory**](TagApi.md#gettagauditlogswithhistory) | **GET** /1.0/kb/tags/{tagId}/auditLogsWithHistory | Retrieve tag audit logs with history by id
[**getTags**](TagApi.md#gettags) | **GET** /1.0/kb/tags/pagination | List tags
[**searchTags**](TagApi.md#searchtags) | **GET** /1.0/kb/tags/search/{searchKey} | Search tags

# **getTagAuditLogsWithHistory**
> \Killbill\Client\Swagger\Model\AuditLog[] getTagAuditLogsWithHistory($tagId)

Retrieve tag audit logs with history by id

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


$apiInstance = new Killbill\Client\Swagger\Api\TagApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$tagId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 

try {
    $result = $apiInstance->getTagAuditLogsWithHistory($tagId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagApi->getTagAuditLogsWithHistory: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tagId** | [**string**](../Model/.md)|  |

### Return type

[**\Killbill\Client\Swagger\Model\AuditLog[]**](../Model/AuditLog.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTags**
> \Killbill\Client\Swagger\Model\Tag[] getTags($offset, $limit, $audit)

List tags

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


$apiInstance = new Killbill\Client\Swagger\Api\TagApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$offset = 0; // int | 
$limit = 100; // int | 
$audit = "NONE"; // string | 

try {
    $result = $apiInstance->getTags($offset, $limit, $audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagApi->getTags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **offset** | **int**|  | [optional] [default to 0]
 **limit** | **int**|  | [optional] [default to 100]
 **audit** | **string**|  | [optional] [default to NONE]

### Return type

[**\Killbill\Client\Swagger\Model\Tag[]**](../Model/Tag.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **searchTags**
> \Killbill\Client\Swagger\Model\Tag[] searchTags($searchKey, $offset, $limit, $audit)

Search tags

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


$apiInstance = new Killbill\Client\Swagger\Api\TagApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$searchKey = "searchKey_example"; // string | 
$offset = 0; // int | 
$limit = 100; // int | 
$audit = "NONE"; // string | 

try {
    $result = $apiInstance->searchTags($searchKey, $offset, $limit, $audit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagApi->searchTags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **searchKey** | **string**|  |
 **offset** | **int**|  | [optional] [default to 0]
 **limit** | **int**|  | [optional] [default to 100]
 **audit** | **string**|  | [optional] [default to NONE]

### Return type

[**\Killbill\Client\Swagger\Model\Tag[]**](../Model/Tag.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

