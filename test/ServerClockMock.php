<?php
/*
 * Copyright 2011-2013 Ning, Inc.
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

use GuzzleHttp\ClientInterface;
use Killbill\Client\Swagger\ApiException;
use Psr\Http\Message\ResponseInterface;

/**
 * Manipulate the server clock
 */
class ServerClockMock
{
    const TIMEOUT_SEC = 120;

    private $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Set the clock to a specific date
     *
     * @param string|null $requestedDate Date as a string
     * @throws ApiException
     */
    public function setClock($requestedDate)
    {
        $uri = 'test/clock';
        if (in_array($requestedDate, ['', null], true)) {
            $requestedDate = date('c');
        }
        $this->assertResponse($this->client->post($uri, [
            'query' => [
                'requestedDate' => $requestedDate,
            ],
        ]));

        // For precaution
        $this->waitForKillbill();
    }

    /**
     * Add a specific amount of days to the clock
     *
     * @param int $count Days to add
     *
     * @throws ApiException
     */
    public function addDays($count)
    {
        $this->incrementClock($count, null, null, null, 'UTC');
    }

    /**
     * Wait for all available bus events and notifications to be processed
     */
    public function waitForKillbill()
    {
        $response = $this->client->get('test/queues', ['query' => ['timeout_sec' => self::TIMEOUT_SEC]]);
        if (200 !== $response->getStatusCode()) {
            throw new ApiException(sprintf(
                'Error calling test/queues. Status: %d, Message: %s',
                $response->getStatusCode(),
                $response->getBody()->getContents()
            ));
        }
    }

    /**
     * @param mixed    $expected
     * @param callable $callable
     * @param array    $args
     */
    public function waitForExpectedClause($expected, callable $callable, array $args)
    {
        $starttime = microtime(true);
        do {
            $actual = call_user_func_array($callable, $args);
            if ($expected === $actual) {
                return;
            }
            $this->waitForKillbill();
            $elapsed = microtime(true) - $starttime;
        } while ($elapsed < self::TIMEOUT_SEC);

        throw new \RuntimeException(sprintf(
            'Timeout after waiting for %d sec. Expected: "%s", Actual: "%s"',
            $elapsed,
            $expected,
            $actual
        ));
    }

    /**
     * Increment the clock
     *
     * @param int|null    $days     Days to add
     * @param int|null    $weeks    Weeks to add
     * @param int|null    $months   Months to add
     * @param int|null    $years    Years to add
     * @param string      $timeZone Timezone as a string
     *
     * @throws ApiException
     */
    private function incrementClock($days, $weeks, $months, $years, $timeZone)
    {
        $uri = 'test/clock';
        $params = ['timeZone' => $timeZone];
        if ($days) {
            $params['days'] = $days;
        } elseif ($weeks) {
            $params['weeks'] = $weeks;
        } elseif ($months) {
            $params['months'] = $months;
        } elseif ($years) {
            $params['years'] = $years;
        }
        $this->assertResponse($this->client->put($uri, ['query' => $params]));

        // For precaution
        $this->waitForKillbill();
    }

    /**
     * @param ResponseInterface $response
     * @throws ApiException
     */
    private function assertResponse(ResponseInterface $response)
    {
        $payload = $response->getBody()->getContents();
        $data = json_decode($payload, true);
        if (null === $data || 200 !== $response->getStatusCode()) {
            throw new ApiException(sprintf(
                'Unable to mock the server date. Status: %d, Message: %s',
                $response->getStatusCode(),
                $payload
            ));
        }
    }
}
