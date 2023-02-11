<?php
/**
 * InvoiceItem
 *
 * PHP version 7.1+
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Kill Bill
 *
 * Kill Bill is an open-source billing and payments platform
 *
 * OpenAPI spec version: 0.24.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.22
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Killbill\Client\Swagger\Model;

use \ArrayAccess;
use \Killbill\Client\Swagger\ObjectSerializer;

/**
 * InvoiceItem Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InvoiceItem implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'InvoiceItem';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'invoiceItemId' => 'string',
'invoiceId' => 'string',
'linkedInvoiceItemId' => 'string',
'accountId' => 'string',
'childAccountId' => 'string',
'bundleId' => 'string',
'subscriptionId' => 'string',
'productName' => 'string',
'planName' => 'string',
'phaseName' => 'string',
'usageName' => 'string',
'prettyProductName' => 'string',
'prettyPlanName' => 'string',
'prettyPhaseName' => 'string',
'prettyUsageName' => 'string',
'itemType' => 'string',
'description' => 'string',
'startDate' => '\DateTime',
'endDate' => '\DateTime',
'amount' => 'float',
'rate' => 'float',
'currency' => 'string',
'quantity' => 'float',
'itemDetails' => 'string',
'catalogEffectiveDate' => '\DateTime',
'childItems' => '\Killbill\Client\Swagger\Model\InvoiceItem[]',
'auditLogs' => '\Killbill\Client\Swagger\Model\AuditLog[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'invoiceItemId' => 'uuid',
'invoiceId' => 'uuid',
'linkedInvoiceItemId' => 'uuid',
'accountId' => 'uuid',
'childAccountId' => 'uuid',
'bundleId' => 'uuid',
'subscriptionId' => 'uuid',
'productName' => null,
'planName' => null,
'phaseName' => null,
'usageName' => null,
'prettyProductName' => null,
'prettyPlanName' => null,
'prettyPhaseName' => null,
'prettyUsageName' => null,
'itemType' => null,
'description' => null,
'startDate' => 'date',
'endDate' => 'date',
'amount' => null,
'rate' => null,
'currency' => null,
'quantity' => null,
'itemDetails' => null,
'catalogEffectiveDate' => 'date-time',
'childItems' => null,
'auditLogs' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes(): array
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats(): array
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'invoiceItemId' => 'invoiceItemId',
'invoiceId' => 'invoiceId',
'linkedInvoiceItemId' => 'linkedInvoiceItemId',
'accountId' => 'accountId',
'childAccountId' => 'childAccountId',
'bundleId' => 'bundleId',
'subscriptionId' => 'subscriptionId',
'productName' => 'productName',
'planName' => 'planName',
'phaseName' => 'phaseName',
'usageName' => 'usageName',
'prettyProductName' => 'prettyProductName',
'prettyPlanName' => 'prettyPlanName',
'prettyPhaseName' => 'prettyPhaseName',
'prettyUsageName' => 'prettyUsageName',
'itemType' => 'itemType',
'description' => 'description',
'startDate' => 'startDate',
'endDate' => 'endDate',
'amount' => 'amount',
'rate' => 'rate',
'currency' => 'currency',
'quantity' => 'quantity',
'itemDetails' => 'itemDetails',
'catalogEffectiveDate' => 'catalogEffectiveDate',
'childItems' => 'childItems',
'auditLogs' => 'auditLogs'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'invoiceItemId' => 'setInvoiceItemId',
'invoiceId' => 'setInvoiceId',
'linkedInvoiceItemId' => 'setLinkedInvoiceItemId',
'accountId' => 'setAccountId',
'childAccountId' => 'setChildAccountId',
'bundleId' => 'setBundleId',
'subscriptionId' => 'setSubscriptionId',
'productName' => 'setProductName',
'planName' => 'setPlanName',
'phaseName' => 'setPhaseName',
'usageName' => 'setUsageName',
'prettyProductName' => 'setPrettyProductName',
'prettyPlanName' => 'setPrettyPlanName',
'prettyPhaseName' => 'setPrettyPhaseName',
'prettyUsageName' => 'setPrettyUsageName',
'itemType' => 'setItemType',
'description' => 'setDescription',
'startDate' => 'setStartDate',
'endDate' => 'setEndDate',
'amount' => 'setAmount',
'rate' => 'setRate',
'currency' => 'setCurrency',
'quantity' => 'setQuantity',
'itemDetails' => 'setItemDetails',
'catalogEffectiveDate' => 'setCatalogEffectiveDate',
'childItems' => 'setChildItems',
'auditLogs' => 'setAuditLogs'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'invoiceItemId' => 'getInvoiceItemId',
'invoiceId' => 'getInvoiceId',
'linkedInvoiceItemId' => 'getLinkedInvoiceItemId',
'accountId' => 'getAccountId',
'childAccountId' => 'getChildAccountId',
'bundleId' => 'getBundleId',
'subscriptionId' => 'getSubscriptionId',
'productName' => 'getProductName',
'planName' => 'getPlanName',
'phaseName' => 'getPhaseName',
'usageName' => 'getUsageName',
'prettyProductName' => 'getPrettyProductName',
'prettyPlanName' => 'getPrettyPlanName',
'prettyPhaseName' => 'getPrettyPhaseName',
'prettyUsageName' => 'getPrettyUsageName',
'itemType' => 'getItemType',
'description' => 'getDescription',
'startDate' => 'getStartDate',
'endDate' => 'getEndDate',
'amount' => 'getAmount',
'rate' => 'getRate',
'currency' => 'getCurrency',
'quantity' => 'getQuantity',
'itemDetails' => 'getItemDetails',
'catalogEffectiveDate' => 'getCatalogEffectiveDate',
'childItems' => 'getChildItems',
'auditLogs' => 'getAuditLogs'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap(): array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters(): array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters(): array
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName(): string
    {
        return self::$swaggerModelName;
    }

    const ITEM_TYPE_EXTERNAL_CHARGE = 'EXTERNAL_CHARGE';
const ITEM_TYPE_FIXED = 'FIXED';
const ITEM_TYPE_RECURRING = 'RECURRING';
const ITEM_TYPE_REPAIR_ADJ = 'REPAIR_ADJ';
const ITEM_TYPE_CBA_ADJ = 'CBA_ADJ';
const ITEM_TYPE_CREDIT_ADJ = 'CREDIT_ADJ';
const ITEM_TYPE_ITEM_ADJ = 'ITEM_ADJ';
const ITEM_TYPE_USAGE = 'USAGE';
const ITEM_TYPE_TAX = 'TAX';
const ITEM_TYPE_PARENT_SUMMARY = 'PARENT_SUMMARY';
const CURRENCY_AED = 'AED';
const CURRENCY_AFN = 'AFN';
const CURRENCY_ALL = 'ALL';
const CURRENCY_AMD = 'AMD';
const CURRENCY_ANG = 'ANG';
const CURRENCY_AOA = 'AOA';
const CURRENCY_ARS = 'ARS';
const CURRENCY_AUD = 'AUD';
const CURRENCY_AWG = 'AWG';
const CURRENCY_AZN = 'AZN';
const CURRENCY_BAM = 'BAM';
const CURRENCY_BBD = 'BBD';
const CURRENCY_BDT = 'BDT';
const CURRENCY_BGN = 'BGN';
const CURRENCY_BHD = 'BHD';
const CURRENCY_BIF = 'BIF';
const CURRENCY_BMD = 'BMD';
const CURRENCY_BND = 'BND';
const CURRENCY_BOB = 'BOB';
const CURRENCY_BRL = 'BRL';
const CURRENCY_BSD = 'BSD';
const CURRENCY_BTN = 'BTN';
const CURRENCY_BWP = 'BWP';
const CURRENCY_BYR = 'BYR';
const CURRENCY_BZD = 'BZD';
const CURRENCY_CAD = 'CAD';
const CURRENCY_CDF = 'CDF';
const CURRENCY_CHF = 'CHF';
const CURRENCY_CLP = 'CLP';
const CURRENCY_CNY = 'CNY';
const CURRENCY_COP = 'COP';
const CURRENCY_CRC = 'CRC';
const CURRENCY_CUC = 'CUC';
const CURRENCY_CUP = 'CUP';
const CURRENCY_CVE = 'CVE';
const CURRENCY_CZK = 'CZK';
const CURRENCY_DJF = 'DJF';
const CURRENCY_DKK = 'DKK';
const CURRENCY_DOP = 'DOP';
const CURRENCY_DZD = 'DZD';
const CURRENCY_EGP = 'EGP';
const CURRENCY_ERN = 'ERN';
const CURRENCY_ETB = 'ETB';
const CURRENCY_EUR = 'EUR';
const CURRENCY_FJD = 'FJD';
const CURRENCY_FKP = 'FKP';
const CURRENCY_GBP = 'GBP';
const CURRENCY_GEL = 'GEL';
const CURRENCY_GGP = 'GGP';
const CURRENCY_GHS = 'GHS';
const CURRENCY_GIP = 'GIP';
const CURRENCY_GMD = 'GMD';
const CURRENCY_GNF = 'GNF';
const CURRENCY_GTQ = 'GTQ';
const CURRENCY_GYD = 'GYD';
const CURRENCY_HKD = 'HKD';
const CURRENCY_HNL = 'HNL';
const CURRENCY_HRK = 'HRK';
const CURRENCY_HTG = 'HTG';
const CURRENCY_HUF = 'HUF';
const CURRENCY_IDR = 'IDR';
const CURRENCY_ILS = 'ILS';
const CURRENCY_IMP = 'IMP';
const CURRENCY_INR = 'INR';
const CURRENCY_IQD = 'IQD';
const CURRENCY_IRR = 'IRR';
const CURRENCY_ISK = 'ISK';
const CURRENCY_JEP = 'JEP';
const CURRENCY_JMD = 'JMD';
const CURRENCY_JOD = 'JOD';
const CURRENCY_JPY = 'JPY';
const CURRENCY_KES = 'KES';
const CURRENCY_KGS = 'KGS';
const CURRENCY_KHR = 'KHR';
const CURRENCY_KMF = 'KMF';
const CURRENCY_KPW = 'KPW';
const CURRENCY_KRW = 'KRW';
const CURRENCY_KWD = 'KWD';
const CURRENCY_KYD = 'KYD';
const CURRENCY_KZT = 'KZT';
const CURRENCY_LAK = 'LAK';
const CURRENCY_LBP = 'LBP';
const CURRENCY_LKR = 'LKR';
const CURRENCY_LRD = 'LRD';
const CURRENCY_LSL = 'LSL';
const CURRENCY_LTL = 'LTL';
const CURRENCY_LVL = 'LVL';
const CURRENCY_LYD = 'LYD';
const CURRENCY_MAD = 'MAD';
const CURRENCY_MDL = 'MDL';
const CURRENCY_MGA = 'MGA';
const CURRENCY_MKD = 'MKD';
const CURRENCY_MMK = 'MMK';
const CURRENCY_MNT = 'MNT';
const CURRENCY_MOP = 'MOP';
const CURRENCY_MRO = 'MRO';
const CURRENCY_MUR = 'MUR';
const CURRENCY_MVR = 'MVR';
const CURRENCY_MWK = 'MWK';
const CURRENCY_MXN = 'MXN';
const CURRENCY_MYR = 'MYR';
const CURRENCY_MZN = 'MZN';
const CURRENCY_NAD = 'NAD';
const CURRENCY_NGN = 'NGN';
const CURRENCY_NIO = 'NIO';
const CURRENCY_NOK = 'NOK';
const CURRENCY_NPR = 'NPR';
const CURRENCY_NZD = 'NZD';
const CURRENCY_OMR = 'OMR';
const CURRENCY_PAB = 'PAB';
const CURRENCY_PEN = 'PEN';
const CURRENCY_PGK = 'PGK';
const CURRENCY_PHP = 'PHP';
const CURRENCY_PKR = 'PKR';
const CURRENCY_PLN = 'PLN';
const CURRENCY_PYG = 'PYG';
const CURRENCY_QAR = 'QAR';
const CURRENCY_RON = 'RON';
const CURRENCY_RSD = 'RSD';
const CURRENCY_RUB = 'RUB';
const CURRENCY_RWF = 'RWF';
const CURRENCY_SAR = 'SAR';
const CURRENCY_SBD = 'SBD';
const CURRENCY_SCR = 'SCR';
const CURRENCY_SDG = 'SDG';
const CURRENCY_SEK = 'SEK';
const CURRENCY_SGD = 'SGD';
const CURRENCY_SHP = 'SHP';
const CURRENCY_SLL = 'SLL';
const CURRENCY_SOS = 'SOS';
const CURRENCY_SPL = 'SPL';
const CURRENCY_SRD = 'SRD';
const CURRENCY_STD = 'STD';
const CURRENCY_SVC = 'SVC';
const CURRENCY_SYP = 'SYP';
const CURRENCY_SZL = 'SZL';
const CURRENCY_THB = 'THB';
const CURRENCY_TJS = 'TJS';
const CURRENCY_TMT = 'TMT';
const CURRENCY_TND = 'TND';
const CURRENCY_TOP = 'TOP';
const CURRENCY__TRY = 'TRY';
const CURRENCY_TTD = 'TTD';
const CURRENCY_TVD = 'TVD';
const CURRENCY_TWD = 'TWD';
const CURRENCY_TZS = 'TZS';
const CURRENCY_UAH = 'UAH';
const CURRENCY_UGX = 'UGX';
const CURRENCY_USD = 'USD';
const CURRENCY_UYU = 'UYU';
const CURRENCY_UZS = 'UZS';
const CURRENCY_VEF = 'VEF';
const CURRENCY_VND = 'VND';
const CURRENCY_VUV = 'VUV';
const CURRENCY_WST = 'WST';
const CURRENCY_XAF = 'XAF';
const CURRENCY_XCD = 'XCD';
const CURRENCY_XDR = 'XDR';
const CURRENCY_XOF = 'XOF';
const CURRENCY_XPF = 'XPF';
const CURRENCY_YER = 'YER';
const CURRENCY_ZAR = 'ZAR';
const CURRENCY_ZMW = 'ZMW';
const CURRENCY_ZWD = 'ZWD';
const CURRENCY_BTC = 'BTC';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getItemTypeAllowableValues(): array
    {
        return [
            self::ITEM_TYPE_EXTERNAL_CHARGE,
self::ITEM_TYPE_FIXED,
self::ITEM_TYPE_RECURRING,
self::ITEM_TYPE_REPAIR_ADJ,
self::ITEM_TYPE_CBA_ADJ,
self::ITEM_TYPE_CREDIT_ADJ,
self::ITEM_TYPE_ITEM_ADJ,
self::ITEM_TYPE_USAGE,
self::ITEM_TYPE_TAX,
self::ITEM_TYPE_PARENT_SUMMARY,        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCurrencyAllowableValues(): array
    {
        return [
            self::CURRENCY_AED,
self::CURRENCY_AFN,
self::CURRENCY_ALL,
self::CURRENCY_AMD,
self::CURRENCY_ANG,
self::CURRENCY_AOA,
self::CURRENCY_ARS,
self::CURRENCY_AUD,
self::CURRENCY_AWG,
self::CURRENCY_AZN,
self::CURRENCY_BAM,
self::CURRENCY_BBD,
self::CURRENCY_BDT,
self::CURRENCY_BGN,
self::CURRENCY_BHD,
self::CURRENCY_BIF,
self::CURRENCY_BMD,
self::CURRENCY_BND,
self::CURRENCY_BOB,
self::CURRENCY_BRL,
self::CURRENCY_BSD,
self::CURRENCY_BTN,
self::CURRENCY_BWP,
self::CURRENCY_BYR,
self::CURRENCY_BZD,
self::CURRENCY_CAD,
self::CURRENCY_CDF,
self::CURRENCY_CHF,
self::CURRENCY_CLP,
self::CURRENCY_CNY,
self::CURRENCY_COP,
self::CURRENCY_CRC,
self::CURRENCY_CUC,
self::CURRENCY_CUP,
self::CURRENCY_CVE,
self::CURRENCY_CZK,
self::CURRENCY_DJF,
self::CURRENCY_DKK,
self::CURRENCY_DOP,
self::CURRENCY_DZD,
self::CURRENCY_EGP,
self::CURRENCY_ERN,
self::CURRENCY_ETB,
self::CURRENCY_EUR,
self::CURRENCY_FJD,
self::CURRENCY_FKP,
self::CURRENCY_GBP,
self::CURRENCY_GEL,
self::CURRENCY_GGP,
self::CURRENCY_GHS,
self::CURRENCY_GIP,
self::CURRENCY_GMD,
self::CURRENCY_GNF,
self::CURRENCY_GTQ,
self::CURRENCY_GYD,
self::CURRENCY_HKD,
self::CURRENCY_HNL,
self::CURRENCY_HRK,
self::CURRENCY_HTG,
self::CURRENCY_HUF,
self::CURRENCY_IDR,
self::CURRENCY_ILS,
self::CURRENCY_IMP,
self::CURRENCY_INR,
self::CURRENCY_IQD,
self::CURRENCY_IRR,
self::CURRENCY_ISK,
self::CURRENCY_JEP,
self::CURRENCY_JMD,
self::CURRENCY_JOD,
self::CURRENCY_JPY,
self::CURRENCY_KES,
self::CURRENCY_KGS,
self::CURRENCY_KHR,
self::CURRENCY_KMF,
self::CURRENCY_KPW,
self::CURRENCY_KRW,
self::CURRENCY_KWD,
self::CURRENCY_KYD,
self::CURRENCY_KZT,
self::CURRENCY_LAK,
self::CURRENCY_LBP,
self::CURRENCY_LKR,
self::CURRENCY_LRD,
self::CURRENCY_LSL,
self::CURRENCY_LTL,
self::CURRENCY_LVL,
self::CURRENCY_LYD,
self::CURRENCY_MAD,
self::CURRENCY_MDL,
self::CURRENCY_MGA,
self::CURRENCY_MKD,
self::CURRENCY_MMK,
self::CURRENCY_MNT,
self::CURRENCY_MOP,
self::CURRENCY_MRO,
self::CURRENCY_MUR,
self::CURRENCY_MVR,
self::CURRENCY_MWK,
self::CURRENCY_MXN,
self::CURRENCY_MYR,
self::CURRENCY_MZN,
self::CURRENCY_NAD,
self::CURRENCY_NGN,
self::CURRENCY_NIO,
self::CURRENCY_NOK,
self::CURRENCY_NPR,
self::CURRENCY_NZD,
self::CURRENCY_OMR,
self::CURRENCY_PAB,
self::CURRENCY_PEN,
self::CURRENCY_PGK,
self::CURRENCY_PHP,
self::CURRENCY_PKR,
self::CURRENCY_PLN,
self::CURRENCY_PYG,
self::CURRENCY_QAR,
self::CURRENCY_RON,
self::CURRENCY_RSD,
self::CURRENCY_RUB,
self::CURRENCY_RWF,
self::CURRENCY_SAR,
self::CURRENCY_SBD,
self::CURRENCY_SCR,
self::CURRENCY_SDG,
self::CURRENCY_SEK,
self::CURRENCY_SGD,
self::CURRENCY_SHP,
self::CURRENCY_SLL,
self::CURRENCY_SOS,
self::CURRENCY_SPL,
self::CURRENCY_SRD,
self::CURRENCY_STD,
self::CURRENCY_SVC,
self::CURRENCY_SYP,
self::CURRENCY_SZL,
self::CURRENCY_THB,
self::CURRENCY_TJS,
self::CURRENCY_TMT,
self::CURRENCY_TND,
self::CURRENCY_TOP,
self::CURRENCY__TRY,
self::CURRENCY_TTD,
self::CURRENCY_TVD,
self::CURRENCY_TWD,
self::CURRENCY_TZS,
self::CURRENCY_UAH,
self::CURRENCY_UGX,
self::CURRENCY_USD,
self::CURRENCY_UYU,
self::CURRENCY_UZS,
self::CURRENCY_VEF,
self::CURRENCY_VND,
self::CURRENCY_VUV,
self::CURRENCY_WST,
self::CURRENCY_XAF,
self::CURRENCY_XCD,
self::CURRENCY_XDR,
self::CURRENCY_XOF,
self::CURRENCY_XPF,
self::CURRENCY_YER,
self::CURRENCY_ZAR,
self::CURRENCY_ZMW,
self::CURRENCY_ZWD,
self::CURRENCY_BTC,        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['invoiceItemId'] = isset($data['invoiceItemId']) ? $data['invoiceItemId'] : null;
        $this->container['invoiceId'] = isset($data['invoiceId']) ? $data['invoiceId'] : null;
        $this->container['linkedInvoiceItemId'] = isset($data['linkedInvoiceItemId']) ? $data['linkedInvoiceItemId'] : null;
        $this->container['accountId'] = isset($data['accountId']) ? $data['accountId'] : null;
        $this->container['childAccountId'] = isset($data['childAccountId']) ? $data['childAccountId'] : null;
        $this->container['bundleId'] = isset($data['bundleId']) ? $data['bundleId'] : null;
        $this->container['subscriptionId'] = isset($data['subscriptionId']) ? $data['subscriptionId'] : null;
        $this->container['productName'] = isset($data['productName']) ? $data['productName'] : null;
        $this->container['planName'] = isset($data['planName']) ? $data['planName'] : null;
        $this->container['phaseName'] = isset($data['phaseName']) ? $data['phaseName'] : null;
        $this->container['usageName'] = isset($data['usageName']) ? $data['usageName'] : null;
        $this->container['prettyProductName'] = isset($data['prettyProductName']) ? $data['prettyProductName'] : null;
        $this->container['prettyPlanName'] = isset($data['prettyPlanName']) ? $data['prettyPlanName'] : null;
        $this->container['prettyPhaseName'] = isset($data['prettyPhaseName']) ? $data['prettyPhaseName'] : null;
        $this->container['prettyUsageName'] = isset($data['prettyUsageName']) ? $data['prettyUsageName'] : null;
        $this->container['itemType'] = isset($data['itemType']) ? $data['itemType'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['startDate'] = isset($data['startDate']) ? $data['startDate'] : null;
        $this->container['endDate'] = isset($data['endDate']) ? $data['endDate'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['rate'] = isset($data['rate']) ? $data['rate'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['quantity'] = isset($data['quantity']) ? $data['quantity'] : null;
        $this->container['itemDetails'] = isset($data['itemDetails']) ? $data['itemDetails'] : null;
        $this->container['catalogEffectiveDate'] = isset($data['catalogEffectiveDate']) ? $data['catalogEffectiveDate'] : null;
        $this->container['childItems'] = isset($data['childItems']) ? $data['childItems'] : null;
        $this->container['auditLogs'] = isset($data['auditLogs']) ? $data['auditLogs'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['invoiceItemId'] === null) {
            $invalidProperties[] = "'invoiceItemId' can't be null";
        }
        if ($this->container['accountId'] === null) {
            $invalidProperties[] = "'accountId' can't be null";
        }
        $allowedValues = $this->getItemTypeAllowableValues();
        if (!is_null($this->container['itemType']) && !in_array($this->container['itemType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'itemType', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getCurrencyAllowableValues();
        if (!is_null($this->container['currency']) && !in_array($this->container['currency'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'currency', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid(): bool
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets invoiceItemId
     *
     * @return string
     */
    public function getInvoiceItemId()
    {
        return $this->container['invoiceItemId'];
    }

    /**
     * Sets invoiceItemId
     *
     * @param string $invoiceItemId invoiceItemId
     *
     * @return $this
     */
    public function setInvoiceItemId($invoiceItemId): InvoiceItem
    {
        $this->container['invoiceItemId'] = $invoiceItemId;

        return $this;
    }

    /**
     * Gets invoiceId
     *
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->container['invoiceId'];
    }

    /**
     * Sets invoiceId
     *
     * @param string $invoiceId invoiceId
     *
     * @return $this
     */
    public function setInvoiceId($invoiceId): InvoiceItem
    {
        $this->container['invoiceId'] = $invoiceId;

        return $this;
    }

    /**
     * Gets linkedInvoiceItemId
     *
     * @return string
     */
    public function getLinkedInvoiceItemId()
    {
        return $this->container['linkedInvoiceItemId'];
    }

    /**
     * Sets linkedInvoiceItemId
     *
     * @param string $linkedInvoiceItemId linkedInvoiceItemId
     *
     * @return $this
     */
    public function setLinkedInvoiceItemId($linkedInvoiceItemId): InvoiceItem
    {
        $this->container['linkedInvoiceItemId'] = $linkedInvoiceItemId;

        return $this;
    }

    /**
     * Gets accountId
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->container['accountId'];
    }

    /**
     * Sets accountId
     *
     * @param string $accountId accountId
     *
     * @return $this
     */
    public function setAccountId($accountId): InvoiceItem
    {
        $this->container['accountId'] = $accountId;

        return $this;
    }

    /**
     * Gets childAccountId
     *
     * @return string
     */
    public function getChildAccountId()
    {
        return $this->container['childAccountId'];
    }

    /**
     * Sets childAccountId
     *
     * @param string $childAccountId childAccountId
     *
     * @return $this
     */
    public function setChildAccountId($childAccountId): InvoiceItem
    {
        $this->container['childAccountId'] = $childAccountId;

        return $this;
    }

    /**
     * Gets bundleId
     *
     * @return string
     */
    public function getBundleId()
    {
        return $this->container['bundleId'];
    }

    /**
     * Sets bundleId
     *
     * @param string $bundleId bundleId
     *
     * @return $this
     */
    public function setBundleId($bundleId): InvoiceItem
    {
        $this->container['bundleId'] = $bundleId;

        return $this;
    }

    /**
     * Gets subscriptionId
     *
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->container['subscriptionId'];
    }

    /**
     * Sets subscriptionId
     *
     * @param string $subscriptionId subscriptionId
     *
     * @return $this
     */
    public function setSubscriptionId($subscriptionId): InvoiceItem
    {
        $this->container['subscriptionId'] = $subscriptionId;

        return $this;
    }

    /**
     * Gets productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->container['productName'];
    }

    /**
     * Sets productName
     *
     * @param string $productName productName
     *
     * @return $this
     */
    public function setProductName($productName): InvoiceItem
    {
        $this->container['productName'] = $productName;

        return $this;
    }

    /**
     * Gets planName
     *
     * @return string
     */
    public function getPlanName()
    {
        return $this->container['planName'];
    }

    /**
     * Sets planName
     *
     * @param string $planName planName
     *
     * @return $this
     */
    public function setPlanName($planName): InvoiceItem
    {
        $this->container['planName'] = $planName;

        return $this;
    }

    /**
     * Gets phaseName
     *
     * @return string
     */
    public function getPhaseName()
    {
        return $this->container['phaseName'];
    }

    /**
     * Sets phaseName
     *
     * @param string $phaseName phaseName
     *
     * @return $this
     */
    public function setPhaseName($phaseName): InvoiceItem
    {
        $this->container['phaseName'] = $phaseName;

        return $this;
    }

    /**
     * Gets usageName
     *
     * @return string
     */
    public function getUsageName()
    {
        return $this->container['usageName'];
    }

    /**
     * Sets usageName
     *
     * @param string $usageName usageName
     *
     * @return $this
     */
    public function setUsageName($usageName): InvoiceItem
    {
        $this->container['usageName'] = $usageName;

        return $this;
    }

    /**
     * Gets prettyProductName
     *
     * @return string
     */
    public function getPrettyProductName()
    {
        return $this->container['prettyProductName'];
    }

    /**
     * Sets prettyProductName
     *
     * @param string $prettyProductName prettyProductName
     *
     * @return $this
     */
    public function setPrettyProductName($prettyProductName): InvoiceItem
    {
        $this->container['prettyProductName'] = $prettyProductName;

        return $this;
    }

    /**
     * Gets prettyPlanName
     *
     * @return string
     */
    public function getPrettyPlanName()
    {
        return $this->container['prettyPlanName'];
    }

    /**
     * Sets prettyPlanName
     *
     * @param string $prettyPlanName prettyPlanName
     *
     * @return $this
     */
    public function setPrettyPlanName($prettyPlanName): InvoiceItem
    {
        $this->container['prettyPlanName'] = $prettyPlanName;

        return $this;
    }

    /**
     * Gets prettyPhaseName
     *
     * @return string
     */
    public function getPrettyPhaseName()
    {
        return $this->container['prettyPhaseName'];
    }

    /**
     * Sets prettyPhaseName
     *
     * @param string $prettyPhaseName prettyPhaseName
     *
     * @return $this
     */
    public function setPrettyPhaseName($prettyPhaseName): InvoiceItem
    {
        $this->container['prettyPhaseName'] = $prettyPhaseName;

        return $this;
    }

    /**
     * Gets prettyUsageName
     *
     * @return string
     */
    public function getPrettyUsageName()
    {
        return $this->container['prettyUsageName'];
    }

    /**
     * Sets prettyUsageName
     *
     * @param string $prettyUsageName prettyUsageName
     *
     * @return $this
     */
    public function setPrettyUsageName($prettyUsageName): InvoiceItem
    {
        $this->container['prettyUsageName'] = $prettyUsageName;

        return $this;
    }

    /**
     * Gets itemType
     *
     * @return string
     */
    public function getItemType()
    {
        return $this->container['itemType'];
    }

    /**
     * Sets itemType
     *
     * @param string $itemType itemType
     *
     * @return $this
     */
    public function setItemType($itemType): InvoiceItem
    {
        $allowedValues = $this->getItemTypeAllowableValues();
        if (!is_null($itemType) && !in_array($itemType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'itemType', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['itemType'] = $itemType;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description description
     *
     * @return $this
     */
    public function setDescription($description): InvoiceItem
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->container['startDate'];
    }

    /**
     * Sets startDate
     *
     * @param \DateTime $startDate startDate
     *
     * @return $this
     */
    public function setStartDate($startDate): InvoiceItem
    {
        $this->container['startDate'] = $startDate;

        return $this;
    }

    /**
     * Gets endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->container['endDate'];
    }

    /**
     * Sets endDate
     *
     * @param \DateTime $endDate endDate
     *
     * @return $this
     */
    public function setEndDate($endDate): InvoiceItem
    {
        $this->container['endDate'] = $endDate;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount amount
     *
     * @return $this
     */
    public function setAmount($amount): InvoiceItem
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets rate
     *
     * @return float
     */
    public function getRate()
    {
        return $this->container['rate'];
    }

    /**
     * Sets rate
     *
     * @param float $rate rate
     *
     * @return $this
     */
    public function setRate($rate): InvoiceItem
    {
        $this->container['rate'] = $rate;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency currency
     *
     * @return $this
     */
    public function setCurrency($currency): InvoiceItem
    {
        $allowedValues = $this->getCurrencyAllowableValues();
        if (!is_null($currency) && !in_array($currency, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'currency', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets quantity
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param float $quantity quantity
     *
     * @return $this
     */
    public function setQuantity($quantity): InvoiceItem
    {
        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets itemDetails
     *
     * @return string
     */
    public function getItemDetails()
    {
        return $this->container['itemDetails'];
    }

    /**
     * Sets itemDetails
     *
     * @param string $itemDetails itemDetails
     *
     * @return $this
     */
    public function setItemDetails($itemDetails): InvoiceItem
    {
        $this->container['itemDetails'] = $itemDetails;

        return $this;
    }

    /**
     * Gets catalogEffectiveDate
     *
     * @return \DateTime
     */
    public function getCatalogEffectiveDate()
    {
        return $this->container['catalogEffectiveDate'];
    }

    /**
     * Sets catalogEffectiveDate
     *
     * @param \DateTime $catalogEffectiveDate catalogEffectiveDate
     *
     * @return $this
     */
    public function setCatalogEffectiveDate($catalogEffectiveDate): InvoiceItem
    {
        $this->container['catalogEffectiveDate'] = $catalogEffectiveDate;

        return $this;
    }

    /**
     * Gets childItems
     *
     * @return \Killbill\Client\Swagger\Model\InvoiceItem[]
     */
    public function getChildItems()
    {
        return $this->container['childItems'];
    }

    /**
     * Sets childItems
     *
     * @param \Killbill\Client\Swagger\Model\InvoiceItem[] $childItems childItems
     *
     * @return $this
     */
    public function setChildItems($childItems): InvoiceItem
    {
        $this->container['childItems'] = $childItems;

        return $this;
    }

    /**
     * Gets auditLogs
     *
     * @return \Killbill\Client\Swagger\Model\AuditLog[]
     */
    public function getAuditLogs()
    {
        return $this->container['auditLogs'];
    }

    /**
     * Sets auditLogs
     *
     * @param \Killbill\Client\Swagger\Model\AuditLog[] $auditLogs auditLogs
     *
     * @return $this
     */
    public function setAuditLogs($auditLogs): InvoiceItem
    {
        $this->container['auditLogs'] = $auditLogs;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString(): string
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
