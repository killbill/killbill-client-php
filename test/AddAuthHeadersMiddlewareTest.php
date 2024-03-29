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

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

/**
 * Test for AddAuthHeadersMiddleware
 */
class AddAuthHeadersMiddlewareTest extends \PHPUnit\Framework\TestCase
{
    const HOST = 'http://localhost:8980';
    const ADMIN_LOGIN = 'admin';
    const ADMIN_PASS = 'password';
    const TENANT_KEY = 'test-php-api-key';
    const TENANT_SECRET = 'test-php-api-secret';

    /**
     * Contains modified request by middleware
     * @var RequestInterface|null
     */
    private $request;

    /** @var KillbillClient|null */
    protected $client;

    /** @var AddAuthHeadersMiddleware */
    private $middleware;

    /**
     * prepare stuff
     */
    public function setUp(): void
    {
        $this->client = new KillbillClient(null, self::HOST, self::ADMIN_LOGIN, self::ADMIN_PASS);
        $this->client->setApiKey(self::TENANT_KEY);
        $this->client->setApiSecret(self::TENANT_SECRET);
        $this->middleware = new AddAuthHeadersMiddleware(function ($request) {
            $this->request = $request;
        }, $this->client->getConfiguration());
    }

    /**
     * @test
     */
    public function itDoesNotAddCredentialsToAllRoutes()
    {
        $r = new Request('GET', '/');
        $this->middleware->__invoke($r, []);
        $this->assertHeaders(['X-Killbill-ApiKey' => false, 'X-Killbill-ApiSecret' => false, 'Authorization' => false]);
    }

    /**
     * @test
     */
    public function itAddsCredentialsToWhitelistedRoutes()
    {
        $r = new Request('POST', '/1.0/kb/test/clock');
        $this->middleware->__invoke($r, []);
        $this->assertHeaders(['X-Killbill-ApiKey' => true, 'X-Killbill-ApiSecret' => true, 'Authorization' => true]);
    }

    /**
     * @test
     */
    public function itAddsBasicAuthIfConfigured()
    {
        $r = new Request('GET', '/');
        $this->middleware->__invoke($r, [
            AddAuthHeadersMiddleware::OPTION => AddAuthHeadersMiddleware::BASIC_AUTH,
        ]);
        $this->assertHeaders(['X-Killbill-ApiKey' => false, 'X-Killbill-ApiSecret' => false, 'Authorization' => true]);
    }

    /**
     * @test
     */
    public function itAddsTenantAuthIfConfigured()
    {
        $r = new Request('GET', '/');
        $this->middleware->__invoke($r, [
            AddAuthHeadersMiddleware::OPTION => AddAuthHeadersMiddleware::TENANT_KEY,
        ]);
        $this->assertHeaders(['X-Killbill-ApiKey' => true, 'X-Killbill-ApiSecret' => true, 'Authorization' => false]);
    }

    /**
     * @test
     */
    public function itAddsFullAuthIfConfigured()
    {
        $r = new Request('GET', '/');
        $this->middleware->__invoke($r, [
            AddAuthHeadersMiddleware::OPTION => AddAuthHeadersMiddleware::TENANT_KEY | AddAuthHeadersMiddleware::BASIC_AUTH,
        ]);
        $this->assertHeaders(['X-Killbill-ApiKey' => true, 'X-Killbill-ApiSecret' => true, 'Authorization' => true]);
    }

    /**
     * @param array $options
     */
    private function assertHeaders(array $options = [])
    {
        $headers = $this->request->getHeaders();
        if (isset($options['X-Killbill-ApiKey'])) {
            if ($options['X-Killbill-ApiKey']) {
                self::assertArrayHasKey('X-Killbill-ApiKey', $headers);
                self::assertSame([self::TENANT_KEY], $headers['X-Killbill-ApiKey']);
            } else {
                self::assertArrayNotHasKey('X-Killbill-ApiKey', $headers);
            }
        }
        if (isset($options['X-Killbill-ApiSecret'])) {
            if ($options['X-Killbill-ApiSecret']) {
                self::assertArrayHasKey('X-Killbill-ApiSecret', $headers);
                self::assertSame([self::TENANT_SECRET], $headers['X-Killbill-ApiSecret']);
            } else {
                self::assertArrayNotHasKey('X-Killbill-ApiSecret', $headers);
            }
        }
        if (isset($options['Authorization'])) {
            if ($options['Authorization']) {
                self::assertArrayHasKey('Authorization', $headers);
                $basic = 'Basic '.base64_encode(self::ADMIN_LOGIN.':'.self::ADMIN_PASS);
                self::assertSame([$basic], $headers['Authorization']);
            } else {
                self::assertArrayNotHasKey('Authorization', $headers);
            }
        }
    }
}
