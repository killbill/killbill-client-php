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

require_once(dirname(__FILE__) . '/../KillbillTest.php');

class Killbill_AccountTest extends KillbillTest {

    function testCanDeserializeFromJson() {
        $response = new MockResponse('{"accountId":"46d14da1-6bec-41aa-b87d-89fc3acc7c5c","name":"b1bf3a2c-561b-4549-8048-7a62b3a7e549","externalKey":"2e2f86c9-0dcc-4b53-b257-92d6faf746f5",' .
                                     '"email":"a689afd0-e956-43c6-80bb-ce4acefa017b","billCycleDay":{"dayOfMonthLocal":6,"dayOfMonthUTC":6},' .
                                     '"currency":"25885684-1a79-46be-8fec-c40bb47dd15e","paymentMethodId":"31f39596-784b-45f0-90da-30b378454093","address1":"5a915612-bb43-4478-b142-f06883ea93e9",' .
                                     '"address2":"eb426334-708d-4560-af5c-b1fdcdd2e535","postalCode":"209364cc-ef4b-4157-ad1e-5775f9fcc02b","company":"6f41e4cc-7614-4749-90b2-413775e8270d",' .
                                     '"city":"b0869de1-6d94-42a3-9ee3-c9a2c69ae5f4","state":"518b913d-6611-426f-b589-662a19aefb14","country":"0259931f-04e8-45cb-8ea7-75b55ccd87d1",' .
                                     '"locale":"5e620381-9c16-42d9-afed-2a482ccf77cd","phone":"bb6a4c4e-c08e-4810-a264-43d040fb0982","isMigrated":true,"isNotifiedForInvoices":false,' .
                                     '"length":12,"timeZone":"640e3262-6d5b-47f5-adbf-64376a7f0334"}');

        $account = new Killbill_Account();
        $account = $account->_getFromBody($response);
        $this->assertEquals('46d14da1-6bec-41aa-b87d-89fc3acc7c5c', $account->accountId);
        $this->assertEquals('b1bf3a2c-561b-4549-8048-7a62b3a7e549', $account->name);
        $this->assertEquals('2e2f86c9-0dcc-4b53-b257-92d6faf746f5', $account->externalKey);
        $this->assertEquals('a689afd0-e956-43c6-80bb-ce4acefa017b', $account->email);
        $this->assertEquals('6', $account->billCycleDay->dayOfMonthLocal);
        $this->assertEquals('6', $account->billCycleDay->dayOfMonthUTC);
        $this->assertEquals('25885684-1a79-46be-8fec-c40bb47dd15e', $account->currency);
        $this->assertEquals('31f39596-784b-45f0-90da-30b378454093', $account->paymentMethodId);
        $this->assertEquals('5a915612-bb43-4478-b142-f06883ea93e9', $account->address1);
        $this->assertEquals('eb426334-708d-4560-af5c-b1fdcdd2e535', $account->address2);
        $this->assertEquals('209364cc-ef4b-4157-ad1e-5775f9fcc02b', $account->postalCode);
        $this->assertEquals('6f41e4cc-7614-4749-90b2-413775e8270d', $account->company);
        $this->assertEquals('b0869de1-6d94-42a3-9ee3-c9a2c69ae5f4', $account->city);
        $this->assertEquals('518b913d-6611-426f-b589-662a19aefb14', $account->state);
        $this->assertEquals('0259931f-04e8-45cb-8ea7-75b55ccd87d1', $account->country);
        $this->assertEquals('5e620381-9c16-42d9-afed-2a482ccf77cd', $account->locale);
        $this->assertEquals('bb6a4c4e-c08e-4810-a264-43d040fb0982', $account->phone);
        $this->assertTrue($account->isMigrated);
        $this->assertFalse($account->isNotifiedForInvoices);
        $this->assertEquals(12, $account->length);
        $this->assertEquals('640e3262-6d5b-47f5-adbf-64376a7f0334', $account->timeZone);
    }
}

