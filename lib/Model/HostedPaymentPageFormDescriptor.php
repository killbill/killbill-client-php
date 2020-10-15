<?php
/**
 * HostedPaymentPageFormDescriptor
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
 * OpenAPI spec version: 0.22.11
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
 * HostedPaymentPageFormDescriptor Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class HostedPaymentPageFormDescriptor implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'HostedPaymentPageFormDescriptor';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'kbAccountId' => 'string',
'formMethod' => 'string',
'formUrl' => 'string',
'formFields' => 'map[string,object]',
'properties' => 'map[string,object]',
'auditLogs' => '\Killbill\Client\Swagger\Model\AuditLog[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'kbAccountId' => 'uuid',
'formMethod' => null,
'formUrl' => null,
'formFields' => null,
'properties' => null,
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
        'kbAccountId' => 'kbAccountId',
'formMethod' => 'formMethod',
'formUrl' => 'formUrl',
'formFields' => 'formFields',
'properties' => 'properties',
'auditLogs' => 'auditLogs'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'kbAccountId' => 'setKbAccountId',
'formMethod' => 'setFormMethod',
'formUrl' => 'setFormUrl',
'formFields' => 'setFormFields',
'properties' => 'setProperties',
'auditLogs' => 'setAuditLogs'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'kbAccountId' => 'getKbAccountId',
'formMethod' => 'getFormMethod',
'formUrl' => 'getFormUrl',
'formFields' => 'getFormFields',
'properties' => 'getProperties',
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
        $this->container['kbAccountId'] = isset($data['kbAccountId']) ? $data['kbAccountId'] : null;
        $this->container['formMethod'] = isset($data['formMethod']) ? $data['formMethod'] : null;
        $this->container['formUrl'] = isset($data['formUrl']) ? $data['formUrl'] : null;
        $this->container['formFields'] = isset($data['formFields']) ? $data['formFields'] : null;
        $this->container['properties'] = isset($data['properties']) ? $data['properties'] : null;
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
     * Gets kbAccountId
     *
     * @return string
     */
    public function getKbAccountId()
    {
        return $this->container['kbAccountId'];
    }

    /**
     * Sets kbAccountId
     *
     * @param string $kbAccountId kbAccountId
     *
     * @return $this
     */
    public function setKbAccountId($kbAccountId): void
    {
        $this->container['kbAccountId'] = $kbAccountId;

        return $this;
    }

    /**
     * Gets formMethod
     *
     * @return string
     */
    public function getFormMethod()
    {
        return $this->container['formMethod'];
    }

    /**
     * Sets formMethod
     *
     * @param string $formMethod formMethod
     *
     * @return $this
     */
    public function setFormMethod($formMethod): void
    {
        $this->container['formMethod'] = $formMethod;

        return $this;
    }

    /**
     * Gets formUrl
     *
     * @return string
     */
    public function getFormUrl()
    {
        return $this->container['formUrl'];
    }

    /**
     * Sets formUrl
     *
     * @param string $formUrl formUrl
     *
     * @return $this
     */
    public function setFormUrl($formUrl): void
    {
        $this->container['formUrl'] = $formUrl;

        return $this;
    }

    /**
     * Gets formFields
     *
     * @return map[string,object]
     */
    public function getFormFields()
    {
        return $this->container['formFields'];
    }

    /**
     * Sets formFields
     *
     * @param map[string,object] $formFields formFields
     *
     * @return $this
     */
    public function setFormFields($formFields): void
    {
        $this->container['formFields'] = $formFields;

        return $this;
    }

    /**
     * Gets properties
     *
     * @return map[string,object]
     */
    public function getProperties()
    {
        return $this->container['properties'];
    }

    /**
     * Sets properties
     *
     * @param map[string,object] $properties properties
     *
     * @return $this
     */
    public function setProperties($properties): void
    {
        $this->container['properties'] = $properties;

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
    public function setAuditLogs($auditLogs): void
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
    public function offsetGet(int $offset)
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
    public function offsetSet(int $offset, $value): void
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
    public function offsetUnset(int $offset): void
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
