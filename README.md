killbill-client-php
===================

PHP client library for [Killbill](http://killbill.io)

Configuration
-------------

In order to user the library, you need to:

1. Require the library via [composer](https://getcomposer.org): `composer require killbill\killbill-client`
2. Point the library to your Killbill instance via the `Client::$serverUrl` variable (http://127.0.0.1:8080 by default)

Example
-------

The following snippet will create an account:

```php
<?php

use \Killbill\Client\Client;
use \Killbill\Client\Tenant;
use \Killbill\Client\Account;

// Killbill server
Client::$serverUrl = "http://localhost:8080";

// Set these values for your particular tenant
$tenant = new Tenant();
$tenant->apiKey    = 'bob';
$tenant->apiSecret = 'lazar';

// Unique id for this account
$externalAccountId = uniqid();

// Prepare the account data
$accountData = new Account();
$accountData->name = "Killbill php test";
$accountData->externalKey = $externalAccountId;
$accountData->email = "test-" . $externalAccountId . "@kill-bill.org";
$accountData->currency = "USD";
$accountData->paymentMethodId = null;
$accountData->address1 = "12 rue des ecoles";
$accountData->address2 = "Poitier";
$accountData->company = "Renault";
$accountData->state = "Poitou";
$accountData->country = "France";
$accountData->phone = "81 53 26 56";
$accountData->length = 4;
$accountData->billCycleDay = 12;
$accountData->timeZone = "UTC";

// Create it
$createdAccount = $accountData->create("pierre", "PHP_TEST", "Test for " . $externalAccountId, $tenant->getTenantHeaders());
```

Requirements
------------

The PHP library requires PHP 5.3.0 or greater with _libcurl_ compiled (e.g. you need the php5-curl package on Ubuntu).


Support
-------

Feel free to ask questions on the [killbilling-users](https://groups.google.com/forum/?fromgroups#!forum/killbilling-users) Google Group.
