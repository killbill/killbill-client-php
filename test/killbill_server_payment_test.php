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

class Killbill_Server_PaymentTest extends KillbillTest
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

    function testBasic()
    {
        # Add AUTO_PAY_OFF to account to end up with unpaid invoices
        $this->account->addTags(array('00000000-0000-0000-0000-000000000001'), $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

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

        # Move after trial
        $this->clock->addDays(31, $this->tenant->getTenantHeaders());

        $unpaidInvoices = $this->account->getInvoices(true, true, $this->tenant->getTenantHeaders());
        $this->assertEquals(count($unpaidInvoices), 1);

        # Remove the tag
        $this->account->deleteTags(array('00000000-0000-0000-0000-000000000001'), $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        # processing unpaid invoices is asynchronous (bus event), so let's wait a bit before we check
        usleep(3000000);
        $unpaidInvoices = $this->account->getInvoices(true, true, $this->tenant->getTenantHeaders());
        $this->assertEmpty($unpaidInvoices);

        $allInvoices = $this->account->getInvoices(true, null, $this->tenant->getTenantHeaders());
        $this->assertEquals(count($allInvoices), 2);
    }
}