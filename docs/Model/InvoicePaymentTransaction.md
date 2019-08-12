# InvoicePaymentTransaction

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**transactionId** | **string** |  | [optional] 
**transactionExternalKey** | **string** |  | [optional] 
**paymentId** | **string** | Associated payment id, required when notifying state transitions | [optional] 
**paymentExternalKey** | **string** |  | [optional] 
**transactionType** | **string** |  | [optional] 
**amount** | **float** | Transaction amount, required except for void operations | [optional] 
**currency** | **string** | Amount currency (account currency unless specified) | [optional] 
**effectiveDate** | [**\DateTime**](\DateTime.md) |  | [optional] 
**processedAmount** | **float** |  | [optional] 
**processedCurrency** | **string** |  | [optional] 
**status** | **string** | Transaction status, required for state change notifications | [optional] 
**gatewayErrorCode** | **string** |  | [optional] 
**gatewayErrorMsg** | **string** |  | [optional] 
**firstPaymentReferenceId** | **string** |  | [optional] 
**secondPaymentReferenceId** | **string** |  | [optional] 
**properties** | [**\Killbill\Client\Swagger\Model\PluginProperty[]**](PluginProperty.md) |  | [optional] 
**isAdjusted** | **bool** |  | [optional] 
**adjustments** | [**\Killbill\Client\Swagger\Model\InvoiceItem[]**](InvoiceItem.md) |  | [optional] 
**auditLogs** | [**\Killbill\Client\Swagger\Model\AuditLog[]**](AuditLog.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

