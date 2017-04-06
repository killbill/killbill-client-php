<?php

/*
 * Copyright 2011-2017 Ning, Inc.
 * Copyright 2014 Groupon, Inc.
 * Copyright 2014 The Billing Project, LLC
 *
 * The Billing Project licenses this file to you under the Apache License, version 2.0
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

namespace Killbill\Client;

use Killbill\Client\Type\AccountAttributes;

class Account extends AccountAttributes {

    /**
    * @return Account the fetched account
    */
    public function get($headers = null) {
        if ($this->getAccountId()) {
            $response = $this->_get(Client::PATH_ACCOUNTS . '/' . $this->getAccountId(), $headers);
        } else {
            $response = $this->_get(Client::PATH_ACCOUNTS . '?externalKey=' . $this->getExternalKey(), $headers);
        }
        return $this->_getFromBody('Account', $response);
    }

    /**
    * @return Account newly created account
    */
    public function create($user, $reason, $comment, $headers = null) {
        $response = $this->_create(Client::PATH_ACCOUNTS, $user, $reason, $comment, $headers);
        return $this->_getFromResponse('Account', $response, $headers);
    }

    /**
    * @return Account the updated account
    */
    public function update($user, $reason, $comment, $headers = null) {
        $response = $this->_update(Client::PATH_ACCOUNTS . '/' . $this->getAccountId(), $user, $reason, $comment, $headers);
        return $this->_getFromBody('Account', $response);
    }

    public function getBundles($headers = null) {
        $response = $this->_get(Client::PATH_ACCOUNTS . '/' . $this->getAccountId() . '/bundles', $headers);
        return $this->_getFromBody('Bundle', $response);
    }

    public function getInvoices($withItems, $unpaidInvoicesOnly, $headers = null) {
        $first = true;
        $uri = Client::PATH_ACCOUNTS . '/' . $this->getAccountId() . '/invoices';
        if ($withItems) {
            $uri = $uri . '?withItems=true';
            $first = false;
        }
        if ($unpaidInvoicesOnly) {
            $uri = $uri . ($first ? '?' : '&') . 'unpaidInvoicesOnly=true';
            $first = false;
        }

        $response = $this->_get($uri, $headers);
        return $this->_getFromBody('Invoice', $response);
    }

    public function payAllUnpaidInvoices($user, $reason, $comment, $headers = null) {
        $uri = Client::PATH_ACCOUNTS . '/' . $this->getAccountId() . '/payments';
        $this->_create($uri, $user, $reason, $comment, $headers);
        return null;
    }

    /**
    * @return Overdue
    */
    public function getOverdueState($headers = null) {
        $response = $this->_get(Client::PATH_ACCOUNTS . '/' . $this->getAccountId() . '/overdue', $headers);
        return $this->_getFromBody('Overdue', $response);
    }

    /**
    * @return PaymentMethod[]
    */
    public function getPaymentMethods($headers = null) {
        $response = $this->_get(Client::PATH_ACCOUNTS . '/' . $this->getAccountId() . '/paymentMethods', $headers);
        return $this->_getFromBody('PaymentMethod', $response);
    }

    public function getPayments($headers = null) {
        $response = $this->_get(Client::PATH_ACCOUNTS . '/' . $this->getAccountId() . '/payments', $headers);
        return $this->_getFromBody('Payment', $response);
    }

    public function getTags($headers = null) {
        $response = $this->_get(Client::PATH_ACCOUNTS . '/' . $this->getAccountId() . Client::PATH_TAGS, $headers);
        return $this->_getFromBody('Tag', $response);
    }

    public function addTags($tags, $user, $reason, $comment, $headers = null) {
        $response = $this->_create(Client::PATH_ACCOUNTS . '/' . $this->getAccountId() . Client::PATH_TAGS  . '?tagList=' . join(',', $tags),
            $user, $reason, $comment, $headers);
        return $this->_getFromResponse('Tag', $response, $headers);
    }

    public function deleteTags($tags, $user, $reason, $comment, $headers = null) {
        $response = $this->_delete(Client::PATH_ACCOUNTS . '/' . $this->getAccountId() . Client::PATH_TAGS  . '?tagList=' . join(',', $tags),
            $user, $reason, $comment, $headers);
        return null;
    }
}
