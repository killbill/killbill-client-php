# PaymentTransaction

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**transactionId** | **string** |  | [optional] 
**transactionExternalKey** | **string** |  | [optional] 
**paymentId** | **string** | Associated payment id, required when notifying state transitions | [optional] 
**paymentExternalKey** | **string** |  | [optional] 
**transactionType** | **string** |  | [optional] 
**amount** | [**BigDecimal**](BigDecimal.md) | Transaction amount, required except for void operations | [optional] 
**currency** | **string** | Amount currency (account currency unless specified) | [optional] 
**effectiveDate** | [**\DateTime**](\DateTime.md) |  | [optional] 
**processedAmount** | [**BigDecimal**](BigDecimal.md) |  | [optional] 
**processedCurrency** | **string** |  | [optional] 
**status** | **string** | Transaction status, required for state change notifications | [optional] 
**gatewayErrorCode** | **string** |  | [optional] 
**gatewayErrorMsg** | **string** |  | [optional] 
**firstPaymentReferenceId** | **string** |  | [optional] 
**secondPaymentReferenceId** | **string** |  | [optional] 
**properties** | [**\Killbill\Client\Model\PluginProperty[]**](PluginProperty.md) |  | [optional] 
**auditLogs** | [**\Killbill\Client\Model\AuditLog[]**](AuditLog.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

