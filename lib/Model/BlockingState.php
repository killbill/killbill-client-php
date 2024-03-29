<?php
/**
 * BlockingState
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
 * BlockingState Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class BlockingState implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'BlockingState';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'blockedId' => 'string',
'stateName' => 'string',
'service' => 'string',
'isBlockChange' => 'bool',
'isBlockEntitlement' => 'bool',
'isBlockBilling' => 'bool',
'effectiveDate' => '\DateTime',
'type' => 'string',
'auditLogs' => '\Killbill\Client\Swagger\Model\AuditLog[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'blockedId' => 'uuid',
'stateName' => null,
'service' => null,
'isBlockChange' => null,
'isBlockEntitlement' => null,
'isBlockBilling' => null,
'effectiveDate' => 'date-time',
'type' => null,
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
        'blockedId' => 'blockedId',
'stateName' => 'stateName',
'service' => 'service',
'isBlockChange' => 'isBlockChange',
'isBlockEntitlement' => 'isBlockEntitlement',
'isBlockBilling' => 'isBlockBilling',
'effectiveDate' => 'effectiveDate',
'type' => 'type',
'auditLogs' => 'auditLogs'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'blockedId' => 'setBlockedId',
'stateName' => 'setStateName',
'service' => 'setService',
'isBlockChange' => 'setIsBlockChange',
'isBlockEntitlement' => 'setIsBlockEntitlement',
'isBlockBilling' => 'setIsBlockBilling',
'effectiveDate' => 'setEffectiveDate',
'type' => 'setType',
'auditLogs' => 'setAuditLogs'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'blockedId' => 'getBlockedId',
'stateName' => 'getStateName',
'service' => 'getService',
'isBlockChange' => 'getIsBlockChange',
'isBlockEntitlement' => 'getIsBlockEntitlement',
'isBlockBilling' => 'getIsBlockBilling',
'effectiveDate' => 'getEffectiveDate',
'type' => 'getType',
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

    const TYPE_SUBSCRIPTION = 'SUBSCRIPTION';
const TYPE_SUBSCRIPTION_BUNDLE = 'SUBSCRIPTION_BUNDLE';
const TYPE_ACCOUNT = 'ACCOUNT';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues(): array
    {
        return [
            self::TYPE_SUBSCRIPTION,
self::TYPE_SUBSCRIPTION_BUNDLE,
self::TYPE_ACCOUNT,        ];
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
        $this->container['blockedId'] = isset($data['blockedId']) ? $data['blockedId'] : null;
        $this->container['stateName'] = isset($data['stateName']) ? $data['stateName'] : null;
        $this->container['service'] = isset($data['service']) ? $data['service'] : null;
        $this->container['isBlockChange'] = isset($data['isBlockChange']) ? $data['isBlockChange'] : null;
        $this->container['isBlockEntitlement'] = isset($data['isBlockEntitlement']) ? $data['isBlockEntitlement'] : null;
        $this->container['isBlockBilling'] = isset($data['isBlockBilling']) ? $data['isBlockBilling'] : null;
        $this->container['effectiveDate'] = isset($data['effectiveDate']) ? $data['effectiveDate'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
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

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'type', must be one of '%s'",
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
     * Gets blockedId
     *
     * @return string
     */
    public function getBlockedId()
    {
        return $this->container['blockedId'];
    }

    /**
     * Sets blockedId
     *
     * @param string $blockedId blockedId
     *
     * @return $this
     */
    public function setBlockedId($blockedId): BlockingState
    {
        $this->container['blockedId'] = $blockedId;

        return $this;
    }

    /**
     * Gets stateName
     *
     * @return string
     */
    public function getStateName()
    {
        return $this->container['stateName'];
    }

    /**
     * Sets stateName
     *
     * @param string $stateName stateName
     *
     * @return $this
     */
    public function setStateName($stateName): BlockingState
    {
        $this->container['stateName'] = $stateName;

        return $this;
    }

    /**
     * Gets service
     *
     * @return string
     */
    public function getService()
    {
        return $this->container['service'];
    }

    /**
     * Sets service
     *
     * @param string $service service
     *
     * @return $this
     */
    public function setService($service): BlockingState
    {
        $this->container['service'] = $service;

        return $this;
    }

    /**
     * Gets isBlockChange
     *
     * @return bool
     */
    public function getIsBlockChange()
    {
        return $this->container['isBlockChange'];
    }

    /**
     * Sets isBlockChange
     *
     * @param bool $isBlockChange isBlockChange
     *
     * @return $this
     */
    public function setIsBlockChange($isBlockChange): BlockingState
    {
        $this->container['isBlockChange'] = $isBlockChange;

        return $this;
    }

    /**
     * Gets isBlockEntitlement
     *
     * @return bool
     */
    public function getIsBlockEntitlement()
    {
        return $this->container['isBlockEntitlement'];
    }

    /**
     * Sets isBlockEntitlement
     *
     * @param bool $isBlockEntitlement isBlockEntitlement
     *
     * @return $this
     */
    public function setIsBlockEntitlement($isBlockEntitlement): BlockingState
    {
        $this->container['isBlockEntitlement'] = $isBlockEntitlement;

        return $this;
    }

    /**
     * Gets isBlockBilling
     *
     * @return bool
     */
    public function getIsBlockBilling()
    {
        return $this->container['isBlockBilling'];
    }

    /**
     * Sets isBlockBilling
     *
     * @param bool $isBlockBilling isBlockBilling
     *
     * @return $this
     */
    public function setIsBlockBilling($isBlockBilling): BlockingState
    {
        $this->container['isBlockBilling'] = $isBlockBilling;

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
    public function setEffectiveDate($effectiveDate): BlockingState
    {
        $this->container['effectiveDate'] = $effectiveDate;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type type
     *
     * @return $this
     */
    public function setType($type): BlockingState
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($type) && !in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

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
    public function setAuditLogs($auditLogs): BlockingState
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
