<?php
/*
 * Copyright 2011-2012 Ning, Inc.
 *
 * Ning licenses this file to you under the Apache License, version 2.0
 * (the "License"); you may not use this file except in compliance with the
 * License.  You may obtain a copy of the License at:
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.  See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

abstract class Killbill_Resource { // implements JsonSerializable {
    protected $_client;

    /**
     * Issue a GET request to killbill
     *
     * @param  $uri relative or absolute killbill url
     * @return a response object
     */
    protected function _get($uri) {
        $this->initClientIfNeeded();

        return $this->_client->request(Killbill_Client::GET, $uri, null, null, null);
    }

    /**
     * Issue a POST request to killbill
     *
     * @param  $uri relative or absolute killbill url
     * @param  $user user requesting the creation
     * @param  $reason reason for the creation
     * @param  $comment any addition comment
     * @return a response object
     */
    protected function _create($uri, $user, $reason, $comment) {
        $this->initClientIfNeeded();

        return $this->_client->request(Killbill_Client::POST, $uri, $this->jsonSerialize($this), $user, $reason, $comment);
    }

    /**
     * Given a response object, lookup the resource in killbill via
     * the location header
     *
     * @param  $class resource class
     * @param  $response response object
     * @return an instance or collection of resources
     */
    protected function _getFromResponse($class, $response) {
        if ($response == NULL) {
            return null;
        }

        $headers = $response->headers;
        if ($headers == NULL || $headers['Location'] == NULL) {
            return null;
        }

        $this->initClientIfNeeded();

        $getResonse = $this->_get($headers['Location']);
        if ($getResonse == NULL || $getResonse->body == NULL) {
            return null;
        }

        return $this->_getFromBody($class, $getResonse);
    }

    /**
     * Given a response object, decode the body
     *
     * @param  $class resource class
     * @param  $response response object
     * @return an instance or collection of resources
     */
    protected function _getFromBody($class, $response) {
        $data = $response->body;
        $dataJson = json_decode($data);

        return $this->fromJson($class, $dataJson);
    }

    /**
     * Given a json object, create the associated resource(s)
     * instance(s)
     *
     * @param  $class resource class
     * @param  $json decoded json from killbill
     * @return an instance or collection of resources
     */
    private function fromJson($class, $json) {
        if (is_array($json)) {
            return $this->fromJsonArray($class, $json);
        } else {
            return $this->fromJsonObject($class, $json);
        }
    }

    private function fromJsonArray($class, $json) {
        $objects = array();
        foreach ($json as $object) {
            $objects [] = $this->fromJsonObject($class, $json);
        }
        return $objects;
    }

    private function fromJsonObject($class, $json) {
        $object = new $class();

        foreach ($json as $key => $value) {
            $object->__set($key, $value);
        }

        return $object;
    }

    /**
     * Return this resource as a json object
     *
     * @return json encoded resource
     */
    private function jsonSerialize() {
        $keys = get_object_vars($this);
        // Don't serialize the client
        unset($keys['_client']);

        return json_encode($keys);
    }

    private function initClientIfNeeded() {
        if (is_null($this->_client)) {
            $this->_client = new Killbill_Client();
        }
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}