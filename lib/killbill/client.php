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

class Killbill_Client {
    public static $serverUrl = 'http://127.0.0.1:8080';
    public static $apiVersion = '1.0';

    const API_CLIENT_VERSION = '1.0.0';
    const DEFAULT_ENCODING = 'UTF-8';

    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';
    const HEAD = 'HEAD';

    const PATH_ACCOUNTS = '/accounts';
    const PATH_BUNDLES = '/bundles';
    const PATH_CATALOG = '/catalog';
    const PATH_INVOICES = '/invoices';
    const PATH_SUBSCRIPTIONS = '/subscriptions';
    const PATH_TAGS = '/tags';
    const PATH_TAGDEFINITIONS = '/tagDefinitions';

    public function request($method, $uri, $data = null, $user = null, $reason = null, $comment = null) {
        return $this->_sendRequest($method, $uri, $data, $user, $reason, $comment);
    }

    private function _sendRequest($method, $uri, $data = null, $user = null, $reason = null, $comment = null) {
        if (function_exists('mb_internal_encoding')) {
            mb_internal_encoding(self::DEFAULT_ENCODING);
        }

        if (substr($uri, 0, 4) != 'http') {
            $uri = self::__apiUrl() . $uri;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uri);
        // Don't follow the Location header
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
        // Include the header in the output
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        // Transfer as a string of the return value of curl_exec() instead of outputting it out directly
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // The number of seconds to wait while trying to connect
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        // The maximum number of seconds to allow cURL functions to execute
        curl_setopt($ch, CURLOPT_TIMEOUT, 45);
        // Default headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Accept: application/json',
            'X-Killbill-Reason: ' . $reason,
            'X-Killbill-CreatedBy: ' . $user,
            'X-Killbill-Comment: ' . $comment,
            self::__userAgent()
        ));

        if ('POST' == $method) {
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        else if ('PUT' == $method) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        else if ('GET' != $method) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        // Send the request
        $response = curl_exec($ch);

        // Handle errors
        if ($response === false) {
            $errorNumber = curl_errno($ch);
            $message = curl_error($ch);
            curl_close($ch);
            $this->_raiseCurlError($errorNumber, $message);
        }

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        list($header, $body) = explode("\r\n\r\n", $response, 2);
        $headers = $this->_getHeaders($header);

        return new Killbill_Response($statusCode, $headers, $body);
    }

    private static function __apiUrl() {
        return Killbill_Client::$serverUrl . '/' . Killbill_Client::$apiVersion . '/kb';
    }

    private static function __userAgent() {
        return "User-Agent: Killbill/" . self::API_CLIENT_VERSION . '; PHP ' . phpversion() . ' [' . php_uname('s') . ']';
    }

    private function _getHeaders($headerText) {
        $headers = explode("\r\n", $headerText);

        $returnHeaders = array();
        foreach ($headers as &$header) {
            preg_match('/([^:]+): (.*)/', $header, $matches);
            if (sizeof($matches) > 2)
                $returnHeaders[$matches[1]] = $matches[2];
        }

        return $returnHeaders;
    }

    private function _raiseCurlError($errorNumber, $message) {
        switch ($errorNumber) {
            case CURLE_COULDNT_CONNECT:
            case CURLE_COULDNT_RESOLVE_HOST:
            case CURLE_OPERATION_TIMEOUTED:
                throw new Exception("Failed to connect to Killbill");
            case CURLE_SSL_CACERT:
            case CURLE_SSL_PEER_CERTIFICATE:
                throw new Exception("Could not verify Killbill's SSL certificate");
            default:
                throw new Exception("An unexpected error occurred connecting with Killbill");
        }
    }
}