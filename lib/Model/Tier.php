<?php
/**
 * Tier
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
 * Tier Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Tier implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Tier';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'limits' => '\Killbill\Client\Swagger\Model\Limit[]',
'fixedPrice' => '\Killbill\Client\Swagger\Model\Price[]',
'recurringPrice' => '\Killbill\Client\Swagger\Model\Price[]',
'blocks' => '\Killbill\Client\Swagger\Model\TieredBlock[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'limits' => null,
'fixedPrice' => null,
'recurringPrice' => null,
'blocks' => null    ];

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
        'limits' => 'limits',
'fixedPrice' => 'fixedPrice',
'recurringPrice' => 'recurringPrice',
'blocks' => 'blocks'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'limits' => 'setLimits',
'fixedPrice' => 'setFixedPrice',
'recurringPrice' => 'setRecurringPrice',
'blocks' => 'setBlocks'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'limits' => 'getLimits',
'fixedPrice' => 'getFixedPrice',
'recurringPrice' => 'getRecurringPrice',
'blocks' => 'getBlocks'    ];

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
        $this->container['limits'] = isset($data['limits']) ? $data['limits'] : null;
        $this->container['fixedPrice'] = isset($data['fixedPrice']) ? $data['fixedPrice'] : null;
        $this->container['recurringPrice'] = isset($data['recurringPrice']) ? $data['recurringPrice'] : null;
        $this->container['blocks'] = isset($data['blocks']) ? $data['blocks'] : null;
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
     * Gets limits
     *
     * @return \Killbill\Client\Swagger\Model\Limit[]
     */
    public function getLimits()
    {
        return $this->container['limits'];
    }

    /**
     * Sets limits
     *
     * @param \Killbill\Client\Swagger\Model\Limit[] $limits limits
     *
     * @return $this
     */
    public function setLimits($limits): Tier
    {
        $this->container['limits'] = $limits;

        return $this;
    }

    /**
     * Gets fixedPrice
     *
     * @return \Killbill\Client\Swagger\Model\Price[]
     */
    public function getFixedPrice()
    {
        return $this->container['fixedPrice'];
    }

    /**
     * Sets fixedPrice
     *
     * @param \Killbill\Client\Swagger\Model\Price[] $fixedPrice fixedPrice
     *
     * @return $this
     */
    public function setFixedPrice($fixedPrice): Tier
    {
        $this->container['fixedPrice'] = $fixedPrice;

        return $this;
    }

    /**
     * Gets recurringPrice
     *
     * @return \Killbill\Client\Swagger\Model\Price[]
     */
    public function getRecurringPrice()
    {
        return $this->container['recurringPrice'];
    }

    /**
     * Sets recurringPrice
     *
     * @param \Killbill\Client\Swagger\Model\Price[] $recurringPrice recurringPrice
     *
     * @return $this
     */
    public function setRecurringPrice($recurringPrice): Tier
    {
        $this->container['recurringPrice'] = $recurringPrice;

        return $this;
    }

    /**
     * Gets blocks
     *
     * @return \Killbill\Client\Swagger\Model\TieredBlock[]
     */
    public function getBlocks()
    {
        return $this->container['blocks'];
    }

    /**
     * Sets blocks
     *
     * @param \Killbill\Client\Swagger\Model\TieredBlock[] $blocks blocks
     *
     * @return $this
     */
    public function setBlocks($blocks): Tier
    {
        $this->container['blocks'] = $blocks;

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
