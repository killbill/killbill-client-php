# PaymentAttempt

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**accountId** | **string** |  | [optional] 
**paymentMethodId** | **string** |  | [optional] 
**paymentExternalKey** | **string** |  | [optional] 
**transactionId** | **string** |  | [optional] 
**transactionExternalKey** | **string** |  | [optional] 
**transactionType** | **string** |  | [optional] 
**effectiveDate** | [**\DateTime**](\DateTime.md) |  | [optional] 
**stateName** | **string** |  | [optional] 
**amount** | [**BigDecimal**](BigDecimal.md) | Transaction amount, required except for void operations | [optional] 
**currency** | **string** | Amount currency (account currency unless specified) | [optional] 
**pluginName** | **string** |  | [optional] 
**pluginProperties** | [**\Killbill\Client\Model\PluginProperty[]**](PluginProperty.md) |  | [optional] 
**auditLogs** | [**\Killbill\Client\Model\AuditLog[]**](AuditLog.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

