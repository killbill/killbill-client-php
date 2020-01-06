<?php
/**
 * Catalog
 *
 * PHP version 5
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
 * OpenAPI spec version: 0.21.8-SNAPSHOT
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.12
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
 * Catalog Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Catalog implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Catalog';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
'effectiveDate' => '\DateTime',
'currencies' => 'string[]',
'units' => '\Killbill\Client\Swagger\Model\Unit[]',
'products' => '\Killbill\Client\Swagger\Model\Product[]',
'priceLists' => '\Killbill\Client\Swagger\Model\PriceList[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
'effectiveDate' => 'date-time',
'currencies' => null,
'units' => null,
'products' => null,
'priceLists' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
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
        'name' => 'name',
'effectiveDate' => 'effectiveDate',
'currencies' => 'currencies',
'units' => 'units',
'products' => 'products',
'priceLists' => 'priceLists'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
'effectiveDate' => 'setEffectiveDate',
'currencies' => 'setCurrencies',
'units' => 'setUnits',
'products' => 'setProducts',
'priceLists' => 'setPriceLists'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
'effectiveDate' => 'getEffectiveDate',
'currencies' => 'getCurrencies',
'units' => 'getUnits',
'products' => 'getProducts',
'priceLists' => 'getPriceLists'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const CURRENCIES_AED = 'AED';
const CURRENCIES_AFN = 'AFN';
const CURRENCIES_ALL = 'ALL';
const CURRENCIES_AMD = 'AMD';
const CURRENCIES_ANG = 'ANG';
const CURRENCIES_AOA = 'AOA';
const CURRENCIES_ARS = 'ARS';
const CURRENCIES_AUD = 'AUD';
const CURRENCIES_AWG = 'AWG';
const CURRENCIES_AZN = 'AZN';
const CURRENCIES_BAM = 'BAM';
const CURRENCIES_BBD = 'BBD';
const CURRENCIES_BDT = 'BDT';
const CURRENCIES_BGN = 'BGN';
const CURRENCIES_BHD = 'BHD';
const CURRENCIES_BIF = 'BIF';
const CURRENCIES_BMD = 'BMD';
const CURRENCIES_BND = 'BND';
const CURRENCIES_BOB = 'BOB';
const CURRENCIES_BRL = 'BRL';
const CURRENCIES_BSD = 'BSD';
const CURRENCIES_BTN = 'BTN';
const CURRENCIES_BWP = 'BWP';
const CURRENCIES_BYR = 'BYR';
const CURRENCIES_BZD = 'BZD';
const CURRENCIES_CAD = 'CAD';
const CURRENCIES_CDF = 'CDF';
const CURRENCIES_CHF = 'CHF';
const CURRENCIES_CLP = 'CLP';
const CURRENCIES_CNY = 'CNY';
const CURRENCIES_COP = 'COP';
const CURRENCIES_CRC = 'CRC';
const CURRENCIES_CUC = 'CUC';
const CURRENCIES_CUP = 'CUP';
const CURRENCIES_CVE = 'CVE';
const CURRENCIES_CZK = 'CZK';
const CURRENCIES_DJF = 'DJF';
const CURRENCIES_DKK = 'DKK';
const CURRENCIES_DOP = 'DOP';
const CURRENCIES_DZD = 'DZD';
const CURRENCIES_EGP = 'EGP';
const CURRENCIES_ERN = 'ERN';
const CURRENCIES_ETB = 'ETB';
const CURRENCIES_EUR = 'EUR';
const CURRENCIES_FJD = 'FJD';
const CURRENCIES_FKP = 'FKP';
const CURRENCIES_GBP = 'GBP';
const CURRENCIES_GEL = 'GEL';
const CURRENCIES_GGP = 'GGP';
const CURRENCIES_GHS = 'GHS';
const CURRENCIES_GIP = 'GIP';
const CURRENCIES_GMD = 'GMD';
const CURRENCIES_GNF = 'GNF';
const CURRENCIES_GTQ = 'GTQ';
const CURRENCIES_GYD = 'GYD';
const CURRENCIES_HKD = 'HKD';
const CURRENCIES_HNL = 'HNL';
const CURRENCIES_HRK = 'HRK';
const CURRENCIES_HTG = 'HTG';
const CURRENCIES_HUF = 'HUF';
const CURRENCIES_IDR = 'IDR';
const CURRENCIES_ILS = 'ILS';
const CURRENCIES_IMP = 'IMP';
const CURRENCIES_INR = 'INR';
const CURRENCIES_IQD = 'IQD';
const CURRENCIES_IRR = 'IRR';
const CURRENCIES_ISK = 'ISK';
const CURRENCIES_JEP = 'JEP';
const CURRENCIES_JMD = 'JMD';
const CURRENCIES_JOD = 'JOD';
const CURRENCIES_JPY = 'JPY';
const CURRENCIES_KES = 'KES';
const CURRENCIES_KGS = 'KGS';
const CURRENCIES_KHR = 'KHR';
const CURRENCIES_KMF = 'KMF';
const CURRENCIES_KPW = 'KPW';
const CURRENCIES_KRW = 'KRW';
const CURRENCIES_KWD = 'KWD';
const CURRENCIES_KYD = 'KYD';
const CURRENCIES_KZT = 'KZT';
const CURRENCIES_LAK = 'LAK';
const CURRENCIES_LBP = 'LBP';
const CURRENCIES_LKR = 'LKR';
const CURRENCIES_LRD = 'LRD';
const CURRENCIES_LSL = 'LSL';
const CURRENCIES_LTL = 'LTL';
const CURRENCIES_LVL = 'LVL';
const CURRENCIES_LYD = 'LYD';
const CURRENCIES_MAD = 'MAD';
const CURRENCIES_MDL = 'MDL';
const CURRENCIES_MGA = 'MGA';
const CURRENCIES_MKD = 'MKD';
const CURRENCIES_MMK = 'MMK';
const CURRENCIES_MNT = 'MNT';
const CURRENCIES_MOP = 'MOP';
const CURRENCIES_MRO = 'MRO';
const CURRENCIES_MUR = 'MUR';
const CURRENCIES_MVR = 'MVR';
const CURRENCIES_MWK = 'MWK';
const CURRENCIES_MXN = 'MXN';
const CURRENCIES_MYR = 'MYR';
const CURRENCIES_MZN = 'MZN';
const CURRENCIES_NAD = 'NAD';
const CURRENCIES_NGN = 'NGN';
const CURRENCIES_NIO = 'NIO';
const CURRENCIES_NOK = 'NOK';
const CURRENCIES_NPR = 'NPR';
const CURRENCIES_NZD = 'NZD';
const CURRENCIES_OMR = 'OMR';
const CURRENCIES_PAB = 'PAB';
const CURRENCIES_PEN = 'PEN';
const CURRENCIES_PGK = 'PGK';
const CURRENCIES_PHP = 'PHP';
const CURRENCIES_PKR = 'PKR';
const CURRENCIES_PLN = 'PLN';
const CURRENCIES_PYG = 'PYG';
const CURRENCIES_QAR = 'QAR';
const CURRENCIES_RON = 'RON';
const CURRENCIES_RSD = 'RSD';
const CURRENCIES_RUB = 'RUB';
const CURRENCIES_RWF = 'RWF';
const CURRENCIES_SAR = 'SAR';
const CURRENCIES_SBD = 'SBD';
const CURRENCIES_SCR = 'SCR';
const CURRENCIES_SDG = 'SDG';
const CURRENCIES_SEK = 'SEK';
const CURRENCIES_SGD = 'SGD';
const CURRENCIES_SHP = 'SHP';
const CURRENCIES_SLL = 'SLL';
const CURRENCIES_SOS = 'SOS';
const CURRENCIES_SPL = 'SPL';
const CURRENCIES_SRD = 'SRD';
const CURRENCIES_STD = 'STD';
const CURRENCIES_SVC = 'SVC';
const CURRENCIES_SYP = 'SYP';
const CURRENCIES_SZL = 'SZL';
const CURRENCIES_THB = 'THB';
const CURRENCIES_TJS = 'TJS';
const CURRENCIES_TMT = 'TMT';
const CURRENCIES_TND = 'TND';
const CURRENCIES_TOP = 'TOP';
const CURRENCIES__TRY = 'TRY';
const CURRENCIES_TTD = 'TTD';
const CURRENCIES_TVD = 'TVD';
const CURRENCIES_TWD = 'TWD';
const CURRENCIES_TZS = 'TZS';
const CURRENCIES_UAH = 'UAH';
const CURRENCIES_UGX = 'UGX';
const CURRENCIES_USD = 'USD';
const CURRENCIES_UYU = 'UYU';
const CURRENCIES_UZS = 'UZS';
const CURRENCIES_VEF = 'VEF';
const CURRENCIES_VND = 'VND';
const CURRENCIES_VUV = 'VUV';
const CURRENCIES_WST = 'WST';
const CURRENCIES_XAF = 'XAF';
const CURRENCIES_XCD = 'XCD';
const CURRENCIES_XDR = 'XDR';
const CURRENCIES_XOF = 'XOF';
const CURRENCIES_XPF = 'XPF';
const CURRENCIES_YER = 'YER';
const CURRENCIES_ZAR = 'ZAR';
const CURRENCIES_ZMW = 'ZMW';
const CURRENCIES_ZWD = 'ZWD';
const CURRENCIES_BTC = 'BTC';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCurrenciesAllowableValues()
    {
        return [
            self::CURRENCIES_AED,
self::CURRENCIES_AFN,
self::CURRENCIES_ALL,
self::CURRENCIES_AMD,
self::CURRENCIES_ANG,
self::CURRENCIES_AOA,
self::CURRENCIES_ARS,
self::CURRENCIES_AUD,
self::CURRENCIES_AWG,
self::CURRENCIES_AZN,
self::CURRENCIES_BAM,
self::CURRENCIES_BBD,
self::CURRENCIES_BDT,
self::CURRENCIES_BGN,
self::CURRENCIES_BHD,
self::CURRENCIES_BIF,
self::CURRENCIES_BMD,
self::CURRENCIES_BND,
self::CURRENCIES_BOB,
self::CURRENCIES_BRL,
self::CURRENCIES_BSD,
self::CURRENCIES_BTN,
self::CURRENCIES_BWP,
self::CURRENCIES_BYR,
self::CURRENCIES_BZD,
self::CURRENCIES_CAD,
self::CURRENCIES_CDF,
self::CURRENCIES_CHF,
self::CURRENCIES_CLP,
self::CURRENCIES_CNY,
self::CURRENCIES_COP,
self::CURRENCIES_CRC,
self::CURRENCIES_CUC,
self::CURRENCIES_CUP,
self::CURRENCIES_CVE,
self::CURRENCIES_CZK,
self::CURRENCIES_DJF,
self::CURRENCIES_DKK,
self::CURRENCIES_DOP,
self::CURRENCIES_DZD,
self::CURRENCIES_EGP,
self::CURRENCIES_ERN,
self::CURRENCIES_ETB,
self::CURRENCIES_EUR,
self::CURRENCIES_FJD,
self::CURRENCIES_FKP,
self::CURRENCIES_GBP,
self::CURRENCIES_GEL,
self::CURRENCIES_GGP,
self::CURRENCIES_GHS,
self::CURRENCIES_GIP,
self::CURRENCIES_GMD,
self::CURRENCIES_GNF,
self::CURRENCIES_GTQ,
self::CURRENCIES_GYD,
self::CURRENCIES_HKD,
self::CURRENCIES_HNL,
self::CURRENCIES_HRK,
self::CURRENCIES_HTG,
self::CURRENCIES_HUF,
self::CURRENCIES_IDR,
self::CURRENCIES_ILS,
self::CURRENCIES_IMP,
self::CURRENCIES_INR,
self::CURRENCIES_IQD,
self::CURRENCIES_IRR,
self::CURRENCIES_ISK,
self::CURRENCIES_JEP,
self::CURRENCIES_JMD,
self::CURRENCIES_JOD,
self::CURRENCIES_JPY,
self::CURRENCIES_KES,
self::CURRENCIES_KGS,
self::CURRENCIES_KHR,
self::CURRENCIES_KMF,
self::CURRENCIES_KPW,
self::CURRENCIES_KRW,
self::CURRENCIES_KWD,
self::CURRENCIES_KYD,
self::CURRENCIES_KZT,
self::CURRENCIES_LAK,
self::CURRENCIES_LBP,
self::CURRENCIES_LKR,
self::CURRENCIES_LRD,
self::CURRENCIES_LSL,
self::CURRENCIES_LTL,
self::CURRENCIES_LVL,
self::CURRENCIES_LYD,
self::CURRENCIES_MAD,
self::CURRENCIES_MDL,
self::CURRENCIES_MGA,
self::CURRENCIES_MKD,
self::CURRENCIES_MMK,
self::CURRENCIES_MNT,
self::CURRENCIES_MOP,
self::CURRENCIES_MRO,
self::CURRENCIES_MUR,
self::CURRENCIES_MVR,
self::CURRENCIES_MWK,
self::CURRENCIES_MXN,
self::CURRENCIES_MYR,
self::CURRENCIES_MZN,
self::CURRENCIES_NAD,
self::CURRENCIES_NGN,
self::CURRENCIES_NIO,
self::CURRENCIES_NOK,
self::CURRENCIES_NPR,
self::CURRENCIES_NZD,
self::CURRENCIES_OMR,
self::CURRENCIES_PAB,
self::CURRENCIES_PEN,
self::CURRENCIES_PGK,
self::CURRENCIES_PHP,
self::CURRENCIES_PKR,
self::CURRENCIES_PLN,
self::CURRENCIES_PYG,
self::CURRENCIES_QAR,
self::CURRENCIES_RON,
self::CURRENCIES_RSD,
self::CURRENCIES_RUB,
self::CURRENCIES_RWF,
self::CURRENCIES_SAR,
self::CURRENCIES_SBD,
self::CURRENCIES_SCR,
self::CURRENCIES_SDG,
self::CURRENCIES_SEK,
self::CURRENCIES_SGD,
self::CURRENCIES_SHP,
self::CURRENCIES_SLL,
self::CURRENCIES_SOS,
self::CURRENCIES_SPL,
self::CURRENCIES_SRD,
self::CURRENCIES_STD,
self::CURRENCIES_SVC,
self::CURRENCIES_SYP,
self::CURRENCIES_SZL,
self::CURRENCIES_THB,
self::CURRENCIES_TJS,
self::CURRENCIES_TMT,
self::CURRENCIES_TND,
self::CURRENCIES_TOP,
self::CURRENCIES__TRY,
self::CURRENCIES_TTD,
self::CURRENCIES_TVD,
self::CURRENCIES_TWD,
self::CURRENCIES_TZS,
self::CURRENCIES_UAH,
self::CURRENCIES_UGX,
self::CURRENCIES_USD,
self::CURRENCIES_UYU,
self::CURRENCIES_UZS,
self::CURRENCIES_VEF,
self::CURRENCIES_VND,
self::CURRENCIES_VUV,
self::CURRENCIES_WST,
self::CURRENCIES_XAF,
self::CURRENCIES_XCD,
self::CURRENCIES_XDR,
self::CURRENCIES_XOF,
self::CURRENCIES_XPF,
self::CURRENCIES_YER,
self::CURRENCIES_ZAR,
self::CURRENCIES_ZMW,
self::CURRENCIES_ZWD,
self::CURRENCIES_BTC,        ];
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['effectiveDate'] = isset($data['effectiveDate']) ? $data['effectiveDate'] : null;
        $this->container['currencies'] = isset($data['currencies']) ? $data['currencies'] : null;
        $this->container['units'] = isset($data['units']) ? $data['units'] : null;
        $this->container['products'] = isset($data['products']) ? $data['products'] : null;
        $this->container['priceLists'] = isset($data['priceLists']) ? $data['priceLists'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets effectiveDate
     *
     * @return \DateTime
     */
    public function getEffectiveDate()
    {
        return $this->container['effectiveDate'];
    }

    /**
     * Sets effectiveDate
     *
     * @param \DateTime $effectiveDate effectiveDate
     *
     * @return $this
     */
    public function setEffectiveDate($effectiveDate)
    {
        $this->container['effectiveDate'] = $effectiveDate;

        return $this;
    }

    /**
     * Gets currencies
     *
     * @return string[]
     */
    public function getCurrencies()
    {
        return $this->container['currencies'];
    }

    /**
     * Sets currencies
     *
     * @param string[] $currencies currencies
     *
     * @return $this
     */
    public function setCurrencies($currencies)
    {
        $allowedValues = $this->getCurrenciesAllowableValues();
        if (!is_null($currencies) && array_diff($currencies, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'currencies', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['currencies'] = $currencies;

        return $this;
    }

    /**
     * Gets units
     *
     * @return \Killbill\Client\Swagger\Model\Unit[]
     */
    public function getUnits()
    {
        return $this->container['units'];
    }

    /**
     * Sets units
     *
     * @param \Killbill\Client\Swagger\Model\Unit[] $units units
     *
     * @return $this
     */
    public function setUnits($units)
    {
        $this->container['units'] = $units;

        return $this;
    }

    /**
     * Gets products
     *
     * @return \Killbill\Client\Swagger\Model\Product[]
     */
    public function getProducts()
    {
        return $this->container['products'];
    }

    /**
     * Sets products
     *
     * @param \Killbill\Client\Swagger\Model\Product[] $products products
     *
     * @return $this
     */
    public function setProducts($products)
    {
        $this->container['products'] = $products;

        return $this;
    }

    /**
     * Gets priceLists
     *
     * @return \Killbill\Client\Swagger\Model\PriceList[]
     */
    public function getPriceLists()
    {
        return $this->container['priceLists'];
    }

    /**
     * Sets priceLists
     *
     * @param \Killbill\Client\Swagger\Model\PriceList[] $priceLists priceLists
     *
     * @return $this
     */
    public function setPriceLists($priceLists)
    {
        $this->container['priceLists'] = $priceLists;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
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
    public function offsetSet($offset, $value)
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
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
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
