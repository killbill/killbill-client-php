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

use Killbill\Client\Type\CatalogAttributes;

/**
 * Catalog actions
 */
class Catalog extends CatalogAttributes
{
    private $fullCatalog;

    /**
     * @param string[]|null $headers Any additional headers
     */
    public function initialize($headers = null)
    {
        $response          = $this->getRequest(Client::PATH_CATALOG, $headers);
        $this->fullCatalog = json_decode($response->body);
    }

    /**
     * @return object|null
     */
    public function getFullCatalog()
    {
        return $this->fullCatalog;
    }

    /**
     * @return array
     */
    public function getBaseProducts()
    {
        $baseProducts = array();

        $prodsArray = count($this->fullCatalog) > 0 ? $this->fullCatalog[0]->products : array();

        foreach ($prodsArray as $product) {
            if ($product->type == 'BASE') {
                $baseProducts[] = $product;
            }
        }

        return $baseProducts;
    }

    /**
     * @return array
     */
    public function getAddons()
    {
        $addons = array();

        foreach ($this->fullCatalog->products as $addon) {
            if ($addon->type == 'ADD_ON') {
                $addons[] = $addon;
            }
        }

        return $addons;
    }
}
