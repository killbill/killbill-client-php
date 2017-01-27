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

require_once(dirname(__FILE__) . '/gen/killbill_bundle_attributes.php');

class Killbill_Bundle extends Killbill_BundleAttributes {

    public function get($headers = null) {
        $response = $this->_get(Killbill_Client::PATH_BUNDLES . '/' . $this->bundleId, $headers);
        return $this->_getFromBody('Killbill_Bundle', $response);
    }

    public function getByExternalKey($headers = null) {
        $response = $this->_get(Killbill_Client::PATH_BUNDLES . '?externalKey=' . $this->externalKey, $headers);
        return $this->_getFromBody('Killbill_Bundle', $response);
    }

    public function getTags($headers = null) {
        $response = $this->_get(Killbill_Client::PATH_BUNDLES . '/' . $this->bundleId . Killbill_Client::PATH_TAGS, $headers);
        return $this->_getFromBody('Killbill_Tag', $response);
    }

    public function addTags($tags, $user, $reason, $comment, $headers = null) {
        $response = $this->_create(Killbill_Client::PATH_BUNDLES . '/' . $this->bundleId . Killbill_Client::PATH_TAGS  . '?tagList=' . join(',', $tags),
            $user, $reason, $comment, $headers);
        return $this->_getFromResponse('Killbill_Tag', $response, $headers);
    }

    public function deleteTags($tags, $user, $reason, $comment, $headers = null) {
        $this->_delete(Killbill_Client::PATH_BUNDLES . '/' . $this->bundleId . Killbill_Client::PATH_TAGS  . '?tagList=' . join(',', $tags),
            $user, $reason, $comment, $headers);
        return null;
    }

    public function pause($date, $user, $reason, $comment, $headers = null) {
        $this->_update(Killbill_Client::PATH_BUNDLES . '/' .
            $this->bundleId . '/pause?requestedDate=' . $date, $user, $reason, $comment, $headers);
        return null;
    }

    public function resume($date, $user, $reason, $comment, $headers = null) {
        $this->_update(Killbill_Client::PATH_BUNDLES . '/' .
            $this->bundleId . '/resume?requestedDate=' . $date, $user, $reason, $comment, $headers);
        return null;
    }

}
