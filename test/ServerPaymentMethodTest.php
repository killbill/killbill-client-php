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
use Killbill\Client\Swagger\Model\PaymentMethod;

/**
 * Tests for ServerPaymentMethod
 */
class ServerPaymentMethodTest extends KillbillTest
{
    /** @var Account|null */
    protected $account = null;
    /** @var string|null */
    private $externalBundleId = null;

    /**
     * Set up test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->externalBundleId = uniqid();
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') == '1') {
            $this->externalBundleId = md5('serverPaymentMethodTest'.$this->tenant->getExternalKey());
        }
        $this->account = $this->client->getAccountApi()->createAccount($this->accountData, self::USER, self::REASON, self::COMMENT);
    }

    /**
     * Tear down test
     */
    public function tearDown(): void
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
        $paymentMethod = new PaymentMethod();
//        $paymentMethod->setAccountId($this->account->getAccountId());
//        $paymentMethod->setIsDefault('true');
        $paymentMethod->setPluginName('__EXTERNAL_PAYMENT__');

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

        $paymentMethods = $this->client->getAccountApi()->getPaymentMethodsForAccount($this->account->getAccountId());
        $this->assertNotEmpty($paymentMethods);
        $this->assertEquals(count($paymentMethods), 1);
        $this->assertEquals($paymentMethods[0]->getAccountId(), $this->account->getAccountId());
        $this->assertEquals($paymentMethods[0]->getIsDefault(), true);
        $this->assertEquals($paymentMethods[0]->getPluginName(), '__EXTERNAL_PAYMENT__');
    }
}
