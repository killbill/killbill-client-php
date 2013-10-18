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

require_once(dirname(__FILE__) . '/gen/killbill_invoice_attributes.php');


class Killbill_Invoice extends Killbill_InvoiceAttributes {

    public function get($withItems, $headers = null) {
        $uri = Killbill_Client::PATH_INVOICES . '/' . $this->invoiceId;
        if ($withItems) {
           $uri = $uri . '?withItems=true';
        }
        $response = $this->_get($uri, $headers);
        return $this->_getFromBody('Killbill_Invoice', $response);
    }

    public function getInvoiceAsHTML($headers = null) {
        $response = $this->_get(Killbill_Client::PATH_INVOICES . '/' . $this->invoiceId . '/html', $headers);
        return $response->body;
    }
}