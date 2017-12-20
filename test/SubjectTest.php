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

/**
 * 
 *
 */
class SubjectTest extends KillbillTest
{
    /**
     * Tear down test
     */
    public function tearDown()
    {
        parent::tearDown();
        unset($this->externalBundleId);
        unset($this->account);
    }

    /**
     * Test basic API
     */
    public function testBasic()
    {
        $subject = (new Subject($this->logger))
            ->get($this->tenant->getTenantHeaders());

        $this->assertNotNull($subject);
        $this->assertNotNull($subject->getPrincipal());
        
    }
}
