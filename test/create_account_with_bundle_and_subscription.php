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
$externalBundleId = uniqid();

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

$account = $accountData->create("pierre", "PHP_TEST", "Test for " . $externalAccountId);

/*
 * Create a bundle associated to it
 */
$bundleData = new Killbill_Bundle();
$bundleData->accountId = $account->accountId;
$bundleData->externalKey = $externalBundleId;

$bundle = $bundleData->create("pierre", "PHP_TEST", "Test for " . $externalBundleId);

/*
 * Retrieve bundles for this account
 */
$bundles = $account->getBundles();

/*
 * Retrieve the bundle by bundleId
 */
$bundleById = $bundle->get();

/*
 * Retrieve the bundle by externalKey
 */
$bundleByKey = $bundle->get();

/*
 * Create a subscription for this bundle
 */
$subscriptionData = new Killbill_Subscription();
$subscriptionData->bundleId = $bundle->bundleId;
$subscriptionData->startDate = "2012-04-25T00:05:58.000Z";
$subscriptionData->productName = "Mini";
$subscriptionData->productCategory = "BASE";
$subscriptionData->billingPeriod = "MONTHLY";
$subscriptionData->priceList = "DEFAULT";
$subscriptionData->chargedThroughDate = "2012-05-25T00:05:58.000Z";

$subscription = $subscriptionData->create("pierre", "PHP_TEST", "Test for " . $externalBundleId);

/*
 * Update the subscription
 */
$subscription->productName = "Plus";
$subscription = $subscription->update("pierre", "PHP_TEST", "Test for " . $externalBundleId);

/*
 * Retrieve subscriptions by bundle
 */
$bundleSubscriptions = $bundle->getSubscriptions();

/*
 * Retrieve invoices for this account
 */
$invoiceData = new Killbill_Invoice();
$invoices = $invoiceData->getForAccount($account->accountId);

/*
 * Cancel the subscription
 */
$subscription->cancel("pierre", "PHP_TEST", "Test for " . $externalBundleId);

/*
 * Uncancel it
 */
$subscription->reinstate("pierre", "PHP_TEST", "Test for " . $externalBundleId);
