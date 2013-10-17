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



require_once(dirname(__FILE__) . '/../lib/killbill.php');

require_once(dirname(__FILE__) . '/KillbillTest.php');

class Killbill_Server_SubscriptionTest extends KillbillTest
{

    function setUp()
    {
        parent::setUp();
        $this->externalBundleId = uniqid();
        $this->account = $this->accountData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
    }

    function tearDown()
    {
        parent::tearDown();
        unset($this->externalBundleId);
        unset($this->account);
    }


    function testBasic() {

        $subscriptionData = new Killbill_Subscription();
        $subscriptionData->accountId =  $this->account->accountId;
        $subscriptionData->productName = "Sports";
        $subscriptionData->productCategory = "BASE";
        $subscriptionData->billingPeriod = "MONTHLY";
        $subscriptionData->priceList = "DEFAULT";
        $subscriptionData->externalKey = $this->externalBundleId;

        $subscription = $subscriptionData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals($subscription->accountId, $subscriptionData->accountId);
        $this->assertEquals($subscription->productName, $subscriptionData->productName);
        $this->assertEquals($subscription->productCategory, $subscriptionData->productCategory);
        $this->assertEquals($subscription->billingPeriod, $subscriptionData->billingPeriod);
        $this->assertEquals($subscription->externalKey, $subscriptionData->externalKey);
    }
}
