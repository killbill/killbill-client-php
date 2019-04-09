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

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Killbill\Client\Swagger\ApiException;
use Killbill\Client\Swagger\Configuration;
use Psr\Http\Message\ResponseInterface;

/**
 * Manipulate the server clock
 */
class ServerClockMock
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
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
        usleep(3000000);
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
        usleep(3000000);
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
