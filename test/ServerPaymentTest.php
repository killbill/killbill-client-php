<?php

/*
 * Copyright 2011-2017 Ning, Inc.
 * Copyright 2014 Groupon, Inc.
 * Copyright 2014 The Billing Project, LLC
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

use Killbill\Client\Swagger\Model\Account;
use Killbill\Client\Swagger\Model\ComboPaymentTransaction;
use Killbill\Client\Swagger\Model\CustomField;
use Killbill\Client\Swagger\Model\Payment;
use Killbill\Client\Swagger\Model\PaymentMethod;
use Killbill\Client\Swagger\Model\PaymentTransaction;
use Killbill\Client\Swagger\Model\Subscription;
use Killbill\Client\Swagger\Model\TagDefinition;

/**
 * Tests for ServerPayment
 */
class ServerPaymentTest extends KillbillTest
{
    /** @var Account|null */
    protected $account;
    /** @var string|null */
    private $externalBundleId;
    /** @var PaymentMethod|null */
    private $paymentMethod;

    /**
     * Set up test
     */
    public function setUp()
    {
        parent::setUp();

        $this->externalBundleId = uniqid();
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') === '1') {
            $this->externalBundleId = md5('serverPaymentTest'.$this->tenant->getExternalKey());
        }
        $this->account = $this->client->getAccountApi()->createAccount($this->accountData, self::USER, self::REASON, self::COMMENT);

        $paymentMethod = new PaymentMethod();
        $paymentMethod->setPluginName('__EXTERNAL_PAYMENT__');
        //TODO: $default = 'true' must be without quotes
        $this->paymentMethod = $this->client->getAccountApi()->createPaymentMethod(
            $paymentMethod,
            self::USER,
            $this->account->getAccountId(),
            self::REASON,
            self::COMMENT,
            $default = 'true'
        );

