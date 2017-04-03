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

use Killbill\Client\Type\SubscriptionAttributes;

class Subscription extends SubscriptionAttributes {

    public function get($headers = null) {
        $response = $this->_get(Client::PATH_SUBSCRIPTIONS . '/' . $this->getSubscriptionId(), $headers);
        return $this->_getFromBody('Subscription', $response, $headers);
    }

    /**
    * @return Subscription the newly created subscription
    */
    public function create($user, $reason, $comment, $headers = null) {
        return $this->createAndWait(false, $user, $reason, $comment, $headers);
    }

    public function createAndWait($wait, $user, $reason, $comment, $headers = null) {
        $response = $this->_create(Client::PATH_SUBSCRIPTIONS . '?call_completion=' . ($wait ? 'true' : 'false'), $user, $reason, $comment, $headers);
        return $this->_getFromResponse('Subscription', $response, $headers);
    }

    /**
    * @return Subscription the changed plan
    */
    public function changePlan($requestedDate, $billingPolicy,  $callCompletion, $user, $reason, $comment, $headers = null) {
        $uri = Client::PATH_SUBSCRIPTIONS . '/' . $this->getSubscriptionId();
        $first = true;
        if ($requestedDate) {
            $uri = $uri . ($first ? '?' : '&') . 'requestedDate=' . $requestedDate;
            $first = false;
        }
        if ($billingPolicy) {
            $uri = $uri . ($first ? '?' : '&') . 'billingPolicy=' . $billingPolicy;
            $first = false;
        }
        if ($callCompletion) {
            $uri = $uri . ($first ? '?' : '&') . 'callCompletion=' . $callCompletion;
            $first = false;
        }
        $response = $this->_update($uri, $user, $reason, $comment, $headers);
        return $this->_getFromBody('Subscription', $response);
    }

    public function reinstate($user, $reason, $comment, $headers = null) {
        $response = $this->_update(Client::PATH_SUBSCRIPTIONS . '/' . $this->getSubscriptionId() . '/uncancel', $user, $reason, $comment, $headers);
        return $this->_getFromBody('Subscription', $response);
    }

    public function cancel($requestedDate, $entitlementPolicy, $billingPolicy, $useRequestedDateForBilling, $callCompletion, $user, $reason, $comment, $headers = null) {
        $uri = Client::PATH_SUBSCRIPTIONS . '/' . $this->getSubscriptionId();
        $first = true;
        if ($requestedDate) {
            $uri = $uri . ($first ? '?' : '&') . 'requestedDate=' . $requestedDate;
            $first = false;
        }
        if ($entitlementPolicy) {
            $uri = $uri . ($first ? '?' : '&') . 'entitlementPolicy=' . $entitlementPolicy;
            $first = false;
        }
        if ($billingPolicy) {
            $uri = $uri . ($first ? '?' : '&') . 'billingPolicy=' . $billingPolicy;
            $first = false;
        }
        if ($useRequestedDateForBilling) {
            $uri = $uri . ($first ? '?' : '&') . 'useRequestedDateForBilling=' . $useRequestedDateForBilling;
            $first = false;
        }
        if ($callCompletion) {
            $uri = $uri . ($first ? '?' : '&') . 'callCompletion=' . $callCompletion;
            $first = false;
        }
        $response = $this->_delete($uri, $user, $reason, $comment, $headers);
        return $this->_getFromBody('Subscription', $response);
    }
}
