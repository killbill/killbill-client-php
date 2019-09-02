# Killbill\Client\Swagger\PaymentGatewayApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**buildComboFormDescriptor**](PaymentGatewayApi.md#buildcomboformdescriptor) | **POST** /1.0/kb/paymentGateways/hosted/form | Combo API to generate form data to redirect the customer to the gateway
[**buildFormDescriptor**](PaymentGatewayApi.md#buildformdescriptor) | **POST** /1.0/kb/paymentGateways/hosted/form/{accountId} | Generate form data to redirect the customer to the gateway
[**processNotification**](PaymentGatewayApi.md#processnotification) | **POST** /1.0/kb/paymentGateways/notification/{pluginName} | Process a gateway notification

# **buildComboFormDescriptor**
> \Killbill\Client\Swagger\Model\HostedPaymentPageFormDescriptor buildComboFormDescriptor($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $controlPluginName, $pluginProperty)

Combo API to generate form data to redirect the customer to the gateway

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


$apiInstance = new Killbill\Client\Swagger\Api\PaymentGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Swagger\Model\ComboHostedPaymentPage(); // \Killbill\Client\Swagger\Model\ComboHostedPaymentPage | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$controlPluginName = array("controlPluginName_example"); // string[] | 
$pluginProperty = array("pluginProperty_example"); // string[] | 

try {
    $result = $apiInstance->buildComboFormDescriptor($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment, $controlPluginName, $pluginProperty);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentGatewayApi->buildComboFormDescriptor: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Swagger\Model\ComboHostedPaymentPage**](../Model/ComboHostedPaymentPage.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **controlPluginName** | [**string[]**](../Model/string.md)|  | [optional]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]

### Return type

[**\Killbill\Client\Swagger\Model\HostedPaymentPageFormDescriptor**](../Model/HostedPaymentPageFormDescriptor.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **buildFormDescriptor**
> \Killbill\Client\Swagger\Model\HostedPaymentPageFormDescriptor buildFormDescriptor($body, $xKillbillCreatedBy, $accountId, $xKillbillReason, $xKillbillComment, $paymentMethodId, $controlPluginName, $pluginProperty)

Generate form data to redirect the customer to the gateway

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


$apiInstance = new Killbill\Client\Swagger\Api\PaymentGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Swagger\Model\HostedPaymentPageFields(); // \Killbill\Client\Swagger\Model\HostedPaymentPageFields | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$accountId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$paymentMethodId = "38400000-8cf0-11bd-b23e-10b96e4ef00d"; // string | 
$controlPluginName = array("controlPluginName_example"); // string[] | 
$pluginProperty = array("pluginProperty_example"); // string[] | 

try {
    $result = $apiInstance->buildFormDescriptor($body, $xKillbillCreatedBy, $accountId, $xKillbillReason, $xKillbillComment, $paymentMethodId, $controlPluginName, $pluginProperty);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentGatewayApi->buildFormDescriptor: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Swagger\Model\HostedPaymentPageFields**](../Model/HostedPaymentPageFields.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **accountId** | [**string**](../Model/.md)|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **paymentMethodId** | [**string**](../Model/.md)|  | [optional]
 **controlPluginName** | [**string[]**](../Model/string.md)|  | [optional]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]

### Return type

[**\Killbill\Client\Swagger\Model\HostedPaymentPageFormDescriptor**](../Model/HostedPaymentPageFormDescriptor.md)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **processNotification**
> processNotification($body, $xKillbillCreatedBy, $pluginName, $xKillbillReason, $xKillbillComment, $controlPluginName, $pluginProperty)

Process a gateway notification

The response is built by the appropriate plugin

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


$apiInstance = new Killbill\Client\Swagger\Api\PaymentGatewayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = "body_example"; // string | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$pluginName = "pluginName_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 
$controlPluginName = array("controlPluginName_example"); // string[] | 
$pluginProperty = array("pluginProperty_example"); // string[] | 

try {
    $apiInstance->processNotification($body, $xKillbillCreatedBy, $pluginName, $xKillbillReason, $xKillbillComment, $controlPluginName, $pluginProperty);
} catch (Exception $e) {
    echo 'Exception when calling PaymentGatewayApi->processNotification: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**string**](../Model/string.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **pluginName** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]
 **controlPluginName** | [**string[]**](../Model/string.md)|  | [optional]
 **pluginProperty** | [**string[]**](../Model/string.md)|  | [optional]

### Return type

void (empty response body)

### Authorization

[Killbill Api Key](../../README.md#Killbill Api Key), [Killbill Api Secret](../../README.md#Killbill Api Secret), [basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: */*
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