        $this->account = $this->client->getAccountApi()->getAccount($this->account->getAccountId());
        $this->assertNotEmpty($this->account->getPaymentMethodId());
    }

    /**
     * Tear down test
     */
    public function tearDown()
    {
        parent::tearDown();
        unset($this->externalBundleId, $this->account);
    }

    /**
     * Test basic functionality
     */
    public function testBasic()
    {
        // Add AUTO_PAY_OFF to account to end up with unpaid invoices
        $tagId = '00000000-0000-0000-0000-000000000001';
        //TODO: must be createAccountTags([$tag1, $tag2], ...)
        $accountTags = $this->client->getAccountApi()->createAccountTags(
            json_encode([$tagId]),
            self::USER,
            $this->account->getAccountId(),
            self::REASON,
            self::COMMENT
        );

        $subscriptionData = new Subscription();
        $subscriptionData->setAccountId($this->account->getAccountId());
        $subscriptionData->setProductName('Sports');
        $subscriptionData->setProductCategory('BASE');
        $subscriptionData->setBillingPeriod('MONTHLY');
        $subscriptionData->setPriceList('DEFAULT');
        $subscriptionData->setBundleExternalKey($this->externalBundleId);

        $subscription = $this->client->getSubscriptionApi()->createSubscription($subscriptionData, self::USER, self::REASON, self::COMMENT);
        $this->assertEquals($subscription->getAccountId(), $subscriptionData->getAccountId());
        $this->assertEquals($subscription->getProductName(), $subscriptionData->getProductName());
        $this->assertEquals($subscription->getProductCategory(), $subscriptionData->getProductCategory());
        $this->assertEquals($subscription->getBillingPeriod(), $subscriptionData->getBillingPeriod());
        $this->assertEquals($subscription->getBundleExternalKey(), $subscriptionData->getBundleExternalKey());

        // Move after trial
        $this->clock->addDays(31);

        //TODO: 'true' must be w/o quotes
        $unpaidInvoices = $this->client->getAccountApi()->getInvoicesForAccount(
            $this->account->getAccountId(),
            null,
            null,
            null,
            $unpaidOnly = 'true'
        );
        $this->assertCount(1, $unpaidInvoices);

        // Remove the tag
        //TODO: must be deleteAccountTags([$tag1->getId()], ...)
        $this->client->getAccountApi()->deleteAccountTags(
            $this->account->getAccountId(),
            self::USER,
            implode(',', [$tagId]),
            self::REASON,
            self::COMMENT
        );

        // processing unpaid invoices is asynchronous (bus event), so let's wait a bit before we check
        usleep(3000000);

        //TODO: 'true' must be w/o quotes
        $unpaidInvoices = $this->client->getAccountApi()->getInvoicesForAccount(
            $this->account->getAccountId(),
            null,
            null,
            null,
            $unpaidOnly = 'true'
        );
        $this->assertEmpty($unpaidInvoices);

        //TODO: 'true' must be w/o quotes
        $allInvoices = $this->client->getAccountApi()->getInvoicesForAccount($this->account->getAccountId());
        $this->assertCount(2, $allInvoices);
    }

    /**
     * Test auth capture refund
     */
    public function testAuthCaptureRefund()
    {
        //captureAuthorization
        $paymentData = new PaymentTransaction();
        $paymentData->setTransactionType(PaymentTransaction::TRANSACTION_TYPE_AUTHORIZE);
        $paymentData->setAmount(10);
        $paymentData->setCurrency('USD');
        $comboPaymentTransaction = new ComboPaymentTransaction();
        $comboPaymentTransaction->setAccount($this->account);
        $comboPaymentTransaction->setTransaction($paymentData);
        $comboPaymentTransaction->setPaymentMethod($this->paymentMethod);
        $payment = $this->client->getPaymentApi()->createComboPayment($comboPaymentTransaction, self::USER, self::REASON, self::COMMENT);
        $this->verifyPaymentAndTransaction($payment, 10, 1, 10, 0, 0, 0, 0);

        // Populate the paymentId, required below
        $paymentData->setPaymentId($payment->getPaymentId());

        // Partial capture 1
        $paymentData->setAmount(2);
        $payment = $this->client->getPaymentApi()->captureAuthorization($paymentData, self::USER, $paymentData->getPaymentId(), self::REASON, self::COMMENT);
        $this->verifyPaymentAndTransaction($payment, 2, 2, 10, 2, 0, 0, 0);

        // Partial capture 2
        $paymentData->setAmount(3);
        $payment = $this->client->getPaymentApi()->captureAuthorization($paymentData, self::USER, $paymentData->getPaymentId(), self::REASON, self::COMMENT);
        $this->verifyPaymentAndTransaction($payment, 3, 3, 10, 5, 0, 0, 0);

        // Partial refund
        $paymentData->setAmount(4);
        $payment = $this->client->getPaymentApi()->refundPayment($paymentData, self::USER, $paymentData->getPaymentId(), self::REASON, self::COMMENT);
        $this->verifyPaymentAndTransaction($payment, 4, 4, 10, 5, 0, 4, 0);
    }

    /**
     * Test auth void
     */
    public function testAuthVoid()
    {
        //captureAuthorization
        $paymentData = new PaymentTransaction();
        $paymentData->setTransactionType(PaymentTransaction::TRANSACTION_TYPE_AUTHORIZE);
        $paymentData->setAmount(10);
        $paymentData->setCurrency('USD');
        $comboPaymentTransaction = new ComboPaymentTransaction();
        $comboPaymentTransaction->setAccount($this->account);
        $comboPaymentTransaction->setTransaction($paymentData);
        $comboPaymentTransaction->setPaymentMethod($this->paymentMethod);
        $payment = $this->client->getPaymentApi()->createComboPayment($comboPaymentTransaction, self::USER, self::REASON, self::COMMENT);

        // Populate the paymentId, required below
        $paymentData->setPaymentId($payment->getPaymentId());

        $this->verifyPaymentAndTransaction($payment, 10, 1, 10, 0, 0, 0, 0);

        // Populate the paymentId, required below
        $paymentData->setPaymentId($payment->getPaymentId());

        // Void
        $this->client->getPaymentApi()->voidPayment($paymentData, self::USER, $paymentData->getPaymentId(), self::REASON, self::COMMENT);
        $payment = $this->client->getPaymentApi()->getPayment($paymentData->getPaymentId());
        $this->verifyPaymentAndTransaction($payment, 0, 2, 0, 0, 0, 0, 0);
    }

    /**
     * Test purchase credit
     */
    public function testPurchaseCredit()
    {
        //createPurchase
        $paymentData = new PaymentTransaction();
        $paymentData->setTransactionType(PaymentTransaction::TRANSACTION_TYPE_PURCHASE);
        $paymentData->setAmount(10);
        $paymentData->setCurrency('USD');
        $comboPaymentTransaction = new ComboPaymentTransaction();
        $comboPaymentTransaction->setAccount($this->account);
        $comboPaymentTransaction->setTransaction($paymentData);
        $comboPaymentTransaction->setPaymentMethod($this->paymentMethod);
        $payment = $this->client->getPaymentApi()->createComboPayment($comboPaymentTransaction, self::USER, self::REASON, self::COMMENT);

        $this->verifyPaymentAndTransaction($payment, 10, 1, 0, 0, 10, 0, 0);

        //createCredit
        $paymentData->setTransactionType(PaymentTransaction::TRANSACTION_TYPE_CREDIT);
        $paymentData->setAmount(12);
        $comboPaymentTransaction = new ComboPaymentTransaction();
        $comboPaymentTransaction->setAccount($this->account);
        $comboPaymentTransaction->setTransaction($paymentData);
        $comboPaymentTransaction->setPaymentMethod($this->paymentMethod);
        $payment = $this->client->getPaymentApi()->createComboPayment($comboPaymentTransaction, self::USER, self::REASON, self::COMMENT);
        // A credit is a different payment
        $this->verifyPaymentAndTransaction($payment, 12, 1, 0, 0, 0, 0, 12);
    }

    /**
     * Test tags
     */
    public function testTags()
    {
        //createPurchase
        $paymentData = new PaymentTransaction();
        $paymentData->setTransactionType(PaymentTransaction::TRANSACTION_TYPE_PURCHASE);
        $paymentData->setAmount(10);
        $paymentData->setCurrency('USD');
        $comboPaymentTransaction = new ComboPaymentTransaction();
        $comboPaymentTransaction->setAccount($this->account);
        $comboPaymentTransaction->setTransaction($paymentData);
        $comboPaymentTransaction->setPaymentMethod($this->paymentMethod);
        $payment = $this->client->getPaymentApi()->createComboPayment($comboPaymentTransaction, self::USER, self::REASON, self::COMMENT);

        /*
         * Create the tag definitions
         */
        $tag1 = new TagDefinition();
        $tag1->setName('tag1-'.$this->tenant->getExternalKey());
        $tag1->setDescription('This is super tag1');
        $tag1->setApplicableObjectTypes([TagDefinition::APPLICABLE_OBJECT_TYPES_PAYMENT]);
        $tag1 = $this->client->getTagDefinitionApi()->createTagDefinition($tag1, self::USER, self::REASON, self::COMMENT);

        $tag2 = new TagDefinition();
        $tag2->setName('tag2-'.$this->tenant->getExternalKey());
        $tag2->setDescription('This is tag2');
        $tag2->setApplicableObjectTypes([TagDefinition::APPLICABLE_OBJECT_TYPES_PAYMENT]);
        $tag2 = $this->client->getTagDefinitionApi()->createTagDefinition($tag2, self::USER, self::REASON, self::COMMENT);

        /*
         * Add tags
         */
        //TODO: must be createPaymentTags([$tag1, $tag2], ...)
        $tags = $this->client->getPaymentApi()->createPaymentTags(
            json_encode([$tag1->getId(), $tag2->getId()]),
            self::USER,
            $payment->getPaymentId(),
            self::REASON,
            self::COMMENT
        );
        $this->assertCount(2, $tags);

        /*
         * Verify we can retrieve them
         */
        $tags = $this->client->getPaymentApi()->getPaymentTags($payment->getPaymentId());
        $this->assertCount(2, $tags);
        if (strcmp($tags[0]->getTagDefinitionName(), $tag1->getName()) == 0) {
            $this->assertEquals($tags[0]->getTagDefinitionId(), $tag1->getId());
            $this->assertEquals($tags[1]->getTagDefinitionId(), $tag2->getId());
        } else {
            $this->assertEquals($tags[1]->getTagDefinitionId(), $tag1->getId());
            $this->assertEquals($tags[0]->getTagDefinitionId(), $tag2->getId());
        }

        /*
         * Delete one of them
         */
        //TODO: must be deleteSubscriptionTags(.., [$tag1->getId()], ...)
        $this->client->getPaymentApi()->deletePaymentTags(
            $payment->getPaymentId(),
            self::USER,
            implode(',', [$tag1->getId()]),
            self::REASON,
            self::COMMENT
        );
        $tags = $this->client->getPaymentApi()->getPaymentTags($payment->getPaymentId());
        $this->assertCount(1, $tags);
        $this->assertEquals($tags[0]->getTagDefinitionId(), $tag2->getId());
    }

    /**
     * Test customfields
     */
    public function testCustomFields()
    {
        //createPurchase
        $paymentData = new PaymentTransaction();
        $paymentData->setTransactionType(PaymentTransaction::TRANSACTION_TYPE_PURCHASE);
        $paymentData->setAmount(10);
        $paymentData->setCurrency('USD');
        $comboPaymentTransaction = new ComboPaymentTransaction();
        $comboPaymentTransaction->setAccount($this->account);
        $comboPaymentTransaction->setTransaction($paymentData);
        $comboPaymentTransaction->setPaymentMethod($this->paymentMethod);
        $payment = $this->client->getPaymentApi()->createComboPayment($comboPaymentTransaction, self::USER, self::REASON, self::COMMENT);

        /*
         * Create a custom field
         */
        $cf1 = new CustomField();
        $cf1->setObjectType(CustomField::OBJECT_TYPE_PAYMENT);
        $cf1->setName('cf1-'.$this->tenant->getExternalKey());
        $cf1->setValue('123456');

        $cf2 = new CustomField();
        $cf2->setObjectType(CustomField::OBJECT_TYPE_PAYMENT);
        $cf2->setName('cf2-'.$this->tenant->getExternalKey());
        $cf2->setValue('123456');

        //TODO: must be createPaymentCustomFields([$cf1, $cf2], ...)
        $customFieldsJson = '['.implode(',', [$cf1, $cf2]).']';
        $this->client->getPaymentApi()->createPaymentCustomFields($customFieldsJson, self::USER, $payment->getPaymentId(), self::REASON, self::COMMENT);

        /*
         * Verify we can retrieve them
         */
        $cfs = $this->client->getPaymentApi()->getPaymentCustomFields($payment->getPaymentId());
        $this->assertCount(2, $cfs);

        //TODO: endpoint custom field by name?
        $cf = $cfs[0]->getName() === $cf1->getName() ? $cfs[0] : $cfs[1];
        $this->assertEquals($cf->getName(), $cf1->getName());
        $this->assertEquals($cf->getValue(), $cf1->getValue());
        $this->assertEquals($cf->getObjectType(), $cf1->getObjectType());
        $this->assertEquals($cf->getObjectId(), $payment->getPaymentId());

        /*
         * Delete one of them
         */
        //TODO: must be deleteAccountCustomFields(..., [$cf->getCustomFieldId()])
        $this->client->getPaymentApi()->deletePaymentCustomFields(
            $payment->getPaymentId(),
            self::USER,
            "{$cf->getCustomFieldId()}",
            self::REASON,
            self::COMMENT
        );

        $cfs = $this->client->getPaymentApi()->getPaymentCustomFields($payment->getPaymentId());
        $this->assertCount(1, $cfs);
        $this->assertEquals($cfs[0]->getName(), $cf2->getName());
    }

    /**
     * @param Payment $payment
     * @param float   $transactionAmount
     * @param int     $nbTransactions
     * @param float   $authAmount
     * @param float   $capturedAmount
     * @param float   $purchasedAmount
     * @param float   $refundedAmount
     * @param float   $creditedAmount
     */
    private function verifyPaymentAndTransaction($payment, $transactionAmount, $nbTransactions, $authAmount, $capturedAmount, $purchasedAmount, $refundedAmount, $creditedAmount)
    {
        // Check the returned payment
        $this->verifyPayment($payment, $transactionAmount, $nbTransactions, $authAmount, $capturedAmount, $purchasedAmount, $refundedAmount, $creditedAmount);

        // Check the server
        $payments = $this->client->getAccountApi()->getPaymentsForAccount($this->account->getAccountId());
        $retrievedPayment = $payments[count($payments) - 1];
        $this->verifyPayment($retrievedPayment, $transactionAmount, $nbTransactions, $authAmount, $capturedAmount, $purchasedAmount, $refundedAmount, $creditedAmount);
    }

    /**
     * @param Payment $payment
     * @param float   $transactionAmount
     * @param int     $nbTransactions
     * @param float   $authAmount
     * @param float   $capturedAmount
     * @param float   $purchasedAmount
     * @param float   $refundedAmount
     * @param float   $creditedAmount
     */
    private function verifyPayment($payment, $transactionAmount, $nbTransactions, $authAmount, $capturedAmount, $purchasedAmount, $refundedAmount, $creditedAmount)
    {
        $this->assertEquals($authAmount, $payment->getAuthAmount());
        $this->assertEquals($capturedAmount, $payment->getCapturedAmount());
        $this->assertEquals($purchasedAmount, $payment->getPurchasedAmount());
        $this->assertEquals($refundedAmount, $payment->getRefundedAmount());
        $this->assertEquals($creditedAmount, $payment->getCreditedAmount());

        $this->assertEquals($nbTransactions, count($payment->getTransactions()));
        foreach ($payment->getTransactions() as $tx) {
            $this->assertEquals('SUCCESS', $tx->getStatus());
        }

        $transactions = $payment->getTransactions();
        $transaction = $transactions[count($payment->getTransactions()) - 1];
        $this->assertEquals($transactionAmount, $transaction->getAmount());
        $this->assertEquals('SUCCESS', $transaction->getStatus());
    }
}
