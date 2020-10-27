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
 * Tests for ServerInvoice
 */
class ServerInvoiceTest extends KillbillTest
{
    /** @var Account|null */
    protected $account;
    /** @var string|null */
    private $externalBundleId;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->externalBundleId = uniqid();
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') == '1') {
            $this->externalBundleId = md5('serverInvoiceTest'.$this->tenant->getExternalKey());
        }
        $this->account = $this->client->getAccountApi()->createAccount($this->accountData, self::USER, self::REASON, self::COMMENT);

        $paymentMethod = new PaymentMethod();
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
     * Tear down the Test
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
        $subscriptionData->setBundleExternalKey($this->externalBundleId);
        $subscriptionData->setProductName('Sports');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');

        $subscription = $this->client->getSubscriptionApi()->createSubscription($subscriptionData, self::USER, self::REASON, self::COMMENT);
        $this->assertEquals($subscriptionData->getAccountId(), $subscription->getAccountId());
        $this->assertEquals($subscriptionData->getBundleExternalKey(), $subscription->getBundleExternalKey());

        $this->assertEquals('Sports', $subscription->getProductName());
        $this->assertEquals('BASE', $subscription->getProductCategory());
        $this->assertEquals('MONTHLY', $subscription->getBillingPeriod());
        $this->assertEquals('TRIAL', $subscription->getPhaseType());

        // Move clock after trials
        $this->clock->addDays(31);

        // Should see 2 invoices for account
        $invoices = $this->client->getAccountApi()->getInvoicesForAccount($this->account->getAccountId());
        $this->assertCount(2, $invoices);

        // Retrieve each invoice by id
        //TODO: must be $withItems = true (w/o quotes)
        $invoice = $this->client->getInvoiceApi()->getInvoice($invoices[0]->getInvoiceId(), $withItems = 'true');

        $this->assertNotEmpty($invoice);
        $this->assertNotEmpty($invoice->getAccountId());
        $this->assertNotEmpty($invoice->getInvoiceId());
        $this->assertNotEmpty($invoice->getCurrency());
        $this->assertEquals($invoice->getAmount(), 0);
        $this->assertEquals($invoice->getBalance(), 0);
        $this->assertCount(1, $invoice->getItems());
        $this->assertEquals(0, $invoice->getItems()[0]->getAmount());

        //TODO: must be $withItems = true (w/o quotes)
        $invoice = $this->client->getInvoiceApi()->getInvoice($invoices[1]->getInvoiceId(), $withItems = 'true');

        $this->assertNotEmpty($invoice);
        $this->assertNotEmpty($invoice->getAccountId());
        $this->assertNotEmpty($invoice->getInvoiceId());
        $this->assertNotEmpty($invoice->getCurrency());
        $this->assertEquals($invoice->getAmount(), 500);
        $this->assertEquals($invoice->getBalance(), 0);
        $this->assertNotEmpty($invoice->getItems());
        $this->assertCount(1, $invoice->getItems());
        $this->assertEquals(500, $invoice->getItems()[0]->getAmount());
    }

    /**
     * Test tags
     */
    public function testTags()
    {
        // Creating a subscription to make an invoice
        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Sports');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setBundleExternalKey($this->externalBundleId);

        $subscription = $this->client->getSubscriptionApi()->createSubscription($subscriptionData, self::USER, self::REASON, self::COMMENT);

        // Should see 2 invoices for account
        $invoices = $this->client->getAccountApi()->getInvoicesForAccount($this->account->getAccountId());
        $invoice = $invoices[0];

        /*
         * Create the tag definitions
         */
        $tag1 = new TagDefinition();
        $tag1->setName('tag1-'.$this->tenant->getExternalKey());
        $tag1->setDescription('This is tag1');
        $tag1->setApplicableObjectTypes([TagDefinition::APPLICABLE_OBJECT_TYPES_INVOICE]);
        $tag1 = $this->client->getTagDefinitionApi()->createTagDefinition($tag1, self::USER, self::REASON, self::COMMENT);

        $tag2 = new TagDefinition();
        $tag2->setName('tag2-'.$this->tenant->getExternalKey());
        $tag2->setDescription('This is tag2');
        $tag2->setApplicableObjectTypes([TagDefinition::APPLICABLE_OBJECT_TYPES_INVOICE]);
        $tag2 = $this->client->getTagDefinitionApi()->createTagDefinition($tag2, self::USER, self::REASON, self::COMMENT);

        /*
         * Add tags
         */
        //TODO: must be createInvoiceTags([$tag1, $tag2], ...)
        $invoiceTags = $this->client->getInvoiceApi()->createInvoiceTags(
            json_encode([$tag1->getId(), $tag2->getId()]),
            self::USER,
            $invoice->getInvoiceId(),
            self::REASON,
            self::COMMENT
        );
        $this->assertCount(2, $invoiceTags);

        /*
         * Verify we can retrieve them
         */
        $tags = $this->client->getInvoiceApi()->getInvoiceTags($invoice->getInvoiceId());
        $this->assertCount(2, $tags);
        if (strcmp($tags[0]->getTagDefinitionName(), $tag1->getName()) == 0) {
            $this->assertEquals($tags[0]->getTagDefinitionId(), $tag1->getId());
            $this->assertEquals($tags[1]->getTagDefinitionId(), $tag2->getId());
        } else {
            $this->assertEquals($tags[1]->getTagDefinitionId(), $tag1->getId());
            $this->assertEquals($tags[0]->getTagDefinitionId(), $tag2->getId());
        }

        /*
         * Delete one of them
         */
        //TODO: must be deleteInvoiceTags(.., [$tag1->getId()], ...)
        $this->client->getInvoiceApi()->deleteInvoiceTags(
            $invoice->getInvoiceId(),
            self::USER,
            implode(',', [$tag1->getId()]),
            self::REASON,
            self::COMMENT
        );
        $tags = $this->client->getInvoiceApi()->getInvoiceTags($invoice->getInvoiceId());
        $this->assertCount(1, $tags);
        $this->assertEquals($tags[0]->getTagDefinitionId(), $tag2->getId());
    }

    /**
     * Test customfields
     */
    public function testCustomFields()
    {
        // Creating a subscription to make an invoice
        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Sports');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setBundleExternalKey($this->externalBundleId);

        $subscription = $this->client->getSubscriptionApi()->createSubscription($subscriptionData, self::USER, self::REASON, self::COMMENT);

        $invoices = $this->client->getAccountApi()->getInvoicesForAccount($this->account->getAccountId());
        $invoice = $invoices[0];

        /*
         * Create a custom field
         */
        $cf1 = new CustomField();
        $cf1->setObjectType(CustomField::OBJECT_TYPE_INVOICE);
        $cf1->setName('cf1-'.$this->tenant->getExternalKey());
        $cf1->setValue('123456');

        $cf2 = new CustomField();
        $cf2->setObjectType(CustomField::OBJECT_TYPE_INVOICE);
        $cf2->setName('cf2-'.$this->tenant->getExternalKey());
        $cf2->setValue('123456');


        //TODO: must be createInvoiceCustomFields([$cf1, $cf2], ...)
        $customFieldsJson = '['.implode(',', [$cf1, $cf2]).']';
        $this->client->getInvoiceApi()->createInvoiceCustomFields($customFieldsJson, self::USER, $invoice->getInvoiceId(), self::REASON, self::COMMENT);

        /*
         * Verify we can retrieve them
         */
        $cfs = $this->client->getInvoiceApi()->getInvoiceCustomFields($invoice->getInvoiceId());
        $this->assertCount(2, $cfs);

        //TODO: Swagger didn't generate method getCustomField by name
        $cf = $cfs[0]->getName() === $cf1->getName() ? $cfs[0] : $cfs[1];
        $this->assertEquals($cf->getName(), $cf1->getName());
        $this->assertEquals($cf->getValue(), $cf1->getValue());
        $this->assertEquals($cf->getObjectType(), $cf1->getObjectType());
        $this->assertEquals($cf->getObjectId(), $invoice->getInvoiceId());

        /*
         * Delete one of them
         */
        //TODO: must be deleteInvoiceCustomFields(..., [$cf->getCustomFieldId()])
        $this->client->getInvoiceApi()->deleteInvoiceCustomFields(
            $invoice->getInvoiceId(),
            self::USER,
            "{$cf->getCustomFieldId()}",
            self::REASON,
            self::COMMENT
        );

        $cfs = $this->client->getInvoiceApi()->getInvoiceCustomFields($invoice->getInvoiceId());
        $this->assertCount(1, $cfs);
        $this->assertEquals($cfs[0]->getName(), $cf2->getName());

        /*
         * Simpler add method
         */
        //TODO: Swagger didn't generate method addCustomField
//        $invoice->addCustomField('cf3-'.$this->tenant->getExternalKey(), '123456', self::USER, self::REASON, self::COMMENT, $this->tenant->getTenantHeaders());
//        $cfs = $this->client->getInvoiceApi()->getInvoiceCustomFields($invoice->getInvoiceId());
//        $cfs = $invoice->getCustomFields($this->tenant->getTenantHeaders());
//        $this->assertEquals(2, count($cfs));
    }


    /**
     * @test
     */
    public function itShouldCreateInvoiceWhenSubscribedOnBasePlan()
    {
        $subscriptionBase = new Subscription();
        $subscriptionBase->setAccountId($this->account->getAccountId());
        $subscriptionBase->setPlanName('sports-monthly');
        $subscriptionBase = $this->client->getSubscriptionApi()->createSubscription($subscriptionBase, self::USER, self::REASON, self::COMMENT);
        self::assertSame($this->account->getAccountId(), $subscriptionBase->getAccountId());
        self::assertSame('sports-monthly', $subscriptionBase->getPlanName());

        $invoices = $this->client->getAccountApi()->getInvoicesForAccount($this->account->getAccountId());
        $this->assertCount(1, $invoices);
        $this->assertSame(0.0, $invoices[0]->getAmount());

        $this->clock->addDays(35);
        $this->clock->waitForExpectedClause(2, [$this, 'getAccountInvoicesNumber'], [$this->account->getAccountId()]);

        $invoicesNextMonth = $this->client->getAccountApi()->getInvoicesForAccount($this->account->getAccountId());
        $this->assertCount(2, $invoicesNextMonth);
        $this->assertSame(0.0, $invoicesNextMonth[0]->getAmount());
        $this->assertSame(500.0, $invoicesNextMonth[1]->getAmount());
    }

    /**
     * @test
     */
    public function itShouldCreateInvoiceWhenSubscribedOnBasePlanAndConsumableAddon()
    {
        $subscriptionBase = new Subscription();
        $subscriptionBase->setAccountId($this->account->getAccountId());
        $subscriptionBase->setPlanName('sports-monthly');
        $subscriptionBase = $this->client->getSubscriptionApi()->createSubscription($subscriptionBase, self::USER, self::REASON, self::COMMENT);
        self::assertSame($this->account->getAccountId(), $subscriptionBase->getAccountId());
        self::assertSame('sports-monthly', $subscriptionBase->getPlanName());

        $subscriptionGas = new Subscription();
        $subscriptionGas->setAccountId($this->account->getAccountId());
        $subscriptionGas->setPlanName('gas-monthly');
        $subscriptionGas->setBundleId($subscriptionBase->getBundleId());
        $subscriptionGas = $this->client->getSubscriptionApi()->createSubscription($subscriptionGas, self::USER, self::REASON, self::COMMENT);
        self::assertSame($this->account->getAccountId(), $subscriptionGas->getAccountId());
        self::assertSame('gas-monthly', $subscriptionGas->getPlanName());

        $invoices = $this->client->getAccountApi()->getInvoicesForAccount($this->account->getAccountId());
        $this->assertCount(1, $invoices);
        $this->assertSame(0.0, $invoices[0]->getAmount());

        $this->clock->addDays(35);

        $this->clock->waitForExpectedClause(2, [$this, 'getAccountInvoicesNumber'], [$this->account->getAccountId()]);

        $invoicesNextMonth = $this->client->getAccountApi()->getInvoicesForAccount($this->account->getAccountId());
        $this->assertCount(2, $invoicesNextMonth);
        $this->assertSame(0.0, $invoicesNextMonth[0]->getAmount());
        $this->assertSame(500.0, $invoicesNextMonth[1]->getAmount());
    }

    /**
     * @param string $accountId
     * @return int
     */
    public function getAccountInvoicesNumber($accountId)
    {
        return count($this->client->getAccountApi()->getInvoicesForAccount($accountId));
    }
}
