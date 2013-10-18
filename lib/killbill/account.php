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

require_once(dirname(__FILE__) . '/gen/killbill_account_attributes.php');

class Killbill_Account extends Killbill_AccountAttributes {

    public function get($headers = null) {
        if ($this->accountId) {
            $response = $this->_get(Killbill_Client::PATH_ACCOUNTS . '/' . $this->accountId, $headers);
        } else {
            $response = $this->_get(Killbill_Client::PATH_ACCOUNTS . '?external_key=' . $this->externalKey, $headers);
        }
        return $this->_getFromBody('Killbill_Account', $response);
    }

    public function create($user, $reason, $comment, $headers = null) {
        $response = $this->_create(Killbill_Client::PATH_ACCOUNTS, $user, $reason, $comment, $headers);
        return $this->_getFromResponse('Killbill_Account', $response, $headers);
    }

    public function update($user, $reason, $comment, $headers = null) {
        $response = $this->_update(Killbill_Client::PATH_ACCOUNTS . '/' . $this->accountId, $user, $reason, $comment, $headers);
        return $this->_getFromBody('Killbill_Account', $response);
    }

    public function getBundles($headers = null) {
        $response = $this->_get(Killbill_Client::PATH_ACCOUNTS . '/' . $this->accountId . '/bundles', $headers);
        return $this->_getFromBody('Killbill_Bundle', $response);
    }

    public function getInvoices($withItems, $headers = null) {
        $uri = Killbill_Client::PATH_ACCOUNTS . '/' . $this->accountId . '/invoices';
        if ($withItems) {
            $uri = $uri . '?withItems=true';
        }
        $response = $this->_get($uri, $headers);
        return $this->_getFromBody('Killbill_Invoice', $response);
    }

    public function getPaymentMethods($headers = null) {
        $response = $this->_get(Killbill_Client::PATH_ACCOUNTS . '/' . $this->accountId . '/paymentMethods', $headers);
        return $this->_getFromBody('Killbill_PaymentMethod', $response);
    }

    public function getTags($headers = null) {
        $response = $this->_get(Killbill_Client::PATH_ACCOUNTS . '/' . $this->accountId . Killbill_Client::PATH_TAGS, $headers);
        return $this->_getFromBody('Killbill_Tag', $response);
    }

    public function addTags($tags, $user, $reason, $comment, $headers = null) {
        $response = $this->_create(Killbill_Client::PATH_ACCOUNTS . '/' . $this->accountId . Killbill_Client::PATH_TAGS  . '?tagList=' . join(',', $tags),
            $user, $reason, $comment, $headers);
        return $this->_getFromResponse('Killbill_Tag', $response, $headers);
    }
}