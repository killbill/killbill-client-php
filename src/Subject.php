<?php
/*
 * Copyright 2011-2017 The Billing Project, LLC
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

use Killbill\Client\Type\SubjectAttributes;

/**
 * 
 *
 */
class Subject extends SubjectAttributes
{
    /**
     * @param string[]|null $headers   Any additional headers
     *
     * @return Subject|null The fetched subject
     */
    public function get($headers = null)
    {
        $response = $this->getRequest(Client::PATH_SECURITY.'/subject', $headers);

        try {
            /** @var Subject|null $object */
            $object = $this->getFromBody(Subject::class, $response);
        } catch (Exception $e) {
            $this->logger->error($e);

            return null;
        }

        return $object;
    }
}
