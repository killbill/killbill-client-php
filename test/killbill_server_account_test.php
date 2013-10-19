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

class Killbill_Server_AccountTest extends KillbillTest
{

    function setUp()
    {
        parent::setUp();
    }

    function tearDown()
    {
        parent::tearDown();
    }

    function testBasicApi()
    {

        $createdAccount = $this->accountData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $this->assertEquals($this->accountData->name, $createdAccount->name);
        $this->assertEquals($this->accountData->externalKey, $createdAccount->externalKey);
        $this->assertEquals($this->accountData->email, $createdAccount->email);
        $this->assertEquals($this->accountData->currency, $createdAccount->currency);
        $this->assertEquals($this->accountData->address1, $createdAccount->address1);
        $this->assertEquals($this->accountData->address2, $createdAccount->address2);
        $this->assertEquals($this->accountData->company, $createdAccount->company);
        $this->assertEquals($this->accountData->state, $createdAccount->state);
        $this->assertEquals($this->accountData->country, $createdAccount->country);
        $this->assertEquals($this->accountData->phone, $createdAccount->phone);
        $this->assertEquals($this->accountData->country, $createdAccount->country);
        $this->assertEquals($this->accountData->length, $createdAccount->length);
        $this->assertEquals($this->accountData->billCycleDay, $createdAccount->billCycleDay);
        $this->assertEquals($this->accountData->timeZone, $createdAccount->timeZone);

        /*
         * Verify we can retrieve it
         */
        $account = new Killbill_Account();
        $account->accountId = $createdAccount->accountId;
        $account = $account->get($this->tenant->getTenantHeaders());

        /*
         * Update it
         */
        $account->name = "My awesome new name";
        $updatedAccount = $account->update($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals("My awesome new name", $updatedAccount->name);
    }

    function testOverdueState() {

        $account = $this->accountData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $state = $account->getOverdueState($this->tenant->getTenantHeaders());
        $this->assertEquals($state->name, '__KILLBILL__CLEAR__OVERDUE_STATE__');
    }

    function testTags()
    {
        $account = $this->accountData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        /*
         * Create the tag definitions
        */
        $tag1 = new Killbill_TagDefinition();
        $tag1->name = uniqid();
        $tag1->description = "This is tag1";
        $tag1 = $tag1->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $tag2 = new Killbill_TagDefinition();
        $tag2->name = uniqid();
        $tag2->description = "This is tag2";
        $tag2 = $tag2->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        /*
         * Add tags
         */
        $accountTags = $account->addTags(array($tag1->id, $tag2->id), $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals(2, count($accountTags));

        /*
         * Verify we can retrieve them
         */
        $tags = $account->getTags($this->tenant->getTenantHeaders());
        $this->assertEquals(2, count($tags));
        if (strcmp($tags[0]->tagDefinitionName, $tag1->name) == 0) {
            $this->assertEquals($tags[0]->tagDefinitionId, $tag1->id);
            $this->assertEquals($tags[1]->tagDefinitionId, $tag2->id);
        } else {
            $this->assertEquals($tags[1]->tagDefinitionId, $tag1->id);
            $this->assertEquals($tags[0]->tagDefinitionId, $tag2->id);
        }
    }
}