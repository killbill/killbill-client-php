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

use Killbill\Client\Swagger\Model\Account;
use Killbill\Client\Swagger\Model\CustomField;
use Killbill\Client\Swagger\Model\PaymentMethod;
use Killbill\Client\Swagger\Model\Subscription;
use Killbill\Client\Swagger\Model\TagDefinition;

/**
 * Tests for Subscription
 */
class ServerSubscriptionTest extends KillbillTest
{
    /** @var Account|null */
    protected $account;
    /** @var string|null */
    private $externalBundleId;

    /**
     * Set up test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->externalBundleId = uniqid();
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') == '1') {
            $this->externalBundleId = md5('serverSubscriptionTest'.$this->tenant->getExternalKey());
        }
        $this->account = $this->client->getAccountApi()->createAccount($this->accountData, self::USER, self::REASON, self::COMMENT);

        $paymentMethod = new PaymentMethod();
//        $paymentMethod->setAccountId($this->account->getAccountId());
//        $paymentMethod->setIsDefault(true);
        $paymentMethod->setPluginName('__EXTERNAL_PAYMENT__');
        //TODO: $default = 'true' must be without quotes
        $this->client->getAccountApi()->createPaymentMethod(
            $paymentMethod,
            self::USER,
            $this->account->getAccountId(),
            self::REASON,
            self::COMMENT,
            $default = 'true'
        );

        $this->account = $this->client->getAccountApi()->getAccount($this->account->getAccountId());
        $this->assertNotEmpty($this->account->getPaymentMethodId());
    }

    /**
     * Tear down test
     */
    public function tearDown(): void
    {
        parent::tearDown();

        unset($this->externalBundleId, $this->account);
    }

    /**
     * Test basic functionality
     */
    public function testBasic()
    {
        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Sports');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setBundleExternalKey($this->externalBundleId);

        $subscription = $this->client->getSubscriptionApi()->createSubscription($subscriptionData, self::USER, self::REASON, self::COMMENT);
        $this->assertEquals($subscription->getAccountId(), $subscriptionData->getAccountId());
        $this->assertEquals($subscription->getProductName(), $subscriptionData->getProductName());
        $this->assertEquals($subscription->getProductCategory(), $subscriptionData->getProductCategory());
        $this->assertEquals($subscription->getBillingPeriod(), $subscriptionData->getBillingPeriod());
        $this->assertEquals($subscription->getBundleExternalKey(), $subscriptionData->getBundleExternalKey());

        // Move by a few days -- still in trial -- and change product
        $this->clock->addDays(3);
        $subscription->setPlanName('super-monthly');
        $this->client->getSubscriptionApi()->changeSubscriptionPlan(
            $subscription,
            self::USER,
            $subscription->getSubscriptionId(),
            self::REASON,
            self::COMMENT
        );
        $subscriptionRes = $this->client->getSubscriptionApi()->getSubscription($subscription->getSubscriptionId());
        $this->assertEquals($subscriptionRes->getProductName(), 'Super');
        $subscription = $subscriptionRes;

        // Move by a few days -- still in trial -- and execute a cancellation
        $this->clock->addDays(3);
        $this->assertEmpty($subscription->getCancelledDate());
        $this->client->getSubscriptionApi()->cancelSubscriptionPlan(
            $subscription->getSubscriptionId(),
            self::USER
        );

        $subscriptionRes = $this->client->getSubscriptionApi()->getSubscription($subscription->getSubscriptionId());
        $this->assertNotEmpty($subscriptionRes->getCancelledDate());
    }

