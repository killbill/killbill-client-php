# Killbill\Client\SecurityApi

All URIs are relative to */*

Method | HTTP request | Description
------------- | ------------- | -------------
[**addRoleDefinition**](SecurityApi.md#addRoleDefinition) | **POST** /1.0/kb/security/roles | Add a new role definition)
[**addUserRoles**](SecurityApi.md#addUserRoles) | **POST** /1.0/kb/security/users | Add a new user with roles (to make api requests)
[**getCurrentUserPermissions**](SecurityApi.md#getCurrentUserPermissions) | **GET** /1.0/kb/security/permissions | List user permissions
[**getCurrentUserSubject**](SecurityApi.md#getCurrentUserSubject) | **GET** /1.0/kb/security/subject | Get user information
[**getRoleDefinition**](SecurityApi.md#getRoleDefinition) | **GET** /1.0/kb/security/roles/{role} | Get role definition
[**getUserRoles**](SecurityApi.md#getUserRoles) | **GET** /1.0/kb/security/users/{username}/roles | Get roles associated to a user
[**invalidateUser**](SecurityApi.md#invalidateUser) | **DELETE** /1.0/kb/security/users/{username} | Invalidate an existing user
[**updateRoleDefinition**](SecurityApi.md#updateRoleDefinition) | **PUT** /1.0/kb/security/roles | Update a new role definition)
[**updateUserPassword**](SecurityApi.md#updateUserPassword) | **PUT** /1.0/kb/security/users/{username}/password | Update a user password
[**updateUserRoles**](SecurityApi.md#updateUserRoles) | **PUT** /1.0/kb/security/users/{username}/roles | Update roles associated to a user

# **addRoleDefinition**
> \Killbill\Client\Model\RoleDefinition addRoleDefinition($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment)

Add a new role definition)

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SecurityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Model\RoleDefinition(); // \Killbill\Client\Model\RoleDefinition | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $result = $apiInstance->addRoleDefinition($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurityApi->addRoleDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\RoleDefinition**](../Model/RoleDefinition.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

[**\Killbill\Client\Model\RoleDefinition**](../Model/RoleDefinition.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **addUserRoles**
> \Killbill\Client\Model\UserRoles addUserRoles($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment)

Add a new user with roles (to make api requests)

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SecurityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Model\UserRoles(); // \Killbill\Client\Model\UserRoles | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $result = $apiInstance->addUserRoles($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurityApi->addUserRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\UserRoles**](../Model/UserRoles.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

[**\Killbill\Client\Model\UserRoles**](../Model/UserRoles.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCurrentUserPermissions**
> string[] getCurrentUserPermissions()

List user permissions

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SecurityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCurrentUserPermissions();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurityApi->getCurrentUserPermissions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

**string[]**

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCurrentUserSubject**
> \Killbill\Client\Model\Subject getCurrentUserSubject()

Get user information

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SecurityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCurrentUserSubject();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurityApi->getCurrentUserSubject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Killbill\Client\Model\Subject**](../Model/Subject.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getRoleDefinition**
> \Killbill\Client\Model\RoleDefinition getRoleDefinition($role)

Get role definition

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SecurityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$role = "role_example"; // string | 

try {
    $result = $apiInstance->getRoleDefinition($role);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurityApi->getRoleDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **role** | **string**|  |

### Return type

[**\Killbill\Client\Model\RoleDefinition**](../Model/RoleDefinition.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUserRoles**
> \Killbill\Client\Model\UserRoles getUserRoles($username)

Get roles associated to a user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SecurityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$username = "username_example"; // string | 

try {
    $result = $apiInstance->getUserRoles($username);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurityApi->getUserRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **username** | **string**|  |

### Return type

[**\Killbill\Client\Model\UserRoles**](../Model/UserRoles.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **invalidateUser**
> invalidateUser($username, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment)

Invalidate an existing user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SecurityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$username = "username_example"; // string | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->invalidateUser($username, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SecurityApi->invalidateUser: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **username** | **string**|  |
 **xKillbillCreatedBy** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateRoleDefinition**
> updateRoleDefinition($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment)

Update a new role definition)

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SecurityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Model\RoleDefinition(); // \Killbill\Client\Model\RoleDefinition | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->updateRoleDefinition($body, $xKillbillCreatedBy, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SecurityApi->updateRoleDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\RoleDefinition**](../Model/RoleDefinition.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateUserPassword**
> updateUserPassword($body, $xKillbillCreatedBy, $username, $xKillbillReason, $xKillbillComment)

Update a user password

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SecurityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Model\UserRoles(); // \Killbill\Client\Model\UserRoles | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$username = "username_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->updateUserPassword($body, $xKillbillCreatedBy, $username, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SecurityApi->updateUserPassword: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\UserRoles**](../Model/UserRoles.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **username** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateUserRoles**
> updateUserRoles($body, $xKillbillCreatedBy, $username, $xKillbillReason, $xKillbillComment)

Update roles associated to a user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: basicAuth
$config = Killbill\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Killbill\Client\Api\SecurityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Killbill\Client\Model\UserRoles(); // \Killbill\Client\Model\UserRoles | 
$xKillbillCreatedBy = "xKillbillCreatedBy_example"; // string | 
$username = "username_example"; // string | 
$xKillbillReason = "xKillbillReason_example"; // string | 
$xKillbillComment = "xKillbillComment_example"; // string | 

try {
    $apiInstance->updateUserRoles($body, $xKillbillCreatedBy, $username, $xKillbillReason, $xKillbillComment);
} catch (Exception $e) {
    echo 'Exception when calling SecurityApi->updateUserRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Killbill\Client\Model\UserRoles**](../Model/UserRoles.md)|  |
 **xKillbillCreatedBy** | **string**|  |
 **username** | **string**|  |
 **xKillbillReason** | **string**|  | [optional]
 **xKillbillComment** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

