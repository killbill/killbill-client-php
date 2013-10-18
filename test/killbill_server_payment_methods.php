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

class Killbill_Server_PaymentMethodTest extends KillbillTest
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

        $paymentMethod = new Killbill_PaymentMethod();
        $paymentMethod->accountId = $this->account->accountId;
        $paymentMethod->isDefault = true;
        $paymentMethod->pluginName = '__EXTERNAL_PAYMENT__';
        $paymentMethod->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $this->account = $this->account->get($this->tenant->getTenantHeaders());
        $this->assertNotEmpty($this->account->paymentMethodId);


        $paymentMethods = $this->account->getPaymentMethods($this->tenant->getTenantHeaders());
        $this->assertNotEmpty($paymentMethods);
        $this->assertEquals(count($paymentMethods), 1);
        $this->assertEquals($paymentMethods[0]->accountId, $this->account->accountId);
        $this->assertEquals($paymentMethods[0]->isDefault, true);
        $this->assertEquals($paymentMethods[0]->pluginName, '__EXTERNAL_PAYMENT__');
    }
}