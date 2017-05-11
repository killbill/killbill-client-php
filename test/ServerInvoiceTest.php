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

/**
* Tests for ServerInvoice
*/
class ServerInvoiceTest extends KillbillTest
{
    /** @var Account|null */
    protected $account = null;
    /** @var string|null */
    private $externalBundleId = null;

    /**
    * Set up the test
    */
    public function setUp()
    {
        parent::setUp();

        $this->externalBundleId = uniqid();
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') == '1') {
            $this->externalBundleId = md5('serverInvoiceTest'.static::class.':'.$this->getName());
        }
        $this->account = $this->accountData->create(self::USER, self::REASON, self::COMMENT, $this->tenant->getTenantHeaders());

        $paymentMethod = new PaymentMethod();
        $paymentMethod->setAccountId($this->account->getAccountId());
        $paymentMethod->setIsDefault(true);
        $paymentMethod->setPluginName('__EXTERNAL_PAYMENT__');
        $paymentMethod->create(self::USER, self::REASON, self::COMMENT, $this->tenant->getTenantHeaders());

        $this->account = $this->account->get($this->tenant->getTenantHeaders());
        $this->assertNotEmpty($this->account->getPaymentMethodId());
    }

    /**
    * Tear down the Test
    */
    public function tearDown()
    {
        parent::tearDown();

        unset($this->externalBundleId);
        unset($this->account);
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
        $subscriptionData->setExternalKey($this->externalBundleId);

        $subscription = $subscriptionData->create(self::USER, self::REASON, self::COMMENT, $this->tenant->getTenantHeaders());
        $this->assertEquals($subscription->getAccountId(), $subscriptionData->getAccountId());
        $this->assertEquals($subscription->getProductName(), $subscriptionData->getProductName());
        $this->assertEquals($subscription->getProductCategory(), $subscriptionData->getProductCategory());
        $this->assertEquals($subscription->getBillingPeriod(), $subscriptionData->getBillingPeriod());
        $this->assertEquals($subscription->getExternalKey(), $subscriptionData->getExternalKey());

        // Move clock after trials
        $this->clock->addDays(31, $this->tenant->getTenantHeaders());

        // Should see 2 invoices for account
        $invoices = $this->account->getInvoices(true, null, $this->tenant->getTenantHeaders());
        $this->assertEquals(2, count($invoices));

        // Retrieve each invoice by id
        $invoice = new Invoice();
        $invoice->setInvoiceId($invoices[0]->getInvoiceId());
        $invoice = $invoice->get(false, $this->tenant->getTenantHeaders());
        $this->assertNotEmpty($invoice);
        $this->assertNotEmpty($invoice->getAccountId());
        $this->assertNotEmpty($invoice->getInvoiceId());
        $this->assertNotEmpty($invoice->getCurrency());
        $this->assertEquals($invoice->getAmount(), 0);
        $this->assertEquals($invoice->getBalance(), 0);
        $this->assertEmpty($invoice->getItems());

        $invoice = new Invoice();
        $invoice->setInvoiceId($invoices[1]->getInvoiceId());
        $invoice = $invoice->get(true, $this->tenant->getTenantHeaders());
        $this->assertNotEmpty($invoice);
        $this->assertNotEmpty($invoice->getAccountId());
        $this->assertNotEmpty($invoice->getInvoiceId());
        $this->assertNotEmpty($invoice->getCurrency());
        $this->assertEquals($invoice->getAmount(), 500);
        $this->assertEquals($invoice->getBalance(), 0);
        $this->assertNotEmpty($invoice->getItems());
        $this->assertEquals(1, count($invoice->getItems()));
    }
}
