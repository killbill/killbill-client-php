<?php
/*
 * Copyright 2010-2014 Ning, Inc.
 * Copyright 2014-2020 Groupon, Inc
 * Copyright 2020-2022 Equinix, Inc
 * Copyright 2014-2022 The Billing Project, LLC
 *
 * The Billing Project licenses this file to you under the Apache License, version 2.0
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

use Killbill\Client\Swagger\Model\CustomField;
use Killbill\Client\Swagger\Model\TagDefinition;

/**
 * Test class for ServerAccount
 */
class ServerAccountTest extends KillbillTest
{
    /**
     * Test the basic API
     */
    public function testBasicApi()
    {
        $createdAccount = $this->client->getAccountApi()->createAccount($this->accountData, self::USER, self::REASON, self::COMMENT);

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
        $account = $this->client->getAccountApi()->getAccount($createdAccount->getAccountId());

        /*
         * Update it
         */
        $account->setName('My awesome new name');
        $this->client->getAccountApi()->updateAccount($account, self::USER, $account->getAccountId(), self::REASON, self::COMMENT);
        $updatedAccount = $this->client->getAccountApi()->getAccount($account->getAccountId());

        $this->assertEquals('My awesome new name', $updatedAccount->getName());
    }

    /**
     * Test the overdue state
     */
    public function testOverdueState()
    {
        $account = $this->client->getAccountApi()->createAccount($this->accountData, self::USER, self::REASON, self::COMMENT);

        $state = $this->client->getAccountApi()->getOverdueAccount($account->getAccountId());
        $this->assertEquals($state->getName(), '__KILLBILL__CLEAR__OVERDUE_STATE__');
    }

    /**
     * Test tags
     */
    public function testTags()
    {
        $account = $this->client->getAccountApi()->createAccount($this->accountData, self::USER, self::REASON, self::COMMENT);

        /*
         * Create the tag definitions
         */
        $tag1 = new TagDefinition();
        $tag1->setName('tag1-'.$this->tenant->getExternalKey());
        $tag1->setDescription('This is tag1');
        $tag1->setApplicableObjectTypes([TagDefinition::APPLICABLE_OBJECT_TYPES_ACCOUNT]);
        $tag1 = $this->client->getTagDefinitionApi()->createTagDefinition($tag1, self::USER, self::REASON, self::COMMENT);

        $tag2 = new TagDefinition();
        $tag2->setName('tag2-'.$this->tenant->getExternalKey());
        $tag2->setDescription('This is tag2');
        $tag2->setApplicableObjectTypes([TagDefinition::APPLICABLE_OBJECT_TYPES_ACCOUNT]);
        $tag2 = $this->client->getTagDefinitionApi()->createTagDefinition($tag2, self::USER, self::REASON, self::COMMENT);

        /*
         * Add tags
         */
        //TODO: must be createAccountTags([$tag1, $tag2], ...)
        $accountTags = $this->client->getAccountApi()->createAccountTags(
            json_encode([$tag1->getId(), $tag2->getId()]),
            self::USER,
            $account->getAccountId(),
            self::REASON,
            self::COMMENT
        );
        $this->assertCount(2, $accountTags);

        /*
         * Verify we can retrieve them
         */
        $tags = $this->client->getAccountApi()->getAccountTags($account->getAccountId());
        $this->assertEquals(2, count($tags));
        if (strcmp($tags[0]->getTagDefinitionName(), $tag1->getName()) === 0) {
            $this->assertEquals($tags[0]->getTagDefinitionId(), $tag1->getId());
            $this->assertEquals($tags[1]->getTagDefinitionId(), $tag2->getId());
        } else {
            $this->assertEquals($tags[1]->getTagDefinitionId(), $tag1->getId());
            $this->assertEquals($tags[0]->getTagDefinitionId(), $tag2->getId());
        }

        /*
         * Delete one of them
         */
        //TODO: must be deleteAccountTags([$tag1->getId()], ...)
        $this->client->getAccountApi()->deleteAccountTags(
            $account->getAccountId(),
            self::USER,
            implode(',', [$tag1->getId()]),
            self::REASON,
            self::COMMENT
        );
        $tags = $this->client->getAccountApi()->getAccountTags($account->getAccountId());
        $this->assertCount(1, $tags);
        $this->assertEquals($tags[0]->getTagDefinitionId(), $tag2->getId());
    }

    /**
     * Test customfields
     */
    public function testCustomFields()
    {
        $account = $this->client->getAccountApi()->createAccount($this->accountData, self::USER, self::REASON, self::COMMENT);

        /*
         * Create a custom field
         */
        $cf1 = new CustomField();
        $cf1->setObjectType(CustomField::OBJECT_TYPE_ACCOUNT);
        $cf1->setName('cf1-'.$this->tenant->getExternalKey());
        $cf1->setValue('123456');

        $cf2 = new CustomField();
        $cf2->setObjectType(CustomField::OBJECT_TYPE_ACCOUNT);
        $cf2->setName('cf2-'.$this->tenant->getExternalKey());
        $cf2->setValue('123456');


        //TODO: must be createAccountCustomFields([$cf1, $cf2], ...)
        $customFieldsJson = '['.implode(',', [$cf1, $cf2]).']';
        $this->client->getAccountApi()->createAccountCustomFields($customFieldsJson, self::USER, $account->getAccountId(), self::REASON, self::COMMENT);

        /*
         * Verify we can retrieve them
         */
        $cfs = $this->client->getAccountApi()->getAccountCustomFields($account->getAccountId());
        $this->assertCount(2, $cfs);

        //TODO: endpoint custom field by name?
        $cf = $cfs[0]->getName() === $cf1->getName() ? $cfs[0] : $cfs[1];
        $this->assertEquals($cf->getName(), $cf1->getName());
        $this->assertEquals($cf->getValue(), $cf1->getValue());
        $this->assertEquals($cf->getObjectType(), $cf1->getObjectType());
        $this->assertEquals($cf->getObjectId(), $account->getAccountId());

        /*
         * Delete one of them
         */
        //TODO: must be deleteAccountCustomFields(..., [$cf->getCustomFieldId()])
        $this->client->getAccountApi()->deleteAccountCustomFields(
            $account->getAccountId(),
            self::USER,
            "{$cf->getCustomFieldId()}",
            self::REASON,
            self::COMMENT
        );

        $cfs = $this->client->getAccountApi()->getAccountCustomFields($account->getAccountId());
        $this->assertCount(1, $cfs);
        $this->assertEquals($cfs[0]->getName(), $cf2->getName());
    }
}
