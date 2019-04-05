# Invoice

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | [**BigDecimal**](BigDecimal.md) |  | [optional] 
**currency** | **string** |  | [optional] 
**status** | **string** |  | [optional] 
**creditAdj** | [**BigDecimal**](BigDecimal.md) |  | [optional] 
**refundAdj** | [**BigDecimal**](BigDecimal.md) |  | [optional] 
**invoiceId** | **string** |  | [optional] 
**invoiceDate** | [**\DateTime**](\DateTime.md) |  | [optional] 
**targetDate** | [**\DateTime**](\DateTime.md) |  | [optional] 
**invoiceNumber** | **string** |  | [optional] 
**balance** | [**BigDecimal**](BigDecimal.md) |  | [optional] 
**accountId** | **string** |  | [optional] 
**bundleKeys** | **string** |  | [optional] 
**credits** | [**\Killbill\Client\Model\Credit[]**](Credit.md) |  | [optional] 
**items** | [**\Killbill\Client\Model\InvoiceItem[]**](InvoiceItem.md) |  | [optional] 
**isParentInvoice** | **bool** |  | [optional] 
**parentInvoiceId** | **string** |  | [optional] 
**parentAccountId** | **string** |  | [optional] 
**auditLogs** | [**\Killbill\Client\Model\AuditLog[]**](AuditLog.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

