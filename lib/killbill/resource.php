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

abstract class Killbill_Resource /* implements JsonSerializable */ {

    protected $_client;

    /**
     * Issue a GET request to killbill
     *
     * @param  $uri relative or absolute killbill url
     * @return a response object
     */
    protected function _get($uri, $headers = null) {
        $this->initClientIfNeeded();

        return $this->_client->request(Killbill_Client::GET, $uri, null, null, null, null, $headers);
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
    protected function _create($uri, $user, $reason, $comment, $headers = null) {
        $this->initClientIfNeeded();

        return $this->_client->request(Killbill_Client::POST, $uri, $this->jsonSerialize($this), $user, $reason, $comment, $headers);
    }

    /**
     * Issue a PUT request to killbill
     *
     * @param  $uri relative or absolute killbill url
     * @param  $user user requesting the update
     * @param  $reason reason for the update
     * @param  $comment any addition comment
     * @return a response object
     */
    protected function _update($uri, $user, $reason, $comment, $headers = null) {
        $this->initClientIfNeeded();

        return $this->_client->request(Killbill_Client::PUT, $uri, $this->jsonSerialize($this), $user, $reason, $comment, $headers);
    }

    /**
     * Issue a DELETE request to killbill
     *
     * @param  $uri relative or absolute killbill url
     * @param  $user user requesting the deletion
     * @param  $reason reason for the deletion
     * @param  $comment any addition comment
     * @return a response object
     */
    protected function _delete($uri, $user, $reason, $comment, $headers = null) {
        $this->initClientIfNeeded();

        return $this->_client->request(Killbill_Client::DELETE, $uri, $this->jsonSerialize($this), $user, $reason, $comment, $headers);
    }

    /**
     * Given a response object, lookup the resource in killbill via
     * the location header
     *
     * @param  $class resource class
     * @param  $response response object
     * @return an instance or collection of resources
     */
    protected function _getFromResponse($class, $response, $headers = null) {
        if ($response == NULL) {
            return null;
        }

        $reponseHeaders = $response->headers;
        if ($reponseHeaders == NULL || $reponseHeaders['Location'] == NULL) {
            return null;
        }

        $this->initClientIfNeeded();

        $getResonse = $this->_get($reponseHeaders['Location'], $headers);
        if ($getResonse == NULL || $getResonse->body == NULL) {
            return null;
        }

        return $this->_getFromBody($class, $getResonse);
    }

    /**
     * Given a response object, decode the body
     *
     * @param  $class resource class (optional)
     * @param  $response response object
     * @return an instance or collection of resources
     */
    public function _getFromBody() {
        $args = func_get_args();
        if (func_num_args() == 1) {
            my_var_dump('at 1');
            $class = get_class($this);
            $response = $args[0];
        } else {
            my_var_dump('at 2');
            $class = $args[0];
            $response = $args[1];
        }

        $data = $response->body;
        $dataJson = json_decode($data);
        if ($dataJson == null) {
            # cater for lack of X-Killbill-ApiKey and X-Killbill-ApiSecret headers
            if (isset($response->statusCode) && isset($response->body))
            {
                return array('statusCode' => $response->statusCode, 'body' => $response->body);
            }

            return null;
        }

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
            $objects [] = $this->fromJsonObject($class, $object);
        }
        return $objects;
    }

    private function fromJsonObject($class, $json) {
        if (is_string($json)) {
            return $json;
        }

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
    public function jsonSerialize() {

        $keys = get_object_vars($this);

        $x = $this->prepareForSerialization();

        return json_encode($x);
    }

    public function prepareForSerialization() {
        $keys = get_object_vars($this);
        unset($keys['_client']);
        foreach($keys as $k => $v) {
            if ($v instanceof Killbill_Resource) {
                $keys[$k] = $v->prepareForSerialization();
            } else if (is_array($v)) {
                $keys[$k]  = array();
                foreach($v as $ve) {
                    if ($ve instanceof Killbill_Resource) {
                        array_push($keys[$k], $ve->prepareForSerialization());
                    } else {
                        array_push($keys[$k], $ve);
                    }
                }
            }
        }
        return $keys;
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