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

class killbill_ServerClockMock extends Killbill_Resource
{
    public function setClock($requestedDate, $headers)
    {
        $uri = '/test/clock';
        if ($requestedDate) {
            $uri = $uri . '?requestedDate=' . $requestedDate;
        }
        $this->_create($uri, null, null, null, $headers);
        // For precaution
        usleep(3000000);
    }

    public function addDays($count, $headers)
    {
        $this->incrementClock($count, null, null, null, 'UTC', $headers);
    }

    private function incrementClock($days, $weeks, $months, $years, $timeZone, $headers)
    {
        $uri = '/test/clock';
        if ($days) {
            $uri = $uri . '?days=' . $days . '&timeZone=' . $timeZone;
        } else if ($weeks) {
            $uri = $uri . '?weeks=' . $weeks . '&timeZone=' . $timeZone;
        } else if ($months) {
            $uri = $uri . '?months=' . $months . '&timeZone=' . $timeZone;
        } else if ($years) {
            $uri = $uri . '?years=' . $years . '&timeZone=' . $timeZone;
        }
        $this->_update($uri, null, null, null, $headers);
        // For precaution
        usleep(3000000);
    }
}