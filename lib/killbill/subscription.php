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

class Killbill_Subscription extends Killbill_Resource {
    protected $subscriptionId;
    protected $bundleId;
    protected $startDate;
    protected $productName;
    protected $productCategory;
    protected $billingPeriod;
    protected $priceList;
    protected $chargedThroughDate;

    public function get() {
        $response = $this->_get(Killbill_Client::PATH_SUBSCRIPTIONS . '/' . $this->subscriptionId);
        return $this->_getFromBody(Killbill_Subscription, $response);
    }

    public function create($user, $reason, $comment) {
        $response = $this->_create(Killbill_Client::PATH_SUBSCRIPTIONS, $user, $reason, $comment);
        return $this->_getFromResponse(Killbill_Subscription, $response);
    }

    public function update($user, $reason, $comment) {
        $response = $this->_update(Killbill_Client::PATH_SUBSCRIPTIONS . '/' . $this->subscriptionId, $user, $reason, $comment);
        return $this->_getFromBody(Killbill_Subscription, $response);
    }

    public function reinstate($user, $reason, $comment) {
        $response = $this->_update(Killbill_Client::PATH_SUBSCRIPTIONS . '/' . $this->subscriptionId . '/uncancel', $user, $reason, $comment);
        return $this->_getFromBody(Killbill_Subscription, $response);
    }

    public function cancel($user, $reason, $comment) {
        $response = $this->_delete(Killbill_Client::PATH_SUBSCRIPTIONS . '/' . $this->subscriptionId, $user, $reason, $comment);
        return $this->_getFromBody(Killbill_Subscription, $response);
    }
}