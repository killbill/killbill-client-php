<?php
/*
 * Copyright 2011-2017 Ning, Inc.
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

namespace Killbill\Client;

use Killbill\Client\Type\InvoiceAttributes;

class Invoice extends InvoiceAttributes {

    /**
    * @return Invoice
    */
    public function get($withItems, $headers = null) {
        $uri = Client::PATH_INVOICES . '/' . $this->getInvoiceId();
        if ($withItems) {
           $uri = $uri . '?withItems=true';
        }
        $response = $this->_get($uri, $headers);
        return $this->_getFromBody('Invoice', $response);
    }

    public function getInvoiceAsHTML($headers = null) {
        $response = $this->_get(Client::PATH_INVOICES . '/' . $this->getInvoiceId() . '/html', $headers);
        return $response->body;
    }
}