    /**
     * Test tags
     */
    public function testTags()
    {
        // Creating a subscription to make an bundle
        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Super');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setBundleExternalKey($this->externalBundleId);

        $subscription = $this->client->getSubscriptionApi()->createSubscription($subscriptionData, self::USER, self::REASON, self::COMMENT);

        $tag1 = new TagDefinition();
        $tag1->setName('stag1-'.$this->tenant->getExternalKey());
        $tag1->setDescription('This is super tag1');
        $tag1->setApplicableObjectTypes([TagDefinition::APPLICABLE_OBJECT_TYPES_SUBSCRIPTION]);
        $tag1 = $this->client->getTagDefinitionApi()->createTagDefinition($tag1, self::USER, self::REASON, self::COMMENT);


        //TODO: must be createSubscriptionTags([$tag1, $tag2], ...)
        $this->client->getSubscriptionApi()->createSubscriptionTags(
            json_encode([$tag1->getId()]),
            self::USER,
            $subscription->getSubscriptionId(),
            self::REASON,
            self::COMMENT
        );
        $tags = $this->client->getSubscriptionApi()->getSubscriptionTags($subscription->getSubscriptionId());
        $this->assertCount(1, $tags);
        $this->assertEquals($tags[0]->getTagDefinitionId(), $tag1->getId());


        //TODO: must be deleteSubscriptionTags(.., [$tag1->getId()], ...)
        $this->client->getSubscriptionApi()->deleteSubscriptionTags(
            $subscription->getSubscriptionId(),
            self::USER,
            implode(',', [$tag1->getId()]),
            self::REASON,
            self::COMMENT
        );
        $tags = $this->client->getSubscriptionApi()->getSubscriptionTags($subscription->getSubscriptionId());
        $this->assertCount(0, $tags);
    }

    /**
     * Test customfields
     */
    public function testCustomFields()
    {
        // Creating a subscription to make an bundle
        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Super');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setBundleExternalKey($this->externalBundleId);

        $subscription = $this->client->getSubscriptionApi()->createSubscription($subscriptionData, self::USER, self::REASON, self::COMMENT);

        /*
         * Create a custom field
         */
        $cf1 = new CustomField();
        $cf1->setObjectType(CustomField::OBJECT_TYPE_SUBSCRIPTION);
        $cf1->setName('cf1-'.$this->tenant->getExternalKey());
        $cf1->setValue('123456');

        $cf2 = new CustomField();
        $cf2->setObjectType(CustomField::OBJECT_TYPE_SUBSCRIPTION);
        $cf2->setName('cf2-'.$this->tenant->getExternalKey());
        $cf2->setValue('123456');

        //TODO: must be createSubscriptionCustomFields([$cf1, $cf2], ...)
        $customFieldsJson = '['.implode(',', [$cf1, $cf2]).']';
        $this->client->getSubscriptionApi()->createSubscriptionCustomFields($customFieldsJson, self::USER, $subscription->getSubscriptionId(), self::REASON, self::COMMENT);

        /*
         * Verify we can retrieve them
         */
        $cfs = $this->client->getSubscriptionApi()->getSubscriptionCustomFields($subscription->getSubscriptionId());

        $this->assertCount(2, $cfs);

        //TODO: Swagger didn't generate method getCustomField by name
        $cf = $cfs[0]->getName() === $cf1->getName() ? $cfs[0] : $cfs[1];
        $this->assertEquals($cf->getName(), $cf1->getName());
        $this->assertEquals($cf->getValue(), $cf1->getValue());
        $this->assertEquals($cf->getObjectType(), $cf1->getObjectType());
        $this->assertEquals($cf->getObjectId(), $subscription->getSubscriptionId());

        /*
         * Delete one of them
         */
        //TODO: must be deleteInvoiceCustomFields(..., [$cf->getCustomFieldId()])
        $this->client->getSubscriptionApi()->deleteSubscriptionCustomFields(
            $subscription->getSubscriptionId(),
            self::USER,
            "{$cf->getCustomFieldId()}",
            self::REASON,
            self::COMMENT
        );

        $cfs = $this->client->getSubscriptionApi()->getSubscriptionCustomFields($subscription->getSubscriptionId());
        $this->assertCount(1, $cfs);
        $this->assertEquals($cfs[0]->getName(), $cf2->getName());
    }

