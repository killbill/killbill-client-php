<?php
/**
 * PlanDetail
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
 * PlanDetail Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PlanDetail implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PlanDetail';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'product' => 'string',
'plan' => 'string',
'priceList' => 'string',
'finalPhaseBillingPeriod' => 'string',
'finalPhaseRecurringPrice' => '\Killbill\Client\Swagger\Model\Price[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'product' => null,
'plan' => null,
'priceList' => null,
'finalPhaseBillingPeriod' => null,
'finalPhaseRecurringPrice' => null    ];

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
        'product' => 'product',
'plan' => 'plan',
'priceList' => 'priceList',
'finalPhaseBillingPeriod' => 'finalPhaseBillingPeriod',
'finalPhaseRecurringPrice' => 'finalPhaseRecurringPrice'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'product' => 'setProduct',
'plan' => 'setPlan',
'priceList' => 'setPriceList',
'finalPhaseBillingPeriod' => 'setFinalPhaseBillingPeriod',
'finalPhaseRecurringPrice' => 'setFinalPhaseRecurringPrice'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'product' => 'getProduct',
'plan' => 'getPlan',
'priceList' => 'getPriceList',
'finalPhaseBillingPeriod' => 'getFinalPhaseBillingPeriod',
'finalPhaseRecurringPrice' => 'getFinalPhaseRecurringPrice'    ];

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

    const FINAL_PHASE_BILLING_PERIOD_DAILY = 'DAILY';
const FINAL_PHASE_BILLING_PERIOD_WEEKLY = 'WEEKLY';
const FINAL_PHASE_BILLING_PERIOD_BIWEEKLY = 'BIWEEKLY';
const FINAL_PHASE_BILLING_PERIOD_THIRTY_DAYS = 'THIRTY_DAYS';
const FINAL_PHASE_BILLING_PERIOD_THIRTY_ONE_DAYS = 'THIRTY_ONE_DAYS';
const FINAL_PHASE_BILLING_PERIOD_SIXTY_DAYS = 'SIXTY_DAYS';
const FINAL_PHASE_BILLING_PERIOD_NINETY_DAYS = 'NINETY_DAYS';
const FINAL_PHASE_BILLING_PERIOD_MONTHLY = 'MONTHLY';
const FINAL_PHASE_BILLING_PERIOD_BIMESTRIAL = 'BIMESTRIAL';
const FINAL_PHASE_BILLING_PERIOD_QUARTERLY = 'QUARTERLY';
const FINAL_PHASE_BILLING_PERIOD_TRIANNUAL = 'TRIANNUAL';
const FINAL_PHASE_BILLING_PERIOD_BIANNUAL = 'BIANNUAL';
const FINAL_PHASE_BILLING_PERIOD_ANNUAL = 'ANNUAL';
const FINAL_PHASE_BILLING_PERIOD_SESQUIENNIAL = 'SESQUIENNIAL';
const FINAL_PHASE_BILLING_PERIOD_BIENNIAL = 'BIENNIAL';
const FINAL_PHASE_BILLING_PERIOD_TRIENNIAL = 'TRIENNIAL';
const FINAL_PHASE_BILLING_PERIOD_NO_BILLING_PERIOD = 'NO_BILLING_PERIOD';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFinalPhaseBillingPeriodAllowableValues(): array
    {
        return [
            self::FINAL_PHASE_BILLING_PERIOD_DAILY,
self::FINAL_PHASE_BILLING_PERIOD_WEEKLY,
self::FINAL_PHASE_BILLING_PERIOD_BIWEEKLY,
self::FINAL_PHASE_BILLING_PERIOD_THIRTY_DAYS,
self::FINAL_PHASE_BILLING_PERIOD_THIRTY_ONE_DAYS,
self::FINAL_PHASE_BILLING_PERIOD_SIXTY_DAYS,
self::FINAL_PHASE_BILLING_PERIOD_NINETY_DAYS,
self::FINAL_PHASE_BILLING_PERIOD_MONTHLY,
self::FINAL_PHASE_BILLING_PERIOD_BIMESTRIAL,
self::FINAL_PHASE_BILLING_PERIOD_QUARTERLY,
self::FINAL_PHASE_BILLING_PERIOD_TRIANNUAL,
self::FINAL_PHASE_BILLING_PERIOD_BIANNUAL,
self::FINAL_PHASE_BILLING_PERIOD_ANNUAL,
self::FINAL_PHASE_BILLING_PERIOD_SESQUIENNIAL,
self::FINAL_PHASE_BILLING_PERIOD_BIENNIAL,
self::FINAL_PHASE_BILLING_PERIOD_TRIENNIAL,
self::FINAL_PHASE_BILLING_PERIOD_NO_BILLING_PERIOD,        ];
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
        $this->container['product'] = isset($data['product']) ? $data['product'] : null;
        $this->container['plan'] = isset($data['plan']) ? $data['plan'] : null;
        $this->container['priceList'] = isset($data['priceList']) ? $data['priceList'] : null;
        $this->container['finalPhaseBillingPeriod'] = isset($data['finalPhaseBillingPeriod']) ? $data['finalPhaseBillingPeriod'] : null;
        $this->container['finalPhaseRecurringPrice'] = isset($data['finalPhaseRecurringPrice']) ? $data['finalPhaseRecurringPrice'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        $allowedValues = $this->getFinalPhaseBillingPeriodAllowableValues();
        if (!is_null($this->container['finalPhaseBillingPeriod']) && !in_array($this->container['finalPhaseBillingPeriod'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'finalPhaseBillingPeriod', must be one of '%s'",
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
    public function setProduct($product): PlanDetail
    {
        $this->container['product'] = $product;

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
    public function setPlan($plan): PlanDetail
    {
        $this->container['plan'] = $plan;

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
    public function setPriceList($priceList): PlanDetail
    {
        $this->container['priceList'] = $priceList;

        return $this;
    }

    /**
     * Gets finalPhaseBillingPeriod
     *
     * @return string
     */
    public function getFinalPhaseBillingPeriod()
    {
        return $this->container['finalPhaseBillingPeriod'];
    }

    /**
     * Sets finalPhaseBillingPeriod
     *
     * @param string $finalPhaseBillingPeriod finalPhaseBillingPeriod
     *
     * @return $this
     */
    public function setFinalPhaseBillingPeriod($finalPhaseBillingPeriod): PlanDetail
    {
        $allowedValues = $this->getFinalPhaseBillingPeriodAllowableValues();
        if (!is_null($finalPhaseBillingPeriod) && !in_array($finalPhaseBillingPeriod, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'finalPhaseBillingPeriod', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['finalPhaseBillingPeriod'] = $finalPhaseBillingPeriod;

        return $this;
    }

    /**
     * Gets finalPhaseRecurringPrice
     *
     * @return \Killbill\Client\Swagger\Model\Price[]
     */
    public function getFinalPhaseRecurringPrice()
    {
        return $this->container['finalPhaseRecurringPrice'];
    }

    /**
     * Sets finalPhaseRecurringPrice
     *
     * @param \Killbill\Client\Swagger\Model\Price[] $finalPhaseRecurringPrice finalPhaseRecurringPrice
     *
     * @return $this
     */
    public function setFinalPhaseRecurringPrice($finalPhaseRecurringPrice): PlanDetail
    {
        $this->container['finalPhaseRecurringPrice'] = $finalPhaseRecurringPrice;

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
