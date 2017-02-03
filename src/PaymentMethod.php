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

use Killbill\Client\Type\PaymentMethodAttributes;

class PaymentMethod extends PaymentMethodAttributes {

    public function get($headers = null) {
            $response = $this->_get(Client::PATH_PAYMENT_METHODS . '/' . $this->accountId, $headers);
        return $this->_getFromBody('PaymentMethod', $response);
    }

    public function create($user, $reason, $comment, $headers = null) {
        $uri = Client::PATH_ACCOUNTS . '/' . $this->accountId . '/paymentMethods';
        if ($this->isDefault) {
            $uri = $uri . '?isDefault=true';
        }
        $response = $this->_create($uri, $user, $reason, $comment, $headers);
        return $this->_getFromResponse('PaymentMethod', $response, $headers);
    }
}