    /**
     * Test bundle with AO
     */
    public function testBundleWithAO()
    {
        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Super');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setBundleExternalKey($this->externalBundleId);

        $subscriptionBase = $this->client->getSubscriptionApi()->createSubscription($subscriptionData, self::USER, self::REASON, self::COMMENT);
        $this->assertEquals($subscriptionBase->getAccountId(), $subscriptionData->getAccountId());
        $this->assertEquals($subscriptionBase->getProductName(), $subscriptionData->getProductName());
        $this->assertEquals($subscriptionBase->getProductCategory(), $subscriptionData->getProductCategory());
        $this->assertEquals($subscriptionBase->getBillingPeriod(), $subscriptionData->getBillingPeriod());
        $this->assertEquals($subscriptionBase->getBundleExternalKey(), $this->externalBundleId);

        $this->clock->addDays(3);

        $subscriptionData2 = new Subscription();
        $subscriptionData2->setAccountId($this->account->getAccountId());
        $subscriptionData2->setProductName('RemoteControl');
        $subscriptionData2->setProductCategory('ADD_ON');
        $subscriptionData2->setBillingPeriod('MONTHLY');
        $subscriptionData2->setPriceList('DEFAULT');
        $subscriptionData2->setBundleExternalKey($this->externalBundleId);

        $subscriptionAO = $this->client->getSubscriptionApi()->createSubscription($subscriptionData2, self::USER, self::REASON, self::COMMENT);

        $this->assertEquals($subscriptionAO->getAccountId(), $this->account->getAccountId());
        $this->assertEquals($subscriptionAO->getProductName(), $subscriptionData2->getProductName());
        $this->assertEquals($subscriptionAO->getProductCategory(), $subscriptionData2->getProductCategory());
        $this->assertEquals($subscriptionAO->getBillingPeriod(), $subscriptionData2->getBillingPeriod());
        $this->assertEquals($subscriptionAO->getPriceList(), $subscriptionData2->getPriceList());
        $this->assertEquals($subscriptionAO->getBundleExternalKey(), $this->externalBundleId);
        $this->assertEquals($subscriptionAO->getBundleId(), $subscriptionBase->getBundleId());

        $bundle = $this->client->getBundleApi()->getBundle($subscriptionBase->getBundleId());
        $this->assertNotEmpty($bundle);
        $this->assertEquals($bundle->getAccountId(), $this->account->getAccountId());
        $this->assertEquals($bundle->getExternalKey(), $this->externalBundleId);
        $this->assertEquals(count($bundle->getSubscriptions()), 2);

        unset($bundle);
        $bundles = $this->client->getBundleApi()->getBundleByKey($this->externalBundleId);
        $this->assertEquals(count($bundles), 1);
        $bundle = $bundles[0];
        $this->assertNotEmpty($bundle);
        $this->assertEquals($bundle->getAccountId(), $this->account->getAccountId());
        $this->assertEquals($bundle->getExternalKey(), $this->externalBundleId);
        $this->assertCount(2, $bundle->getSubscriptions());
        $this->assertEquals($bundle->getSubscriptions()[0]->getProductCategory(), 'BASE');
        $this->assertEquals($bundle->getSubscriptions()[1]->getProductCategory(), 'ADD_ON');
    }

