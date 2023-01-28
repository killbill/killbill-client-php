<?php
/**
 * AuditLog
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
 * AuditLog Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AuditLog implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AuditLog';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'changeType' => 'string',
'changeDate' => '\DateTime',
'objectType' => 'string',
'objectId' => 'string',
'changedBy' => 'string',
'reasonCode' => 'string',
'comments' => 'string',
'userToken' => 'string',
'history' => '\Killbill\Client\Swagger\Model\Entity'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'changeType' => null,
'changeDate' => 'date-time',
'objectType' => null,
'objectId' => 'uuid',
'changedBy' => null,
'reasonCode' => null,
'comments' => null,
'userToken' => null,
'history' => null    ];

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
        'changeType' => 'changeType',
'changeDate' => 'changeDate',
'objectType' => 'objectType',
'objectId' => 'objectId',
'changedBy' => 'changedBy',
'reasonCode' => 'reasonCode',
'comments' => 'comments',
'userToken' => 'userToken',
'history' => 'history'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'changeType' => 'setChangeType',
'changeDate' => 'setChangeDate',
'objectType' => 'setObjectType',
'objectId' => 'setObjectId',
'changedBy' => 'setChangedBy',
'reasonCode' => 'setReasonCode',
'comments' => 'setComments',
'userToken' => 'setUserToken',
'history' => 'setHistory'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'changeType' => 'getChangeType',
'changeDate' => 'getChangeDate',
'objectType' => 'getObjectType',
'objectId' => 'getObjectId',
'changedBy' => 'getChangedBy',
'reasonCode' => 'getReasonCode',
'comments' => 'getComments',
'userToken' => 'getUserToken',
'history' => 'getHistory'    ];

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

    const OBJECT_TYPE_ACCOUNT = 'ACCOUNT';
const OBJECT_TYPE_ACCOUNT_EMAIL = 'ACCOUNT_EMAIL';
const OBJECT_TYPE_BLOCKING_STATES = 'BLOCKING_STATES';
const OBJECT_TYPE_BUNDLE = 'BUNDLE';
const OBJECT_TYPE_CUSTOM_FIELD = 'CUSTOM_FIELD';
const OBJECT_TYPE_INVOICE = 'INVOICE';
const OBJECT_TYPE_PAYMENT = 'PAYMENT';
const OBJECT_TYPE_TRANSACTION = 'TRANSACTION';
const OBJECT_TYPE_INVOICE_ITEM = 'INVOICE_ITEM';
const OBJECT_TYPE_INVOICE_PAYMENT = 'INVOICE_PAYMENT';
const OBJECT_TYPE_SUBSCRIPTION = 'SUBSCRIPTION';
const OBJECT_TYPE_SUBSCRIPTION_EVENT = 'SUBSCRIPTION_EVENT';
const OBJECT_TYPE_SERVICE_BROADCAST = 'SERVICE_BROADCAST';
const OBJECT_TYPE_PAYMENT_ATTEMPT = 'PAYMENT_ATTEMPT';
const OBJECT_TYPE_PAYMENT_METHOD = 'PAYMENT_METHOD';
const OBJECT_TYPE_TAG = 'TAG';
const OBJECT_TYPE_TAG_DEFINITION = 'TAG_DEFINITION';
const OBJECT_TYPE_TENANT = 'TENANT';
const OBJECT_TYPE_TENANT_KVS = 'TENANT_KVS';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getObjectTypeAllowableValues(): array
    {
        return [
            self::OBJECT_TYPE_ACCOUNT,
self::OBJECT_TYPE_ACCOUNT_EMAIL,
self::OBJECT_TYPE_BLOCKING_STATES,
self::OBJECT_TYPE_BUNDLE,
self::OBJECT_TYPE_CUSTOM_FIELD,
self::OBJECT_TYPE_INVOICE,
self::OBJECT_TYPE_PAYMENT,
self::OBJECT_TYPE_TRANSACTION,
self::OBJECT_TYPE_INVOICE_ITEM,
self::OBJECT_TYPE_INVOICE_PAYMENT,
self::OBJECT_TYPE_SUBSCRIPTION,
self::OBJECT_TYPE_SUBSCRIPTION_EVENT,
self::OBJECT_TYPE_SERVICE_BROADCAST,
self::OBJECT_TYPE_PAYMENT_ATTEMPT,
self::OBJECT_TYPE_PAYMENT_METHOD,
self::OBJECT_TYPE_TAG,
self::OBJECT_TYPE_TAG_DEFINITION,
self::OBJECT_TYPE_TENANT,
self::OBJECT_TYPE_TENANT_KVS,        ];
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
        $this->container['changeType'] = isset($data['changeType']) ? $data['changeType'] : null;
        $this->container['changeDate'] = isset($data['changeDate']) ? $data['changeDate'] : null;
        $this->container['objectType'] = isset($data['objectType']) ? $data['objectType'] : null;
        $this->container['objectId'] = isset($data['objectId']) ? $data['objectId'] : null;
        $this->container['changedBy'] = isset($data['changedBy']) ? $data['changedBy'] : null;
        $this->container['reasonCode'] = isset($data['reasonCode']) ? $data['reasonCode'] : null;
        $this->container['comments'] = isset($data['comments']) ? $data['comments'] : null;
        $this->container['userToken'] = isset($data['userToken']) ? $data['userToken'] : null;
        $this->container['history'] = isset($data['history']) ? $data['history'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        $allowedValues = $this->getObjectTypeAllowableValues();
        if (!is_null($this->container['objectType']) && !in_array($this->container['objectType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'objectType', must be one of '%s'",
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
     * Gets changeType
     *
     * @return string
     */
    public function getChangeType()
    {
        return $this->container['changeType'];
    }

    /**
     * Sets changeType
     *
     * @param string $changeType changeType
     *
     * @return $this
     */
    public function setChangeType($changeType): AuditLog
    {
        $this->container['changeType'] = $changeType;

        return $this;
    }

    /**
     * Gets changeDate
     *
     * @return \DateTime
     */
    public function getChangeDate()
    {
        return $this->container['changeDate'];
    }

    /**
     * Sets changeDate
     *
     * @param \DateTime $changeDate changeDate
     *
     * @return $this
     */
    public function setChangeDate($changeDate): AuditLog
    {
        $this->container['changeDate'] = $changeDate;

        return $this;
    }

    /**
     * Gets objectType
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->container['objectType'];
    }

    /**
     * Sets objectType
     *
     * @param string $objectType objectType
     *
     * @return $this
     */
    public function setObjectType($objectType): AuditLog
    {
        $allowedValues = $this->getObjectTypeAllowableValues();
        if (!is_null($objectType) && !in_array($objectType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'objectType', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['objectType'] = $objectType;

        return $this;
    }

    /**
     * Gets objectId
     *
     * @return string
     */
    public function getObjectId()
    {
        return $this->container['objectId'];
    }

    /**
     * Sets objectId
     *
     * @param string $objectId objectId
     *
     * @return $this
     */
    public function setObjectId($objectId): AuditLog
    {
        $this->container['objectId'] = $objectId;

        return $this;
    }

    /**
     * Gets changedBy
     *
     * @return string
     */
    public function getChangedBy()
    {
        return $this->container['changedBy'];
    }

    /**
     * Sets changedBy
     *
     * @param string $changedBy changedBy
     *
     * @return $this
     */
    public function setChangedBy($changedBy): AuditLog
    {
        $this->container['changedBy'] = $changedBy;

        return $this;
    }

    /**
     * Gets reasonCode
     *
     * @return string
     */
    public function getReasonCode()
    {
        return $this->container['reasonCode'];
    }

    /**
     * Sets reasonCode
     *
     * @param string $reasonCode reasonCode
     *
     * @return $this
     */
    public function setReasonCode($reasonCode): AuditLog
    {
        $this->container['reasonCode'] = $reasonCode;

        return $this;
    }

    /**
     * Gets comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->container['comments'];
    }

    /**
     * Sets comments
     *
     * @param string $comments comments
     *
     * @return $this
     */
    public function setComments($comments): AuditLog
    {
        $this->container['comments'] = $comments;

        return $this;
    }

    /**
     * Gets userToken
     *
     * @return string
     */
    public function getUserToken()
    {
        return $this->container['userToken'];
    }

    /**
     * Sets userToken
     *
     * @param string $userToken userToken
     *
     * @return $this
     */
    public function setUserToken($userToken): AuditLog
    {
        $this->container['userToken'] = $userToken;

        return $this;
    }

    /**
     * Gets history
     *
     * @return \Killbill\Client\Swagger\Model\Entity
     */
    public function getHistory()
    {
        return $this->container['history'];
    }

    /**
     * Sets history
     *
     * @param \Killbill\Client\Swagger\Model\Entity $history history
     *
     * @return $this
     */
    public function setHistory($history): AuditLog
    {
        $this->container['history'] = $history;

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
