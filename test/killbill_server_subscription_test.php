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


require_once(dirname(__FILE__) . '/killbill_test.php');

class Killbill_Server_SubscriptionTest extends KillbillTest
{

    function setUp()
    {
        parent::setUp();
        $this->externalBundleId = uniqid();
        $this->account = $this->accountData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $paymentMethod = new Killbill_PaymentMethod();
        $paymentMethod->accountId = $this->account->accountId;
        $paymentMethod->isDefault = true;
        $paymentMethod->pluginName = '__EXTERNAL_PAYMENT__';
        $paymentMethod->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $this->account = $this->account->get($this->tenant->getTenantHeaders());
        $this->assertNotEmpty($this->account->paymentMethodId);
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

        # Move by a few days -- still in trial -- and change product
        $this->clock->addDays(3, $this->tenant->getTenantHeaders());
        $subscription->productName = 'Super';
        $subscriptionRes = $subscription->changePlan(null, null, null, $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals($subscriptionRes->productName, 'Super');
        $subscription = $subscriptionRes;

        # Move by a few days -- still in trial -- and execute a cancellation
        $this->clock->addDays(3, $this->tenant->getTenantHeaders());
        $this->assertEmpty($subscription->cancelledDate);
        $subscription->cancel(null, null, null, null, false, $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $subscriptionRes = $subscription->get($this->tenant->getTenantHeaders());
        $this->assertNotEmpty($subscriptionRes->cancelledDate);
    }

    public function testBundleWithAO() {

        $subscriptionData = new Killbill_Subscription();
        $subscriptionData->accountId =  $this->account->accountId;
        $subscriptionData->productName = "Super";
        $subscriptionData->productCategory = "BASE";
        $subscriptionData->billingPeriod = "MONTHLY";
        $subscriptionData->priceList = "DEFAULT";
        $subscriptionData->externalKey = $this->externalBundleId;

        $subscriptionBase = $subscriptionData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals($subscriptionBase->accountId, $subscriptionData->accountId);
        $this->assertEquals($subscriptionBase->productName, $subscriptionData->productName);
        $this->assertEquals($subscriptionBase->productCategory, $subscriptionData->productCategory);
        $this->assertEquals($subscriptionBase->billingPeriod, $subscriptionData->billingPeriod);
        $this->assertEquals($subscriptionBase->externalKey, $subscriptionData->externalKey);

        $this->clock->addDays(3, $this->tenant->getTenantHeaders());

        $subscriptionData2 = new Killbill_Subscription();
        $subscriptionData2->accountId =  $this->account->accountId;
        $subscriptionData2->productName = "RemoteControl";
        $subscriptionData2->productCategory = "ADD_ON";
        $subscriptionData2->billingPeriod = "MONTHLY";
        $subscriptionData2->priceList = "DEFAULT";
        $subscriptionData2->externalKey = $this->externalBundleId;
        $subscriptionData2->bundleId = $subscriptionBase->bundleId;

        $subscriptionAO = $subscriptionData2->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals($subscriptionAO->accountId, $this->account->accountId);
        $this->assertEquals($subscriptionAO->productName, $subscriptionData2->productName);
        $this->assertEquals($subscriptionAO->productCategory, $subscriptionData2->productCategory);
        $this->assertEquals($subscriptionAO->billingPeriod, $subscriptionData2->billingPeriod);
        $this->assertEquals($subscriptionAO->priceList, $subscriptionData2->priceList);
        $this->assertEquals($subscriptionAO->externalKey, $this->externalBundleId);

        $bundle = new Killbill_Bundle();
        $bundle->bundleId = $subscriptionBase->bundleId;
        $bundle = $bundle->get($this->tenant->getTenantHeaders());
        $this->assertNotEmpty($bundle);
        $this->assertEquals($bundle->accountId, $this->account->accountId);
        $this->assertEquals($bundle->externalKey, $this->externalBundleId);
        $this->assertEquals(count($bundle->subscriptions), 2);

        unset($bundle);
        $bundle = new Killbill_Bundle();
        $bundle->externalKey = $this->externalBundleId;
        $bundle = $bundle->getByExternalKey($this->tenant->getTenantHeaders());
        $this->assertNotEmpty($bundle);
        $this->assertEquals($bundle->accountId, $this->account->accountId);
        $this->assertEquals($bundle->externalKey, $this->externalBundleId);
        $this->assertEquals(count($bundle->subscriptions), 2);
        $this->assertEquals($bundle->subscriptions[0]->productCategory, 'BASE');
        $this->assertEquals($bundle->subscriptions[1]->productCategory, 'ADD_ON');
    }

    public function testBundleWithTags() {

        $subscriptionData = new Killbill_Subscription();
        $subscriptionData->accountId =  $this->account->accountId;
        $subscriptionData->productName = "Super";
        $subscriptionData->productCategory = "BASE";
        $subscriptionData->billingPeriod = "MONTHLY";
        $subscriptionData->priceList = "DEFAULT";
        $subscriptionData->externalKey = $this->externalBundleId;

        $subscriptionBase = $subscriptionData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $bundle = new Killbill_Bundle();
        $bundle->bundleId = $subscriptionBase->bundleId;
        $bundle = $bundle->get($this->tenant->getTenantHeaders());


        $tag1 = new Killbill_TagDefinition();
        $tag1->name = uniqid();
        $tag1->description = "This is super tag1";
        $tag1 = $tag1->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $bundleTags = $bundle->addTags(array($tag1->id), $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals(1, count($bundleTags));

        $bundleTags = $bundle->getTags($this->tenant->getTenantHeaders());
        $this->assertEquals(1, count($bundleTags));

        $bundle->deleteTags(array($tag1->id), $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $bundleTags = $bundle->getTags($this->tenant->getTenantHeaders());
        $this->assertEquals(0, count($bundleTags));
    }
}
