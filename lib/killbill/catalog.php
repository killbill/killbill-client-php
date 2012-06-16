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

class Killbill_Catalog extends Killbill_Resource {
    private $fullCatalog;

    public function initialize() {
        $response = $this->_get(Killbill_Client::PATH_CATALOG . '/simpleCatalog');
        $this->fullCatalog = json_decode($response->body);
    }

    public function getFullCatalog() {
        return $this->fullCatalog;
    }

    public function getBaseProducts() {
        $baseProducts = array();
        foreach ($this->fullCatalog->products as $product) {
            if ($product->type == 'BASE') {
                $baseProducts [] = $product;
            }
        }

        return $baseProducts;
    }

    public function getAddons() {
        $addons = array();
        foreach ($this->fullCatalog->products as $addon) {
            if ($addon->type == 'ADD_ON') {
                $addons [] = $addon;
            }
        }

        return $addons;
    }
}