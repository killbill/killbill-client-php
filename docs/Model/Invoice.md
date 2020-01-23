# Invoice

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** |  | [optional] 
**currency** | **string** |  | [optional] 
**status** | **string** |  | [optional] 
**creditAdj** | **float** |  | [optional] 
**refundAdj** | **float** |  | [optional] 
**invoiceId** | **string** |  | [optional] 
**invoiceDate** | [**\DateTime**](\DateTime.md) |  | [optional] 
**targetDate** | [**\DateTime**](\DateTime.md) |  | [optional] 
**invoiceNumber** | **string** |  | [optional] 
**balance** | **float** |  | [optional] 
**accountId** | **string** |  | [optional] 
**bundleKeys** | **string** |  | [optional] 
**credits** | [**\Killbill\Client\Swagger\Model\InvoiceItem[]**](InvoiceItem.md) |  | [optional] 
**items** | [**\Killbill\Client\Swagger\Model\InvoiceItem[]**](InvoiceItem.md) |  | [optional] 
**trackingIds** | **string[]** |  | [optional] 
**isParentInvoice** | **bool** |  | [optional] 
**parentInvoiceId** | **string** |  | [optional] 
**parentAccountId** | **string** |  | [optional] 
**auditLogs** | [**\Killbill\Client\Swagger\Model\AuditLog[]**](AuditLog.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

