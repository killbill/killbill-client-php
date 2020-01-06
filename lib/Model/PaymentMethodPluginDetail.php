<?php
/**
 * PaymentMethodPluginDetail
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
 * PaymentMethodPluginDetail Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PaymentMethodPluginDetail implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentMethodPluginDetail';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'externalPaymentMethodId' => 'string',
'isDefaultPaymentMethod' => 'bool',
'properties' => '\Killbill\Client\Swagger\Model\PluginProperty[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'externalPaymentMethodId' => null,
'isDefaultPaymentMethod' => null,
'properties' => null    ];

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
        'externalPaymentMethodId' => 'externalPaymentMethodId',
'isDefaultPaymentMethod' => 'isDefaultPaymentMethod',
'properties' => 'properties'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'externalPaymentMethodId' => 'setExternalPaymentMethodId',
'isDefaultPaymentMethod' => 'setIsDefaultPaymentMethod',
'properties' => 'setProperties'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'externalPaymentMethodId' => 'getExternalPaymentMethodId',
'isDefaultPaymentMethod' => 'getIsDefaultPaymentMethod',
'properties' => 'getProperties'    ];

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
        $this->container['externalPaymentMethodId'] = isset($data['externalPaymentMethodId']) ? $data['externalPaymentMethodId'] : null;
        $this->container['isDefaultPaymentMethod'] = isset($data['isDefaultPaymentMethod']) ? $data['isDefaultPaymentMethod'] : null;
        $this->container['properties'] = isset($data['properties']) ? $data['properties'] : null;
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
     * Gets externalPaymentMethodId
     *
     * @return string
     */
    public function getExternalPaymentMethodId()
    {
        return $this->container['externalPaymentMethodId'];
    }

    /**
     * Sets externalPaymentMethodId
     *
     * @param string $externalPaymentMethodId externalPaymentMethodId
     *
     * @return $this
     */
    public function setExternalPaymentMethodId($externalPaymentMethodId)
    {
        $this->container['externalPaymentMethodId'] = $externalPaymentMethodId;

        return $this;
    }

    /**
     * Gets isDefaultPaymentMethod
     *
     * @return bool
     */
    public function getIsDefaultPaymentMethod()
    {
        return $this->container['isDefaultPaymentMethod'];
    }

    /**
     * Sets isDefaultPaymentMethod
     *
     * @param bool $isDefaultPaymentMethod isDefaultPaymentMethod
     *
     * @return $this
     */
    public function setIsDefaultPaymentMethod($isDefaultPaymentMethod)
    {
        $this->container['isDefaultPaymentMethod'] = $isDefaultPaymentMethod;

        return $this;
    }

    /**
     * Gets properties
     *
     * @return \Killbill\Client\Swagger\Model\PluginProperty[]
     */
    public function getProperties()
    {
        return $this->container['properties'];
    }

    /**
     * Sets properties
     *
     * @param \Killbill\Client\Swagger\Model\PluginProperty[] $properties properties
     *
     * @return $this
     */
    public function setProperties($properties)
    {
        $this->container['properties'] = $properties;

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
