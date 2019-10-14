<?php
/**
 * OverdueCondition
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
 * OpenAPI spec version: 0.20.11
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
 * OverdueCondition Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class OverdueCondition implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'OverdueCondition';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'timeSinceEarliestUnpaidInvoiceEqualsOrExceeds' => '\Killbill\Client\Swagger\Model\Duration',
'controlTagInclusion' => 'string',
'controlTagExclusion' => 'string',
'numberOfUnpaidInvoicesEqualsOrExceeds' => 'int',
'responseForLastFailedPayment' => 'string[]',
'totalUnpaidInvoiceBalanceEqualsOrExceeds' => 'float'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'timeSinceEarliestUnpaidInvoiceEqualsOrExceeds' => null,
'controlTagInclusion' => null,
'controlTagExclusion' => null,
'numberOfUnpaidInvoicesEqualsOrExceeds' => 'int32',
'responseForLastFailedPayment' => null,
'totalUnpaidInvoiceBalanceEqualsOrExceeds' => null    ];

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
        'timeSinceEarliestUnpaidInvoiceEqualsOrExceeds' => 'timeSinceEarliestUnpaidInvoiceEqualsOrExceeds',
'controlTagInclusion' => 'controlTagInclusion',
'controlTagExclusion' => 'controlTagExclusion',
'numberOfUnpaidInvoicesEqualsOrExceeds' => 'numberOfUnpaidInvoicesEqualsOrExceeds',
'responseForLastFailedPayment' => 'responseForLastFailedPayment',
'totalUnpaidInvoiceBalanceEqualsOrExceeds' => 'totalUnpaidInvoiceBalanceEqualsOrExceeds'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'timeSinceEarliestUnpaidInvoiceEqualsOrExceeds' => 'setTimeSinceEarliestUnpaidInvoiceEqualsOrExceeds',
'controlTagInclusion' => 'setControlTagInclusion',
'controlTagExclusion' => 'setControlTagExclusion',
'numberOfUnpaidInvoicesEqualsOrExceeds' => 'setNumberOfUnpaidInvoicesEqualsOrExceeds',
'responseForLastFailedPayment' => 'setResponseForLastFailedPayment',
'totalUnpaidInvoiceBalanceEqualsOrExceeds' => 'setTotalUnpaidInvoiceBalanceEqualsOrExceeds'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'timeSinceEarliestUnpaidInvoiceEqualsOrExceeds' => 'getTimeSinceEarliestUnpaidInvoiceEqualsOrExceeds',
'controlTagInclusion' => 'getControlTagInclusion',
'controlTagExclusion' => 'getControlTagExclusion',
'numberOfUnpaidInvoicesEqualsOrExceeds' => 'getNumberOfUnpaidInvoicesEqualsOrExceeds',
'responseForLastFailedPayment' => 'getResponseForLastFailedPayment',
'totalUnpaidInvoiceBalanceEqualsOrExceeds' => 'getTotalUnpaidInvoiceBalanceEqualsOrExceeds'    ];

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

    const CONTROL_TAG_INCLUSION_AUTO_PAY_OFF = 'AUTO_PAY_OFF';
const CONTROL_TAG_INCLUSION_AUTO_INVOICING_OFF = 'AUTO_INVOICING_OFF';
const CONTROL_TAG_INCLUSION_OVERDUE_ENFORCEMENT_OFF = 'OVERDUE_ENFORCEMENT_OFF';
const CONTROL_TAG_INCLUSION_WRITTEN_OFF = 'WRITTEN_OFF';
const CONTROL_TAG_INCLUSION_MANUAL_PAY = 'MANUAL_PAY';
const CONTROL_TAG_INCLUSION_TEST = 'TEST';
const CONTROL_TAG_INCLUSION_PARTNER = 'PARTNER';
const CONTROL_TAG_INCLUSION_AUTO_INVOICING_DRAFT = 'AUTO_INVOICING_DRAFT';
const CONTROL_TAG_INCLUSION_AUTO_INVOICING_REUSE_DRAFT = 'AUTO_INVOICING_REUSE_DRAFT';
const CONTROL_TAG_EXCLUSION_AUTO_PAY_OFF = 'AUTO_PAY_OFF';
const CONTROL_TAG_EXCLUSION_AUTO_INVOICING_OFF = 'AUTO_INVOICING_OFF';
const CONTROL_TAG_EXCLUSION_OVERDUE_ENFORCEMENT_OFF = 'OVERDUE_ENFORCEMENT_OFF';
const CONTROL_TAG_EXCLUSION_WRITTEN_OFF = 'WRITTEN_OFF';
const CONTROL_TAG_EXCLUSION_MANUAL_PAY = 'MANUAL_PAY';
const CONTROL_TAG_EXCLUSION_TEST = 'TEST';
const CONTROL_TAG_EXCLUSION_PARTNER = 'PARTNER';
const CONTROL_TAG_EXCLUSION_AUTO_INVOICING_DRAFT = 'AUTO_INVOICING_DRAFT';
const CONTROL_TAG_EXCLUSION_AUTO_INVOICING_REUSE_DRAFT = 'AUTO_INVOICING_REUSE_DRAFT';
const RESPONSE_FOR_LAST_FAILED_PAYMENT_INVALID_CARD = 'INVALID_CARD';
const RESPONSE_FOR_LAST_FAILED_PAYMENT_EXPIRED_CARD = 'EXPIRED_CARD';
const RESPONSE_FOR_LAST_FAILED_PAYMENT_LOST_OR_STOLEN_CARD = 'LOST_OR_STOLEN_CARD';
const RESPONSE_FOR_LAST_FAILED_PAYMENT_DO_NOT_HONOR = 'DO_NOT_HONOR';
const RESPONSE_FOR_LAST_FAILED_PAYMENT_INSUFFICIENT_FUNDS = 'INSUFFICIENT_FUNDS';
const RESPONSE_FOR_LAST_FAILED_PAYMENT_DECLINE = 'DECLINE';
const RESPONSE_FOR_LAST_FAILED_PAYMENT_PROCESSING_ERROR = 'PROCESSING_ERROR';
const RESPONSE_FOR_LAST_FAILED_PAYMENT_INVALID_AMOUNT = 'INVALID_AMOUNT';
const RESPONSE_FOR_LAST_FAILED_PAYMENT_DUPLICATE_TRANSACTION = 'DUPLICATE_TRANSACTION';
const RESPONSE_FOR_LAST_FAILED_PAYMENT_OTHER = 'OTHER';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getControlTagInclusionAllowableValues()
    {
        return [
            self::CONTROL_TAG_INCLUSION_AUTO_PAY_OFF,
self::CONTROL_TAG_INCLUSION_AUTO_INVOICING_OFF,
self::CONTROL_TAG_INCLUSION_OVERDUE_ENFORCEMENT_OFF,
self::CONTROL_TAG_INCLUSION_WRITTEN_OFF,
self::CONTROL_TAG_INCLUSION_MANUAL_PAY,
self::CONTROL_TAG_INCLUSION_TEST,
self::CONTROL_TAG_INCLUSION_PARTNER,
self::CONTROL_TAG_INCLUSION_AUTO_INVOICING_DRAFT,
self::CONTROL_TAG_INCLUSION_AUTO_INVOICING_REUSE_DRAFT,        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getControlTagExclusionAllowableValues()
    {
        return [
            self::CONTROL_TAG_EXCLUSION_AUTO_PAY_OFF,
self::CONTROL_TAG_EXCLUSION_AUTO_INVOICING_OFF,
self::CONTROL_TAG_EXCLUSION_OVERDUE_ENFORCEMENT_OFF,
self::CONTROL_TAG_EXCLUSION_WRITTEN_OFF,
self::CONTROL_TAG_EXCLUSION_MANUAL_PAY,
self::CONTROL_TAG_EXCLUSION_TEST,
self::CONTROL_TAG_EXCLUSION_PARTNER,
self::CONTROL_TAG_EXCLUSION_AUTO_INVOICING_DRAFT,
self::CONTROL_TAG_EXCLUSION_AUTO_INVOICING_REUSE_DRAFT,        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getResponseForLastFailedPaymentAllowableValues()
    {
        return [
            self::RESPONSE_FOR_LAST_FAILED_PAYMENT_INVALID_CARD,
self::RESPONSE_FOR_LAST_FAILED_PAYMENT_EXPIRED_CARD,
self::RESPONSE_FOR_LAST_FAILED_PAYMENT_LOST_OR_STOLEN_CARD,
self::RESPONSE_FOR_LAST_FAILED_PAYMENT_DO_NOT_HONOR,
self::RESPONSE_FOR_LAST_FAILED_PAYMENT_INSUFFICIENT_FUNDS,
self::RESPONSE_FOR_LAST_FAILED_PAYMENT_DECLINE,
self::RESPONSE_FOR_LAST_FAILED_PAYMENT_PROCESSING_ERROR,
self::RESPONSE_FOR_LAST_FAILED_PAYMENT_INVALID_AMOUNT,
self::RESPONSE_FOR_LAST_FAILED_PAYMENT_DUPLICATE_TRANSACTION,
self::RESPONSE_FOR_LAST_FAILED_PAYMENT_OTHER,        ];
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
        $this->container['timeSinceEarliestUnpaidInvoiceEqualsOrExceeds'] = isset($data['timeSinceEarliestUnpaidInvoiceEqualsOrExceeds']) ? $data['timeSinceEarliestUnpaidInvoiceEqualsOrExceeds'] : null;
        $this->container['controlTagInclusion'] = isset($data['controlTagInclusion']) ? $data['controlTagInclusion'] : null;
        $this->container['controlTagExclusion'] = isset($data['controlTagExclusion']) ? $data['controlTagExclusion'] : null;
        $this->container['numberOfUnpaidInvoicesEqualsOrExceeds'] = isset($data['numberOfUnpaidInvoicesEqualsOrExceeds']) ? $data['numberOfUnpaidInvoicesEqualsOrExceeds'] : null;
        $this->container['responseForLastFailedPayment'] = isset($data['responseForLastFailedPayment']) ? $data['responseForLastFailedPayment'] : null;
        $this->container['totalUnpaidInvoiceBalanceEqualsOrExceeds'] = isset($data['totalUnpaidInvoiceBalanceEqualsOrExceeds']) ? $data['totalUnpaidInvoiceBalanceEqualsOrExceeds'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getControlTagInclusionAllowableValues();
        if (!is_null($this->container['controlTagInclusion']) && !in_array($this->container['controlTagInclusion'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'controlTagInclusion', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getControlTagExclusionAllowableValues();
        if (!is_null($this->container['controlTagExclusion']) && !in_array($this->container['controlTagExclusion'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'controlTagExclusion', must be one of '%s'",
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
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets timeSinceEarliestUnpaidInvoiceEqualsOrExceeds
     *
     * @return \Killbill\Client\Swagger\Model\Duration
     */
    public function getTimeSinceEarliestUnpaidInvoiceEqualsOrExceeds()
    {
        return $this->container['timeSinceEarliestUnpaidInvoiceEqualsOrExceeds'];
    }

    /**
     * Sets timeSinceEarliestUnpaidInvoiceEqualsOrExceeds
     *
     * @param \Killbill\Client\Swagger\Model\Duration $timeSinceEarliestUnpaidInvoiceEqualsOrExceeds timeSinceEarliestUnpaidInvoiceEqualsOrExceeds
     *
     * @return $this
     */
    public function setTimeSinceEarliestUnpaidInvoiceEqualsOrExceeds($timeSinceEarliestUnpaidInvoiceEqualsOrExceeds)
    {
        $this->container['timeSinceEarliestUnpaidInvoiceEqualsOrExceeds'] = $timeSinceEarliestUnpaidInvoiceEqualsOrExceeds;

        return $this;
    }

    /**
     * Gets controlTagInclusion
     *
     * @return string
     */
    public function getControlTagInclusion()
    {
        return $this->container['controlTagInclusion'];
    }

    /**
     * Sets controlTagInclusion
     *
     * @param string $controlTagInclusion controlTagInclusion
     *
     * @return $this
     */
    public function setControlTagInclusion($controlTagInclusion)
    {
        $allowedValues = $this->getControlTagInclusionAllowableValues();
        if (!is_null($controlTagInclusion) && !in_array($controlTagInclusion, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'controlTagInclusion', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['controlTagInclusion'] = $controlTagInclusion;

        return $this;
    }

    /**
     * Gets controlTagExclusion
     *
     * @return string
     */
    public function getControlTagExclusion()
    {
        return $this->container['controlTagExclusion'];
    }

    /**
     * Sets controlTagExclusion
     *
     * @param string $controlTagExclusion controlTagExclusion
     *
     * @return $this
     */
    public function setControlTagExclusion($controlTagExclusion)
    {
        $allowedValues = $this->getControlTagExclusionAllowableValues();
        if (!is_null($controlTagExclusion) && !in_array($controlTagExclusion, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'controlTagExclusion', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['controlTagExclusion'] = $controlTagExclusion;

        return $this;
    }

    /**
     * Gets numberOfUnpaidInvoicesEqualsOrExceeds
     *
     * @return int
     */
    public function getNumberOfUnpaidInvoicesEqualsOrExceeds()
    {
        return $this->container['numberOfUnpaidInvoicesEqualsOrExceeds'];
    }

    /**
     * Sets numberOfUnpaidInvoicesEqualsOrExceeds
     *
     * @param int $numberOfUnpaidInvoicesEqualsOrExceeds numberOfUnpaidInvoicesEqualsOrExceeds
     *
     * @return $this
     */
    public function setNumberOfUnpaidInvoicesEqualsOrExceeds($numberOfUnpaidInvoicesEqualsOrExceeds)
    {
        $this->container['numberOfUnpaidInvoicesEqualsOrExceeds'] = $numberOfUnpaidInvoicesEqualsOrExceeds;

        return $this;
    }

    /**
     * Gets responseForLastFailedPayment
     *
     * @return string[]
     */
    public function getResponseForLastFailedPayment()
    {
        return $this->container['responseForLastFailedPayment'];
    }

    /**
     * Sets responseForLastFailedPayment
     *
     * @param string[] $responseForLastFailedPayment responseForLastFailedPayment
     *
     * @return $this
     */
    public function setResponseForLastFailedPayment($responseForLastFailedPayment)
    {
        $allowedValues = $this->getResponseForLastFailedPaymentAllowableValues();
        if (!is_null($responseForLastFailedPayment) && array_diff($responseForLastFailedPayment, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'responseForLastFailedPayment', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['responseForLastFailedPayment'] = $responseForLastFailedPayment;

        return $this;
    }

    /**
     * Gets totalUnpaidInvoiceBalanceEqualsOrExceeds
     *
     * @return float
     */
    public function getTotalUnpaidInvoiceBalanceEqualsOrExceeds()
    {
        return $this->container['totalUnpaidInvoiceBalanceEqualsOrExceeds'];
    }

    /**
     * Sets totalUnpaidInvoiceBalanceEqualsOrExceeds
     *
     * @param float $totalUnpaidInvoiceBalanceEqualsOrExceeds totalUnpaidInvoiceBalanceEqualsOrExceeds
     *
     * @return $this
     */
    public function setTotalUnpaidInvoiceBalanceEqualsOrExceeds($totalUnpaidInvoiceBalanceEqualsOrExceeds)
    {
        $this->container['totalUnpaidInvoiceBalanceEqualsOrExceeds'] = $totalUnpaidInvoiceBalanceEqualsOrExceeds;

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
