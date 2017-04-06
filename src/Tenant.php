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

use Killbill\Client\Type\TenantAttributes;

class Tenant extends TenantAttributes
{

    public function get($headers = null)
    {
        $response = $this->_get(Client::PATH_TENANTS . ( (null !== $this->getTenantId()) ? '/' .$this->getTenantId() : '?apiKey=' . $this->$apiKey), $headers);
        return $this->_getFromBody('Tenant', $response);
    }

    /**
    * @return Tenant the newly created tenant
    */
    public function create($user, $reason, $comment)
    {
        $response = $this->_create(Client::PATH_TENANTS, $user, $reason, $comment);
        return $this->_getFromResponse('Tenant', $response, $this->getTenantHeaders());
    }


    public function getTenantHeaders()
    {
        return array(
            'X-Killbill-ApiKey: ' . $this->apiKey,
            'X-Killbill-ApiSecret: ' . $this->apiSecret
        );
    }
}
