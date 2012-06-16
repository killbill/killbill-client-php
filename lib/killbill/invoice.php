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

class Killbill_Invoice extends Killbill_Resource {
    protected $amount;
    protected $invoiceId;
    protected $invoiceDate;
    protected $targetDate;
    protected $invoiceNumber;
    protected $credit;
    protected $balance;
    protected $accountId;

    public function get() {
        $response = $this->_get(Killbill_Client::PATH_INVOICES . '/' . $this->invoiceId);
        return $this->_getFromBody(Killbill_Invoice, $response);
    }

    public function getForAccount($accountId) {
        $response = $this->_get(Killbill_Client::PATH_INVOICES . '?account_id=' . $accountId);
        return $this->_getFromBody(Killbill_Invoice, $response);
    }

    public function getInvoiceAsHTML() {
        $response = $this->_get(Killbill_Client::PATH_INVOICES . '/' . $this->invoiceId . '/html');
        return $response->body;
    }
}