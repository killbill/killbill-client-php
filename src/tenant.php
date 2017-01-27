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

require_once(dirname(__FILE__) . '/gen/killbill_tenant_attributes.php');

class Killbill_Tenant extends Killbill_TenantAttributes
{

    public function get($headers = null)
    {

        $response = $this->_get(Killbill_Client::PATH_TENANTS . ( isset($this->tenantId) ? '/' .$this->tenantId : '?apiKey=' . $this->$apiKey), $headers);


        return $this->_getFromBody('Killbill_Tenant', $response);
    }

    public function create($user, $reason, $comment)
    {
        $response = $this->_create(Killbill_Client::PATH_TENANTS, $user, $reason, $comment);
        return $this->_getFromResponse('Killbill_Tenant', $response, $this->getTenantHeaders());
    }


    public function getTenantHeaders()
    {
        return array(
            'X-Killbill-ApiKey: ' . $this->apiKey,
            'X-Killbill-ApiSecret: ' . $this->apiSecret
        );
    }
}