    /**
     * Test bundle with tags
     */
    public function testBundleWithTags()
    {
        // Creating a subscription to make an bundle
        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Super');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setBundleExternalKey($this->externalBundleId);

        $subscriptionBase = $this->client->getSubscriptionApi()->createSubscription($subscriptionData, self::USER, self::REASON, self::COMMENT);

        $bundle = $this->client->getBundleApi()->getBundle($subscriptionBase->getBundleId());

        $tag1 = new TagDefinition();
        $tag1->setName('stag1-'.$this->tenant->getExternalKey());
        $tag1->setDescription('This is super tag1');
        $tag1->setApplicableObjectTypes([TagDefinition::APPLICABLE_OBJECT_TYPES_BUNDLE]);
        $tag1 = $this->client->getTagDefinitionApi()->createTagDefinition($tag1, self::USER, self::REASON, self::COMMENT);

        //TODO: must be createBundleTags([$tag1, $tag2], ...)
        $bundleTags = $this->client->getBundleApi()->createBundleTags(
            json_encode([$tag1->getId()]),
            self::USER,
            $bundle->getBundleId(),
            self::REASON,
            self::COMMENT
        );
        $this->assertCount(1, $bundleTags);

        $bundleTags = $this->client->getBundleApi()->getBundleTags($bundle->getBundleId());
        $this->assertCount(1, $bundleTags);
        $this->assertEquals($bundleTags[0]->getTagDefinitionId(), $tag1->getId());

        $this->client->getBundleApi()->deleteBundleTags(
            $bundle->getBundleId(),
            self::USER,
            implode(',', [$tag1->getId()]),
            self::REASON,
            self::COMMENT
        );

        $bundleTags = $this->client->getBundleApi()->getBundleTags($bundle->getBundleId());
        $this->assertCount(0, $bundleTags);
    }

    /**
     * Test bundle with customfields
     */
    public function testBundleWithCustomFields()
    {
        // Creating a subscription to make an bundle
        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Super');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setBundleExternalKey($this->externalBundleId);

        $subscriptionBase = $this->client->getSubscriptionApi()->createSubscription($subscriptionData, self::USER, self::REASON, self::COMMENT);

        $bundle = $this->client->getBundleApi()->getBundle($subscriptionBase->getBundleId());

        /*
         * Create a custom field
         */
        $cf1 = new CustomField();
        $cf1->setObjectType(CustomField::OBJECT_TYPE_BUNDLE);
        $cf1->setName('cf1-'.$this->tenant->getExternalKey());
        $cf1->setValue('123456');

        $cf2 = new CustomField();
        $cf2->setObjectType(CustomField::OBJECT_TYPE_BUNDLE);
        $cf2->setName('cf2-'.$this->tenant->getExternalKey());
        $cf2->setValue('123456');

        //TODO: must be createInvoiceCustomFields([$cf1, $cf2], ...)
        $customFieldsJson = '['.implode(',', [$cf1, $cf2]).']';
        $cfs = $this->client->getBundleApi()->createBundleCustomFields($customFieldsJson, self::USER, $bundle->getBundleId(), self::REASON, self::COMMENT);
        $this->assertCount(2, $cfs);

        /*
         * Verify we can retrieve them
         */
        $cfs = $this->client->getBundleApi()->getBundleCustomFields($bundle->getBundleId());
        $this->assertCount(2, $cfs);

        //TODO: Swagger didn't generate method getCustomField by name
        $cf = $cfs[0]->getName() === $cf1->getName() ? $cfs[0] : $cfs[1];
        $this->assertEquals($cf->getName(), $cf1->getName());
        $this->assertEquals($cf->getValue(), $cf1->getValue());
        $this->assertEquals($cf->getObjectType(), $cf1->getObjectType());
        $this->assertEquals($cf->getObjectId(), $bundle->getBundleId());

        /*
         * Delete one of them
         */
        //TODO: must be deleteInvoiceCustomFields(..., [$cf->getCustomFieldId()])
        $this->client->getBundleApi()->deleteBundleCustomFields(
            $bundle->getBundleId(),
            self::USER,
            "{$cf->getCustomFieldId()}",
            self::REASON,
            self::COMMENT
        );

        $cfs = $this->client->getBundleApi()->getBundleCustomFields($bundle->getBundleId());
        $this->assertCount(1, $cfs);
        $this->assertEquals($cfs[0]->getName(), $cf2->getName());
    }
}
