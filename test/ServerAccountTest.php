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

class ServerAccountTest extends KillbillTest
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

        $this->assertEquals($this->accountData->getName(), $createdAccount->getName());
        $this->assertEquals($this->accountData->getExternalKey(), $createdAccount->getExternalKey());
        $this->assertEquals($this->accountData->getEmail(), $createdAccount->getEmail());
        $this->assertEquals($this->accountData->getCurrency(), $createdAccount->getCurrency());
        $this->assertEquals($this->accountData->getAddress1(), $createdAccount->getAddress1());
        $this->assertEquals($this->accountData->getAddress2(), $createdAccount->getAddress2());
        $this->assertEquals($this->accountData->getCompany(), $createdAccount->getCompany());
        $this->assertEquals($this->accountData->getState(), $createdAccount->getState());
        $this->assertEquals($this->accountData->getCountry(), $createdAccount->getCountry());
        $this->assertEquals($this->accountData->getPhone(), $createdAccount->getPhone());
        $this->assertEquals($this->accountData->getFirstNameLength(), $createdAccount->getFirstNameLength());
        $this->assertEquals($this->accountData->getBillCycleDayLocal(), $createdAccount->getBillCycleDayLocal());
        $this->assertEquals($this->accountData->getTimeZone(), $createdAccount->getTimeZone());

        /*
         * Verify we can retrieve it
         */
        $account = new Account();
        $account->setAccountId($createdAccount->getAccountId());
        $account = $account->get($this->tenant->getTenantHeaders());

        /*
         * Update it
         */
        $account->setName("My awesome new name");
        $updatedAccount = $account->update($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals("My awesome new name", $updatedAccount->getName());
    }

    function testOverdueState() {

        $account = $this->accountData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $state = $account->getOverdueState($this->tenant->getTenantHeaders());
        $this->assertEquals($state->getName(), '__KILLBILL__CLEAR__OVERDUE_STATE__');
    }

    function testTags()
    {
        $account = $this->accountData->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        /*
         * Create the tag definitions
        */
        $tag1 = new TagDefinition();
        $tag1->setName(uniqid());
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') == '1') {
            $tag1->setName(md5('tag1' . static::class . ':' . $this->getName()));
        }
        $tag1->setDescription('This is tag1');
        $tag1 = $tag1->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        $tag2 = new TagDefinition();
        $tag2->setName(uniqid());
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') == '1') {
            $tag2->setName(md5('tag2' . static::class . ':' . $this->getName()));
        }
        $tag2->setDescription('This is tag2');
        $tag2 = $tag2->create($this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());

        /*
         * Add tags
         */
        $accountTags = $account->addTags(array($tag1->getId(), $tag2->getId()), $this->user, $this->reason, $this->comment, $this->tenant->getTenantHeaders());
        $this->assertEquals(2, count($accountTags));

        /*
         * Verify we can retrieve them
         */
        $tags = $account->getTags($this->tenant->getTenantHeaders());
        $this->assertEquals(2, count($tags));
        if (strcmp($tags[0]->getTagDefinitionName(), $tag1->getName()) == 0) {
            $this->assertEquals($tags[0]->getTagDefinitionId(), $tag1->getId());
            $this->assertEquals($tags[1]->getTagDefinitionId(), $tag2->getId());
        } else {
            $this->assertEquals($tags[1]->getTagDefinitionId(), $tag1->getId());
            $this->assertEquals($tags[0]->getTagDefinitionId(), $tag2->getId());
        }
    }
}
