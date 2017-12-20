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

use Killbill\Client\Type\InvoiceDryRunAttributes;

/**
 * InvoiceDryRun actions
 */
class InvoiceDryRun extends InvoiceDryRunAttributes
{
    /**
     *
     * @return Invoice|null The dry-run invoice
     */
    public function get($accountId = null, $targetDate = null, $user = null, $reason = null, $comment = null, $headers = null)
    {
        $queryData = array();
        if ($targetDate) {
            $queryData['targetDate'] = $targetDate;
        }
        
        if ($accountId) {
            $queryData['accountId'] = $accountId;
        }

        $query = $this->makeQuery($queryData);
        $response = $this->createRequest(Client::PATH_INVOICES.'/dryRun'.$query, $user, $reason, $comment, $headers);
        
        try {
            /** @var Invoice|null $object */
            $object = $this->getFromBody(Invoice::class, $response);
        } catch (Exception $e) {
            $this->logger->error($e);

            return null;
        }

        return $object;
    }
}
