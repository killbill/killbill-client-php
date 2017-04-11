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

class ServerSubscriptionTest extends KillbillTest
{
    /**
    * @var Account
    */
    protected $account = null;

    function setUp()
    {
        parent::setUp();
        $this->externalBundleId = uniqid();
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') == '1') {
            $this->externalBundleId = md5('serverSubscriptionTest' . static::class . ':' . $this->getName());
        }
        $this->account = $this->accountData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $paymentMethod = new PaymentMethod();
        $paymentMethod->setAccountId($this->account->getAccountId());
        $paymentMethod->setIsDefault(true);
        $paymentMethod->setPluginName('__EXTERNAL_PAYMENT__');
        $paymentMethod->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $this->account = $this->account->get($this->tenant->getTenantHeaders());
        $this->assertNotEmpty($this->account->getPaymentMethodId());
    }

    function tearDown()
    {
        parent::tearDown();
        unset($this->externalBundleId);
        unset($this->account);
    }


    function testBasic() {

        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Sports');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setExternalKey($this->externalBundleId);

        $subscription = $subscriptionData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals($subscription->getAccountId(), $subscriptionData->getAccountId());
        $this->assertEquals($subscription->getProductName(), $subscriptionData->getProductName());
        $this->assertEquals($subscription->getProductCategory(), $subscriptionData->getProductCategory());
        $this->assertEquals($subscription->getBillingPeriod(), $subscriptionData->getBillingPeriod());
        $this->assertEquals($subscription->getExternalKey(), $subscriptionData->getExternalKey());

        # Move by a few days -- still in trial -- and change product
        $this->clock->addDays(3, $this->tenant->getTenantHeaders());
        $subscription->setPlanName('super-monthly');
        $subscriptionRes = $subscription->changePlan(null, null, null, $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals($subscriptionRes->getProductName(), 'Super');
        $subscription = $subscriptionRes;

        # Move by a few days -- still in trial -- and execute a cancellation
        $this->clock->addDays(3, $this->tenant->getTenantHeaders());
        $this->assertEmpty($subscription->getCancelledDate());
        $subscription->cancel(null, null, null, null, false, $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $subscriptionRes = $subscription->get($this->tenant->getTenantHeaders());
        $this->assertNotEmpty($subscriptionRes->getCancelledDate());
    }

    public function testBundleWithAO() {

        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Super');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setExternalKey($this->externalBundleId);

        $subscriptionBase = $subscriptionData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals($subscriptionBase->getAccountId(), $subscriptionData->getAccountId());
        $this->assertEquals($subscriptionBase->getProductName(), $subscriptionData->getProductName());
        $this->assertEquals($subscriptionBase->getProductCategory(), $subscriptionData->getProductCategory());
        $this->assertEquals($subscriptionBase->getBillingPeriod(), $subscriptionData->getBillingPeriod());
        $this->assertEquals($subscriptionBase->getExternalKey(), $subscriptionData->getExternalKey());

        $this->clock->addDays(3, $this->tenant->getTenantHeaders());

        $subscriptionData2 = new Subscription();
        $subscriptionData2->setAccountId($this->account->getAccountId());
        $subscriptionData2->setProductName('RemoteControl');
        $subscriptionData2->setProductCategory('ADD_ON');
        $subscriptionData2->setBillingPeriod('MONTHLY');
        $subscriptionData2->setPriceList('DEFAULT');
        $subscriptionData2->setExternalKey($this->externalBundleId);
        $subscriptionData2->setBundleId($subscriptionBase->getBundleId());

        $subscriptionAO = $subscriptionData2->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals($subscriptionAO->getAccountId(), $this->account->getAccountId());
        $this->assertEquals($subscriptionAO->getProductName(), $subscriptionData2->getProductName());
        $this->assertEquals($subscriptionAO->getProductCategory(), $subscriptionData2->getProductCategory());
        $this->assertEquals($subscriptionAO->getBillingPeriod(), $subscriptionData2->getBillingPeriod());
        $this->assertEquals($subscriptionAO->getPriceList(), $subscriptionData2->getPriceList());
        $this->assertEquals($subscriptionAO->getExternalKey(), $this->externalBundleId);

        $bundle = new Bundle();
        $bundle->setBundleId($subscriptionBase->getBundleId());
        $bundle = $bundle->get($this->tenant->getTenantHeaders());
        $this->assertNotEmpty($bundle);
        $this->assertEquals($bundle->getAccountId(), $this->account->getAccountId());
        $this->assertEquals($bundle->getExternalKey(), $this->externalBundleId);
        $this->assertEquals(count($bundle->getSubscriptions()), 2);

        unset($bundle);
        $bundle = new Bundle();
        $bundle->setExternalKey($this->externalBundleId);
        $bundles = $bundle->getByExternalKey($this->tenant->getTenantHeaders());
        $this->assertEquals(count($bundles), 1);
        $bundle = $bundles[0];
        $this->assertNotEmpty($bundle);
        $this->assertEquals($bundle->getAccountId(), $this->account->getAccountId());
        $this->assertEquals($bundle->getExternalKey(), $this->externalBundleId);
        $this->assertEquals(count($bundle->getSubscriptions()), 2);
        $this->assertEquals($bundle->getSubscriptions()[0]->productCategory, 'BASE');
        $this->assertEquals($bundle->getSubscriptions()[1]->productCategory, 'ADD_ON');
    }

    public function testBundleWithTags() {

        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Super');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setExternalKey($this->externalBundleId);

        $subscriptionBase = $subscriptionData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $bundle = new Bundle();
        $bundle->setBundleId($subscriptionBase->getBundleId());
        $bundle = $bundle->get($this->tenant->getTenantHeaders());


        $tag1 = new TagDefinition();
        $tag1->setName(uniqid());
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') == '1') {
            $tag1->setName(md5('testBundleWithTags' . static::class . ':' . $this->getName()));
        }
        $tag1->setDescription('This is super tag1');
        $tag1 = $tag1->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $bundleTags = $bundle->addTags(array($tag1->getId()), $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals(1, count($bundleTags));

        $bundleTags = $bundle->getTags($this->tenant->getTenantHeaders());
        $this->assertEquals(1, count($bundleTags));

        $bundle->deleteTags(array($tag1->getId()), $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $bundleTags = $bundle->getTags($this->tenant->getTenantHeaders());
        $this->assertEquals(0, count($bundleTags));
    }
}
