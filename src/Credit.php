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

/**
 * 
 *
 */
class Credit extends Type\CreditAttributes
{
    /**
     * @param boolean       $autoCommit
     * @param string|null   $user    User requesting the creation
     * @param string|null   $reason  Reason for the creation
     * @param string|null   $comment Any addition comment
     * @param string[]|null $headers Any additional headers
     *
     * @return Credit|null The newly created payment method
     */
    public function create($autoCommit = false, $user, $reason, $comment, $headers = null)
    {
        $queryData = array();
        $queryData['autoCommit'] = $autoCommit ? 'true' : 'false';

        $query = $this->makeQuery($queryData);
        $response = $this->createRequest(Client::PATH_CREDITS.$query, $user, $reason, $comment, $headers);

        try {
            /** @var Credit|null $object */
            $object = $this->getFromResponse(PaymentMethod::class, $response, $headers);
        } catch (Exception $e) {
            $this->logger->error($e);

            return null;
        }

        return $object;
    }
}
