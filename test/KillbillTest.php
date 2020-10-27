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
use Killbill\Client\Swagger\Model\Tenant;
use Psr\Log\LoggerInterface;

/**
 * Base test class
 */
class KillbillTest extends \PHPUnit\Framework\TestCase
{
    const USER    = 'phpTester';
    const REASON  = 'test';
    const COMMENT = 'no comment';

    /** @var KillbillClient|null */
    protected $client;
    /** @var Account|null */
    protected $accountData;
    /** @var Tenant|null */
    protected $tenant;
    /** @var ServerClockMock|null */
    protected $clock;
    /** @var string|null */
    protected $externalAccountId;
    /** @var LoggerInterface|null */
    protected $logger;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        // Enable this if you need some logs
        //$this->logger = new Logger('name');
        //$this->logger->pushHandler(new StreamHandler('php://stdout', Logger::INFO));

        $externalKey = uniqid();
//        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') == '1') {
//            Client::$mockManager = new MockManager();
//
//            if (getenv('RECORD_REQUESTS') == '1') {
//                Client::$recordMocks = true;
//                Client::$mockManager->saveExternalKey(static::class.':'.$this->getName(), $externalKey);
//            } else {
//                Client::$useMockData = true;
//                $externalKey = Client::$mockManager->getExternalKey(static::class.':'.$this->getName());
//            }
//        }

        $tenantApiKey = 'test-php-api-key-'.$externalKey;
        $tenantApiSecret = 'test-php-api-secret-'.$externalKey;

        $this->client = new KillbillClient(
            $this->logger,
            getenv('API_HOST'),
            getenv('ADMIN_LOGIN'),
            getenv('ADMIN_PASSWORD')
        );
        $this->client->setApiKey($tenantApiKey);
        $this->client->setApiSecret($tenantApiSecret);

        $tenant = new Tenant();
        $tenant->setExternalKey($externalKey);
        $tenant->setApiKey($tenantApiKey);
        $tenant->setApiSecret($tenantApiSecret);

        $this->tenant = $this->client->getTenantApi()->createTenant($tenant, self::USER, self::REASON, self::COMMENT);

        $this->accountData = new Account();
        $this->accountData->setName('Killbill php test');
        $this->accountData->setExternalKey($this->externalAccountId);
        $this->accountData->setEmail('test-'.$this->externalAccountId.'@kill-bill.org');
        $this->accountData->setCurrency('USD');
        $this->accountData->setPaymentMethodId(null);
        $this->accountData->setAddress1('12 rue des ecoles');
        $this->accountData->setAddress2('Poitier');
        $this->accountData->setCompany('Renault');
        $this->accountData->setState('Poitou');
        $this->accountData->setCountry('France');
        $this->accountData->setPhone('81 53 26 56');
        $this->accountData->setFirstNameLength(4);
        $this->accountData->setTimeZone('UTC');

        $this->accountData = $this->client->getAccountApi()->createAccount($this->accountData, self::USER, self::REASON, self::COMMENT);


        // setup catalog
        $catalogContents = file_get_contents(__DIR__.'/resources/SpyCarAdvanced.xml');
        $this->client->getCatalogApi()->uploadCatalogXml($catalogContents, self::USER, self::REASON, self::COMMENT);

        $this->clock = new ServerClockMock($this->client->getGuzzleClient());
        // Reset clock to now
        $this->clock->setClock(null);
        $this->externalAccountId = uniqid();
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') === '1') {
            $this->externalAccountId = md5('externalAccount'.$this->tenant->getExternalKey());
        }
        $this->accountData = new Account();
        $this->accountData->setName('Killbill php test');
        $this->accountData->setExternalKey($this->externalAccountId);
        $this->accountData->setEmail('test-'.$this->externalAccountId.'@kill-bill.org');
        $this->accountData->setCurrency('USD');
        $this->accountData->setPaymentMethodId(null);
        $this->accountData->setAddress1('12 rue des ecoles');
        $this->accountData->setAddress2('Poitier');
        $this->accountData->setCompany('Renault');
        $this->accountData->setState('Poitou');
        $this->accountData->setCountry('France');
        $this->accountData->setPhone('81 53 26 56');
        $this->accountData->setFirstNameLength(4);
        $this->accountData->setTimeZone('UTC');
    }

    /**
     * Unset everything
     */
    public function tearDown(): void
    {
        unset($this->externalAccountId, $this->accountData, $this->tenant, $this->clock);
    }

    /**
     * Dummy test
     */
    public function testDummyToAvoidWarning()
    {
        $this->assertTrue(true);
    }
}
