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

$externalAccountId = uniqid();

/*
 * Create the account
 */
$accountData = new Killbill_Account();
$accountData->name = "Killbill php test";
$accountData->externalKey = $externalAccountId;
$accountData->email = "test-" . $externalAccountId . "@kill-bill.org";
$accountData->currency = "USD";
$accountData->paymentMethodId = null;
$accountData->address1 = "12 rue des ecoles";
$accountData->address2 = "Poitier";
$accountData->company = "Renault";
$accountData->state = "Poitou";
$accountData->country = "France";
$accountData->phone = "81 53 26 56";
$accountData->length = 4;
$accountData->billCycleDay = 12;
$accountData->timeZone = "UTC";

$createdAccount = $accountData->create("pierre", "PHP_TEST", "Test for " . $externalAccountId);

/*
 * Verify we can retrieve it
 */
$account = new Killbill_Account();
$account->accountId = $createdAccount->accountId;
$account = $account->get();

/*
 * Update it
 */
$account->name = "My awesome new name";
$account = $account->update("pierre", "PHP_TEST", "Test for " . $externalAccountId);

/*
 * Create the tag definitions
 */
$tag1 = new Killbill_TagDefinition();
$tag1->name = uniqid();
$tag1->description = "This is tag1";
$tag1 = $tag1->create("pierre", "PHP_TEST", "Test for " . $externalAccountId);

$tag2 = new Killbill_TagDefinition();
$tag2->name = uniqid();
$tag2->description = "This is tag2";
$tag2 = $tag2->create("pierre", "PHP_TEST", "Test for " . $externalAccountId);

/*
 * Add tags
 */
$accountTags = $account->addTags(array($tag1->name, $tag2->name), "pierre", "PHP_TEST", "Test for " . $externalAccountId);

/*
 * Verify we can retrieve them
 */
$tags = $account->getTags();
