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

require_once(dirname(__FILE__) . '/gen/killbill_invoice_item_attributes.php');


class Killbill_InvoiceItem extends Killbill_InvoiceItemAttributes {

    public function createExternalCharge($user, $reason, $comment, $requestedDate = null, $headers = null) {
        # these fields need to be set: $amount, $accountId
        $uri = Killbill_Client::PATH_INVOICES . '/charges?requestedDate=' . htmlentities($requestedDate);

        $response = $this->_create($uri, $user, $reason, $comment, $headers);

        return $this->_getFromBody('Killbill_InvoiceItem', $response);
    }

    public function createExternalChargeForInvoice($user, $reason, $comment, $requestedDate = null, $headers = null) {
        # these fields need to be set: amount, accountId, invoiceId
        $uri = Killbill_Client::PATH_INVOICES . '/' . $this->invoiceId . '/charges?requestedDate=' . htmlentities($requestedDate);

        $response = $this->_create($uri, $user, $reason, $comment, $headers);

        return $this->_getFromBody('Killbill_InvoiceItem', $response);
    }
}
