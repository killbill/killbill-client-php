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
require_once(dirname(__FILE__) . '/killbill_server_clock_mock.php');

class KillbillTest extends PHPUnit_Framework_TestCase
{

    protected $user = 'phpTester';
    protected $reason = 'test';
    protected $comment = 'no comment';

    public function setUp()
    {
        $tenant = new Killbill_Tenant();
        $tenant->externalKey = uniqid();
        $tenant->apiKey = 'test-php-api-key-' . $tenant->externalKey;
        $tenant->apiSecret = 'test-php-api-secret-' . $tenant->externalKey;
        $this->tenant = $tenant->create($this->user, $this->reason, $this->comment);
        $this->tenant->apiSecret = $tenant->apiSecret;

        $this->clock = new killbill_ServerClockMock();
        // Reset clock to now
        $this->clock->setClock(null, $this->tenant->getTenantHeaders());

        $this->externalAccountId = uniqid();
        $this->accountData = new Killbill_Account();
        $this->accountData->name = "Killbill php test";
        $this->accountData->externalKey = $this->externalAccountId;
        $this->accountData->email = "test-" . $this->externalAccountId . "@kill-bill.org";
        $this->accountData->currency = "USD";
        $this->accountData->paymentMethodId = null;
        $this->accountData->address1 = "12 rue des ecoles";
        $this->accountData->address2 = "Poitier";
        $this->accountData->company = "Renault";
        $this->accountData->state = "Poitou";
        $this->accountData->country = "France";
        $this->accountData->phone = "81 53 26 56";
        $this->accountData->length = 4;
        $this->accountData->billCycleDay = 12;
        $this->accountData->timeZone = "UTC";
    }

    public function tearDown()
    {
        unset($this->externalAccountId);
        unset($this->accountData);
        unset($this->tenant);
        unset($this->clock);
    }

    public function testDummyToAvoidWarning()
    {
        $this->assertTrue(true);
    }
}