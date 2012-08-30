<?php
/*
 * Copyright 2011-2012 Ning, Inc.
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

require_once(dirname(__FILE__) . '/../vendor/simpletest-1.1.0/autorun.php');
require_once(dirname(__FILE__) . '/mock_response.php');
require_once(dirname(__FILE__) . '/../lib/killbill.php');

class TestAccountEmail extends UnitTestCase {

    function testCanDeserializeFromJson() {
        $response = new MockResponse('{"accountId":"a9762b3b-d9fa-4a5b-8f3a-5c48eaf35585","email":"29af35f9-73aa-470b-a061@391054e98a65.com"}');

        $accountEmail = new Killbill_AccountEmail();
        $accountEmail = $accountEmail->_getFromBody($response);
        $this->assertEqual($accountEmail->accountId, 'a9762b3b-d9fa-4a5b-8f3a-5c48eaf35585');
        $this->assertEqual($accountEmail->email, '29af35f9-73aa-470b-a061@391054e98a65.com');
    }
}
