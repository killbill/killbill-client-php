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

use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Killbill\Client\Api\AccountApi;
use Killbill\Client\Api\TenantApi;
use Killbill\Client\Model\Account;
use Killbill\Client\Model\Tenant;

/**
 * Base test class
 */
class KillbillTest extends \PHPUnit_Framework_TestCase
{
    const USER    = 'phpTester';
    const REASON  = 'test';
    const COMMENT = 'no comment';

    /** @var Account|null */
    protected $accountData = null;
    /** @var Tenant|null */
    protected $tenant = null;
    /** @var ServerClockMock|null */
    protected $clock = null;
    /** @var string|null */
    protected $externalAccountId = null;

//    /** @var Logger|null */
//    protected $logger = null;

    /**
     * Set up the test
     */
    public function setUp()
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

        $config = Configuration::getDefaultConfiguration();
        $config
            ->setHost(getenv('API_HOST'))
            ->setUsername(getenv('ADMIN_LOGIN'))
            ->setPassword(getenv('ADMIN_PASSWORD'))
            ->setApiKey('X-Killbill-ApiKey', $tenantApiKey)
            ->setApiKey('X-Killbill-ApiSecret', $tenantApiSecret)
        ;

        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());
        $stack->push(RedirectOnPostMiddleware::get());
        $stack->push(AddTenantHeadersMiddleware::get($config));

        $guzzle = new Client(['handler' => $stack]);

        $tenant = new Tenant();
        $tenant->setExternalKey($externalKey);
        $tenant->setApiKey($tenantApiKey);
        $tenant->setApiSecret($tenantApiSecret);

        $tenantApi = new TenantApi($guzzle, $config);
        $this->tenant = $tenantApi->createTenant($tenant, self::USER, self::REASON, self::COMMENT);
        $this->tenant->setApiSecret($tenant->getApiSecret());

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

        $accountApi = new AccountApi($guzzle, $config);
        $this->accountData = $accountApi->createAccount($this->accountData, self::USER, self::REASON, self::COMMENT);


        // setup catalog
        $killbillClient = new Client($this->logger);
        $headers        = $tenant->getTenantHeaders();
        $headers[]      = 'Content-Type: application/xml; charset=utf-8';

        $catalogContents = file_get_contents(__DIR__.'/resources/SpyCarAdvanced.xml');
        $response        = $killbillClient->request(Client::POST, Client::PATH_CATALOG, $catalogContents, self::USER, self::REASON, self::COMMENT, $headers);

        $this->clock = new ServerClockMock();
        // Reset clock to now
        $this->clock->setClock(null, $this->tenant->getTenantHeaders());

        $this->externalAccountId = uniqid();
        if (getenv('ENV') === 'local' || getenv('RECORD_REQUESTS') == '1') {
            $this->externalAccountId = md5('externalAccount'.$this->tenant->getExternalKey());
        }
        $this->accountData = new Account($this->logger);
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
    public function tearDown()
    {
        unset($this->externalAccountId);
        unset($this->accountData);
        unset($this->tenant);
        unset($this->clock);
    }

    /**
     * Dummy test
     */
    public function testDummyToAvoidWarning()
    {
        $this->assertTrue(true);
    }
}
