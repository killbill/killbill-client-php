<?php
/**
 * PaymentMethod
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
 * PaymentMethod Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PaymentMethod implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentMethod';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'paymentMethodId' => 'string',
'externalKey' => 'string',
'accountId' => 'string',
'isDefault' => 'bool',
'pluginName' => 'string',
'pluginInfo' => '\Killbill\Client\Swagger\Model\PaymentMethodPluginDetail',
'auditLogs' => '\Killbill\Client\Swagger\Model\AuditLog[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'paymentMethodId' => 'uuid',
'externalKey' => null,
'accountId' => 'uuid',
'isDefault' => null,
'pluginName' => null,
'pluginInfo' => null,
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
        'paymentMethodId' => 'paymentMethodId',
'externalKey' => 'externalKey',
'accountId' => 'accountId',
'isDefault' => 'isDefault',
'pluginName' => 'pluginName',
'pluginInfo' => 'pluginInfo',
'auditLogs' => 'auditLogs'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'paymentMethodId' => 'setPaymentMethodId',
'externalKey' => 'setExternalKey',
'accountId' => 'setAccountId',
'isDefault' => 'setIsDefault',
'pluginName' => 'setPluginName',
'pluginInfo' => 'setPluginInfo',
'auditLogs' => 'setAuditLogs'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'paymentMethodId' => 'getPaymentMethodId',
'externalKey' => 'getExternalKey',
'accountId' => 'getAccountId',
'isDefault' => 'getIsDefault',
'pluginName' => 'getPluginName',
'pluginInfo' => 'getPluginInfo',
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
        $this->container['paymentMethodId'] = isset($data['paymentMethodId']) ? $data['paymentMethodId'] : null;
        $this->container['externalKey'] = isset($data['externalKey']) ? $data['externalKey'] : null;
        $this->container['accountId'] = isset($data['accountId']) ? $data['accountId'] : null;
        $this->container['isDefault'] = isset($data['isDefault']) ? $data['isDefault'] : null;
        $this->container['pluginName'] = isset($data['pluginName']) ? $data['pluginName'] : null;
        $this->container['pluginInfo'] = isset($data['pluginInfo']) ? $data['pluginInfo'] : null;
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
     * Gets paymentMethodId
     *
     * @return string
     */
    public function getPaymentMethodId()
    {
        return $this->container['paymentMethodId'];
    }

    /**
     * Sets paymentMethodId
     *
     * @param string $paymentMethodId paymentMethodId
     *
     * @return $this
     */
    public function setPaymentMethodId($paymentMethodId): PaymentMethod
    {
        $this->container['paymentMethodId'] = $paymentMethodId;

        return $this;
    }

    /**
     * Gets externalKey
     *
     * @return string
     */
    public function getExternalKey()
    {
        return $this->container['externalKey'];
    }

    /**
     * Sets externalKey
     *
     * @param string $externalKey externalKey
     *
     * @return $this
     */
    public function setExternalKey($externalKey): PaymentMethod
    {
        $this->container['externalKey'] = $externalKey;

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
    public function setAccountId($accountId): PaymentMethod
    {
        $this->container['accountId'] = $accountId;

        return $this;
    }

    /**
     * Gets isDefault
     *
     * @return bool
     */
    public function getIsDefault()
    {
        return $this->container['isDefault'];
    }

    /**
     * Sets isDefault
     *
     * @param bool $isDefault isDefault
     *
     * @return $this
     */
    public function setIsDefault($isDefault): PaymentMethod
    {
        $this->container['isDefault'] = $isDefault;

        return $this;
    }

    /**
     * Gets pluginName
     *
     * @return string
     */
    public function getPluginName()
    {
        return $this->container['pluginName'];
    }

    /**
     * Sets pluginName
     *
     * @param string $pluginName pluginName
     *
     * @return $this
     */
    public function setPluginName($pluginName): PaymentMethod
    {
        $this->container['pluginName'] = $pluginName;

        return $this;
    }

    /**
     * Gets pluginInfo
     *
     * @return \Killbill\Client\Swagger\Model\PaymentMethodPluginDetail
     */
    public function getPluginInfo()
    {
        return $this->container['pluginInfo'];
    }

    /**
     * Sets pluginInfo
     *
     * @param \Killbill\Client\Swagger\Model\PaymentMethodPluginDetail $pluginInfo pluginInfo
     *
     * @return $this
     */
    public function setPluginInfo($pluginInfo): PaymentMethod
    {
        $this->container['pluginInfo'] = $pluginInfo;

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
    public function setAuditLogs($auditLogs): PaymentMethod
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
