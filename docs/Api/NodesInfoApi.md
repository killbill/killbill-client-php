# Killbill\Client\Swagger\NodesInfoApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getNodesInfo**](NodesInfoApi.md#getnodesinfo) | **GET** /1.0/kb/nodesInfo | Retrieve all the nodes infos
[**triggerNodeCommand**](NodesInfoApi.md#triggernodecommand) | **POST** /1.0/kb/nodesInfo | Trigger a node command

# **getNodesInfo**
> \Killbill\Client\Swagger\Model\PluginInfo[] getNodesInfo()

Retrieve all the nodes infos

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\NodesInfoApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getNodesInfo();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NodesInfoApi->getNodesInfo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Killbill\Client\Swagger\Model\PluginInfo[]**](../Model/PluginInfo.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **triggerNodeCommand**
> triggerNodeCommand($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $localNodeOnly)

Trigger a node command

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Swagger\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Swagger\Api\NodesInfoApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Swagger\Model\NodeCommand(); // \Killbill\Client\Swagger\Model\NodeCommand | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$localNodeOnly = false; // bool | 

try {
    $apiInstance->triggerNodeCommand($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $localNodeOnly);
} catch (Exception $e) {
    echo 'Exception when calling NodesInfoApi->triggerNodeCommand: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Swagger\Model\NodeCommand**](../Model/NodeCommand.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **localNodeOnly** | **bool**|  | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

