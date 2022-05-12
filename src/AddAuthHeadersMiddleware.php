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

use GuzzleHttp\Psr7\Utils;
use Killbill\Client\Swagger\Configuration;
use Psr\Http\Message\RequestInterface;

/**
 * This adds Killbill auth headers to the request
 *
 * Note: By default, credentials are added to whitelisted routes only.
 * The other routes credentials are managed by generated swagger client.
 * You can also specify an option, e.g: [killbill_auth_header => BASIC_AUTH | TENANT_KEY]
 */
class AddAuthHeadersMiddleware
{
    const OPTION = 'killbill_auth_header';
    const BASIC_AUTH = 1;
    const TENANT_KEY = 2;

    /** @var callable  */
    private $nextHandler;

    private $configuration;

    /** @var array */
    private $whitelist;

    /**
     * @param callable      $nextHandler
     * @param Configuration $configuration
     * @param array|null    $whitelist
     */
    public function __construct(callable $nextHandler, Configuration $configuration, array $whitelist = null)
    {
        $this->nextHandler = $nextHandler;
        $this->configuration = $configuration;

        $this->whitelist = is_array($whitelist) ? $whitelist : [
            ['GET|PUT', '/1.0/kb/tenants', self::TENANT_KEY],
            ['POST|PUT', '/1.0/kb/test/clock', self::BASIC_AUTH | self::TENANT_KEY],
            ['GET', '/1.0/kb/test/queues', self::BASIC_AUTH | self::TENANT_KEY],
        ];
    }

    /**
     * @param Configuration $configuration
     *
     * @return \Closure
     */
    public static function get(Configuration $configuration): \Closure
    {
        return function (callable $handler) use ($configuration) {
            return new AddAuthHeadersMiddleware($handler, $configuration);
        };
    }

    /**
     * @param RequestInterface $request
     * @param array            $options
     *
     * @return mixed
     */
    public function __invoke(RequestInterface $request, array $options)
    {
        $actions = $this->getActions($request, $options);

        if (!empty($actions)) {
            $request = $this->addHeaders($request, $actions);
        }
        $fn = $this->nextHandler;

        return $fn($request, $options);
    }

    /**
     * @param RequestInterface $request
     * @param array            $options
     *
     * @return array
     */
    private function getActions(RequestInterface $request, array $options)
    {
        if (isset($options[self::OPTION])) {
            return $options[self::OPTION];
        }

        foreach ($this->whitelist as list($method, $path, $actions)) {
            if (preg_match('/'.$method.'/i', $request->getMethod())
                && strpos($request->getUri()->getPath(), $path) !== false
            ) {
                return $actions;
            }
        }

        return [];
    }

    /**
     * @param RequestInterface $request
     * @param int              $actions
     *
     * @return RequestInterface
     */
    private function addHeaders(RequestInterface $request, $actions)
    {
        $headers = [];
        if ($actions & self::TENANT_KEY) {
            $headers = array_merge($headers, $this->getTenantHeader());
        }
        if ($actions & self::BASIC_AUTH) {
            $headers = array_merge($headers, $this->getBasicAuthHeader());
        }

        $modify['set_headers'] = $headers;

        return Utils::modifyRequest($request, $modify);
    }

    /**
     * @return array
     */
    private function getTenantHeader(): array
    {
        $headers = [];

        $apiKey = $this->configuration->getApiKeyWithPrefix('X-Killbill-ApiKey');
        if (null !== $apiKey) {
            $headers['X-Killbill-ApiKey'] = $apiKey;
        }
        $apiKey = $this->configuration->getApiKeyWithPrefix('X-Killbill-ApiSecret');
        if (null !== $apiKey) {
            $headers['X-Killbill-ApiSecret'] = $apiKey;
        }

        return $headers;
    }

    /**
     * @return array
     */
    private function getBasicAuthHeader(): array
    {
        $headers = [];

        if ($this->configuration->getUsername() !== null || $this->configuration->getPassword() !== null) {
            $encoded = base64_encode($this->configuration->getUsername().':'.$this->configuration->getPassword());
            $headers['Authorization'] = 'Basic '.$encoded;
        }

        return $headers;
    }
}
