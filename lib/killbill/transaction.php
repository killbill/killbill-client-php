<?php

/*
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

require_once(dirname(__FILE__) . '/gen/killbill_payment_transaction_attributes.php');

class Killbill_Transaction extends Killbill_PaymentTransactionAttributes
{
    public function createAuthorization($accountId, $paymentMethodId, $user, $reason, $comment, $headers = null)
    {
        $this->transactionType = 'AUTHORIZE';
        return $this->_createAccountTransaction($accountId, $paymentMethodId, $user, $reason, $comment, $headers);
    }

    public function createPurchase($accountId, $paymentMethodId, $user, $reason, $comment, $headers = null)
    {
        $this->transactionType = 'PURCHASE';
        return $this->_createAccountTransaction($accountId, $paymentMethodId, $user, $reason, $comment, $headers);
    }

    public function createCredit($accountId, $paymentMethodId, $user, $reason, $comment, $headers = null)
    {
        $this->transactionType = 'CREDIT';
        return $this->_createAccountTransaction($accountId, $paymentMethodId, $user, $reason, $comment, $headers);
    }

    public function createCapture($user, $reason, $comment, $headers = null)
    {
        $uri = Killbill_Client::PATH_PAYMENTS . '/' . $this->paymentId;
        return $this->_createTransaction($uri, $user, $reason, $comment, $headers);
    }

    public function createRefund($user, $reason, $comment, $headers = null)
    {
        $uri = Killbill_Client::PATH_PAYMENTS . '/' . $this->paymentId . '/refunds';
        return $this->_createTransaction($uri, $user, $reason, $comment, $headers);
    }

    public function createChargeback($user, $reason, $comment, $headers = null)
    {
        $uri = Killbill_Client::PATH_PAYMENTS . '/' . $this->paymentId . '/chargebacks';
        return $this->_createTransaction($uri, $user, $reason, $comment, $headers);
    }

    public function createVoid($user, $reason, $comment, $headers = null)
    {
        $uri = Killbill_Client::PATH_PAYMENTS . '/' . $this->paymentId;
        $response = $this->_delete($uri, $user, $reason, $comment, $headers);
        return $this->_getFromResponse('Killbill_Payment', $response, $headers);
    }

    public function _createAccountTransaction($accountId, $paymentMethodId, $user, $reason, $comment, $headers = null)
    {
        $uri = Killbill_Client::PATH_ACCOUNTS . '/' . $accountId . '/payments';
        if ($paymentMethodId) {
            $uri = $uri . '?paymentMethodId=' . $paymentMethodId;
        }
        return $this->_createTransaction($uri, $user, $reason, $comment, $headers);
    }

    public function _createTransaction($uri, $user, $reason, $comment, $headers = null)
    {
        $response = $this->_create($uri, $user, $reason, $comment, $headers);
        return $this->_getFromResponse('Killbill_Payment', $response, $headers);
    }
}
