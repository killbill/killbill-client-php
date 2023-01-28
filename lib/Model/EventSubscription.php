<?php
/**
 * EventSubscription
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
 * EventSubscription Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class EventSubscription implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'EventSubscription';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'eventId' => 'string',
'billingPeriod' => 'string',
'effectiveDate' => '\DateTime',
'catalogEffectiveDate' => '\DateTime',
'plan' => 'string',
'product' => 'string',
'priceList' => 'string',
'eventType' => 'string',
'isBlockedBilling' => 'bool',
'isBlockedEntitlement' => 'bool',
'serviceName' => 'string',
'serviceStateName' => 'string',
'phase' => 'string',
'auditLogs' => '\Killbill\Client\Swagger\Model\AuditLog[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'eventId' => 'uuid',
'billingPeriod' => null,
'effectiveDate' => 'date-time',
'catalogEffectiveDate' => 'date-time',
'plan' => null,
'product' => null,
'priceList' => null,
'eventType' => null,
'isBlockedBilling' => null,
'isBlockedEntitlement' => null,
'serviceName' => null,
'serviceStateName' => null,
'phase' => null,
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
        'eventId' => 'eventId',
'billingPeriod' => 'billingPeriod',
'effectiveDate' => 'effectiveDate',
'catalogEffectiveDate' => 'catalogEffectiveDate',
'plan' => 'plan',
'product' => 'product',
'priceList' => 'priceList',
'eventType' => 'eventType',
'isBlockedBilling' => 'isBlockedBilling',
'isBlockedEntitlement' => 'isBlockedEntitlement',
'serviceName' => 'serviceName',
'serviceStateName' => 'serviceStateName',
'phase' => 'phase',
'auditLogs' => 'auditLogs'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'eventId' => 'setEventId',
'billingPeriod' => 'setBillingPeriod',
'effectiveDate' => 'setEffectiveDate',
'catalogEffectiveDate' => 'setCatalogEffectiveDate',
'plan' => 'setPlan',
'product' => 'setProduct',
'priceList' => 'setPriceList',
'eventType' => 'setEventType',
'isBlockedBilling' => 'setIsBlockedBilling',
'isBlockedEntitlement' => 'setIsBlockedEntitlement',
'serviceName' => 'setServiceName',
'serviceStateName' => 'setServiceStateName',
'phase' => 'setPhase',
'auditLogs' => 'setAuditLogs'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'eventId' => 'getEventId',
'billingPeriod' => 'getBillingPeriod',
'effectiveDate' => 'getEffectiveDate',
'catalogEffectiveDate' => 'getCatalogEffectiveDate',
'plan' => 'getPlan',
'product' => 'getProduct',
'priceList' => 'getPriceList',
'eventType' => 'getEventType',
'isBlockedBilling' => 'getIsBlockedBilling',
'isBlockedEntitlement' => 'getIsBlockedEntitlement',
'serviceName' => 'getServiceName',
'serviceStateName' => 'getServiceStateName',
'phase' => 'getPhase',
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

    const BILLING_PERIOD_DAILY = 'DAILY';
const BILLING_PERIOD_WEEKLY = 'WEEKLY';
const BILLING_PERIOD_BIWEEKLY = 'BIWEEKLY';
const BILLING_PERIOD_THIRTY_DAYS = 'THIRTY_DAYS';
const BILLING_PERIOD_THIRTY_ONE_DAYS = 'THIRTY_ONE_DAYS';
const BILLING_PERIOD_SIXTY_DAYS = 'SIXTY_DAYS';
const BILLING_PERIOD_NINETY_DAYS = 'NINETY_DAYS';
const BILLING_PERIOD_MONTHLY = 'MONTHLY';
const BILLING_PERIOD_BIMESTRIAL = 'BIMESTRIAL';
const BILLING_PERIOD_QUARTERLY = 'QUARTERLY';
const BILLING_PERIOD_TRIANNUAL = 'TRIANNUAL';
const BILLING_PERIOD_BIANNUAL = 'BIANNUAL';
const BILLING_PERIOD_ANNUAL = 'ANNUAL';
const BILLING_PERIOD_SESQUIENNIAL = 'SESQUIENNIAL';
const BILLING_PERIOD_BIENNIAL = 'BIENNIAL';
const BILLING_PERIOD_TRIENNIAL = 'TRIENNIAL';
const BILLING_PERIOD_NO_BILLING_PERIOD = 'NO_BILLING_PERIOD';
const EVENT_TYPE_START_ENTITLEMENT = 'START_ENTITLEMENT';
const EVENT_TYPE_START_BILLING = 'START_BILLING';
const EVENT_TYPE_PAUSE_ENTITLEMENT = 'PAUSE_ENTITLEMENT';
const EVENT_TYPE_PAUSE_BILLING = 'PAUSE_BILLING';
const EVENT_TYPE_RESUME_ENTITLEMENT = 'RESUME_ENTITLEMENT';
const EVENT_TYPE_RESUME_BILLING = 'RESUME_BILLING';
const EVENT_TYPE_PHASE = 'PHASE';
const EVENT_TYPE_CHANGE = 'CHANGE';
const EVENT_TYPE_STOP_ENTITLEMENT = 'STOP_ENTITLEMENT';
const EVENT_TYPE_STOP_BILLING = 'STOP_BILLING';
const EVENT_TYPE_SERVICE_STATE_CHANGE = 'SERVICE_STATE_CHANGE';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBillingPeriodAllowableValues(): array
    {
        return [
            self::BILLING_PERIOD_DAILY,
self::BILLING_PERIOD_WEEKLY,
self::BILLING_PERIOD_BIWEEKLY,
self::BILLING_PERIOD_THIRTY_DAYS,
self::BILLING_PERIOD_THIRTY_ONE_DAYS,
self::BILLING_PERIOD_SIXTY_DAYS,
self::BILLING_PERIOD_NINETY_DAYS,
self::BILLING_PERIOD_MONTHLY,
self::BILLING_PERIOD_BIMESTRIAL,
self::BILLING_PERIOD_QUARTERLY,
self::BILLING_PERIOD_TRIANNUAL,
self::BILLING_PERIOD_BIANNUAL,
self::BILLING_PERIOD_ANNUAL,
self::BILLING_PERIOD_SESQUIENNIAL,
self::BILLING_PERIOD_BIENNIAL,
self::BILLING_PERIOD_TRIENNIAL,
self::BILLING_PERIOD_NO_BILLING_PERIOD,        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEventTypeAllowableValues(): array
    {
        return [
            self::EVENT_TYPE_START_ENTITLEMENT,
self::EVENT_TYPE_START_BILLING,
self::EVENT_TYPE_PAUSE_ENTITLEMENT,
self::EVENT_TYPE_PAUSE_BILLING,
self::EVENT_TYPE_RESUME_ENTITLEMENT,
self::EVENT_TYPE_RESUME_BILLING,
self::EVENT_TYPE_PHASE,
self::EVENT_TYPE_CHANGE,
self::EVENT_TYPE_STOP_ENTITLEMENT,
self::EVENT_TYPE_STOP_BILLING,
self::EVENT_TYPE_SERVICE_STATE_CHANGE,        ];
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
        $this->container['eventId'] = isset($data['eventId']) ? $data['eventId'] : null;
        $this->container['billingPeriod'] = isset($data['billingPeriod']) ? $data['billingPeriod'] : null;
        $this->container['effectiveDate'] = isset($data['effectiveDate']) ? $data['effectiveDate'] : null;
        $this->container['catalogEffectiveDate'] = isset($data['catalogEffectiveDate']) ? $data['catalogEffectiveDate'] : null;
        $this->container['plan'] = isset($data['plan']) ? $data['plan'] : null;
        $this->container['product'] = isset($data['product']) ? $data['product'] : null;
        $this->container['priceList'] = isset($data['priceList']) ? $data['priceList'] : null;
        $this->container['eventType'] = isset($data['eventType']) ? $data['eventType'] : null;
        $this->container['isBlockedBilling'] = isset($data['isBlockedBilling']) ? $data['isBlockedBilling'] : null;
        $this->container['isBlockedEntitlement'] = isset($data['isBlockedEntitlement']) ? $data['isBlockedEntitlement'] : null;
        $this->container['serviceName'] = isset($data['serviceName']) ? $data['serviceName'] : null;
        $this->container['serviceStateName'] = isset($data['serviceStateName']) ? $data['serviceStateName'] : null;
        $this->container['phase'] = isset($data['phase']) ? $data['phase'] : null;
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

        $allowedValues = $this->getBillingPeriodAllowableValues();
        if (!is_null($this->container['billingPeriod']) && !in_array($this->container['billingPeriod'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'billingPeriod', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getEventTypeAllowableValues();
        if (!is_null($this->container['eventType']) && !in_array($this->container['eventType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'eventType', must be one of '%s'",
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
     * Gets eventId
     *
     * @return string
     */
    public function getEventId()
    {
        return $this->container['eventId'];
    }

    /**
     * Sets eventId
     *
     * @param string $eventId eventId
     *
     * @return $this
     */
    public function setEventId($eventId): EventSubscription
    {
        $this->container['eventId'] = $eventId;

        return $this;
    }

    /**
     * Gets billingPeriod
     *
     * @return string
     */
    public function getBillingPeriod()
    {
        return $this->container['billingPeriod'];
    }

    /**
     * Sets billingPeriod
     *
     * @param string $billingPeriod billingPeriod
     *
     * @return $this
     */
    public function setBillingPeriod($billingPeriod): EventSubscription
    {
        $allowedValues = $this->getBillingPeriodAllowableValues();
        if (!is_null($billingPeriod) && !in_array($billingPeriod, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'billingPeriod', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['billingPeriod'] = $billingPeriod;

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
    public function setEffectiveDate($effectiveDate): EventSubscription
    {
        $this->container['effectiveDate'] = $effectiveDate;

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
    public function setCatalogEffectiveDate($catalogEffectiveDate): EventSubscription
    {
        $this->container['catalogEffectiveDate'] = $catalogEffectiveDate;

        return $this;
    }

    /**
     * Gets plan
     *
     * @return string
     */
    public function getPlan()
    {
        return $this->container['plan'];
    }

    /**
     * Sets plan
     *
     * @param string $plan plan
     *
     * @return $this
     */
    public function setPlan($plan): EventSubscription
    {
        $this->container['plan'] = $plan;

        return $this;
    }

    /**
     * Gets product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->container['product'];
    }

    /**
     * Sets product
     *
     * @param string $product product
     *
     * @return $this
     */
    public function setProduct($product): EventSubscription
    {
        $this->container['product'] = $product;

        return $this;
    }

    /**
     * Gets priceList
     *
     * @return string
     */
    public function getPriceList()
    {
        return $this->container['priceList'];
    }

    /**
     * Sets priceList
     *
     * @param string $priceList priceList
     *
     * @return $this
     */
    public function setPriceList($priceList): EventSubscription
    {
        $this->container['priceList'] = $priceList;

        return $this;
    }

    /**
     * Gets eventType
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->container['eventType'];
    }

    /**
     * Sets eventType
     *
     * @param string $eventType eventType
     *
     * @return $this
     */
    public function setEventType($eventType): EventSubscription
    {
        $allowedValues = $this->getEventTypeAllowableValues();
        if (!is_null($eventType) && !in_array($eventType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'eventType', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['eventType'] = $eventType;

        return $this;
    }

    /**
     * Gets isBlockedBilling
     *
     * @return bool
     */
    public function getIsBlockedBilling()
    {
        return $this->container['isBlockedBilling'];
    }

    /**
     * Sets isBlockedBilling
     *
     * @param bool $isBlockedBilling isBlockedBilling
     *
     * @return $this
     */
    public function setIsBlockedBilling($isBlockedBilling): EventSubscription
    {
        $this->container['isBlockedBilling'] = $isBlockedBilling;

        return $this;
    }

    /**
     * Gets isBlockedEntitlement
     *
     * @return bool
     */
    public function getIsBlockedEntitlement()
    {
        return $this->container['isBlockedEntitlement'];
    }

    /**
     * Sets isBlockedEntitlement
     *
     * @param bool $isBlockedEntitlement isBlockedEntitlement
     *
     * @return $this
     */
    public function setIsBlockedEntitlement($isBlockedEntitlement): EventSubscription
    {
        $this->container['isBlockedEntitlement'] = $isBlockedEntitlement;

        return $this;
    }

    /**
     * Gets serviceName
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->container['serviceName'];
    }

    /**
     * Sets serviceName
     *
     * @param string $serviceName serviceName
     *
     * @return $this
     */
    public function setServiceName($serviceName): EventSubscription
    {
        $this->container['serviceName'] = $serviceName;

        return $this;
    }

    /**
     * Gets serviceStateName
     *
     * @return string
     */
    public function getServiceStateName()
    {
        return $this->container['serviceStateName'];
    }

    /**
     * Sets serviceStateName
     *
     * @param string $serviceStateName serviceStateName
     *
     * @return $this
     */
    public function setServiceStateName($serviceStateName): EventSubscription
    {
        $this->container['serviceStateName'] = $serviceStateName;

        return $this;
    }

    /**
     * Gets phase
     *
     * @return string
     */
    public function getPhase()
    {
        return $this->container['phase'];
    }

    /**
     * Sets phase
     *
     * @param string $phase phase
     *
     * @return $this
     */
    public function setPhase($phase): EventSubscription
    {
        $this->container['phase'] = $phase;

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
    public function setAuditLogs($auditLogs): EventSubscription
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
