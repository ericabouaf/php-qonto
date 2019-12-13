Qonto API client for PHP [![Build Status](https://travis-ci.org/neyric/php-qonto.svg?branch=master)](https://travis-ci.org/neyric/php-qonto) [![Latest Stable Version](https://poser.pugx.org/neyric/php-qonto/v/stable)](https://packagist.org/packages/neyric/php-qonto) [![Total Downloads](https://poser.pugx.org/neyric/php-qonto/downloads)](https://packagist.org/packages/neyric/php-qonto) [![License](https://poser.pugx.org/neyric/php-qonto/license)](https://packagist.org/packages/neyric/php-qonto)
=================================================

neyric/php-qonto is an unofficial PHP client library to work with [Qonto REST API v2](https://api-doc.qonto.eu/).


Requirements
-------------------------------------------------
To use this SDK, you will need (as a minimum):
* PHP v7.1
* You do not have to use [Composer](https://getcomposer.org/), but you are strongly advised to
* A working Qonto Account


License
-------------------------------------------------
neyric/php-qonto is distributed under MIT license, see the [LICENSE file](https://github.com/neyric/php-qonto/blob/master/LICENSE).


Contacts
-------------------------------------------------
Report bugs or suggest features using [issue tracker on GitHub](https://github.com/neyric/php-qonto).


Configuration
-------------------------------------------------

When using the API, you can authenticate a Qonto account using its login and secret key in the request. You can find and manage your secret key from the Qonto web application under Settings, in the API tab.

Qonto does not provide sandbox accounts for its API yet. (The API is read-only anyway)


Sample usage
-------------------------------------------------
```php
require_once '/path/to/your-project/vendor/autoload.php';

$qonto = new \neyric\Qonto\QontoApi("your-qonto-login", "your-qonto-secret-key");

// Fetch the organization details (tip: the organization id is the same as the login)
$organization = $qonto->Organizations->get("your-organization-id");
var_dump($organization);

// Fetch the list of transactions
$transactionCollection = $qonto->Transactions->list('bank-account-slug', 'FR76XXXXXXXXXXXXXXXXXXXXXXX');
var_dump($transactionCollection);

// Fetch memberships
$memberships = $qonto->Memberships->list();
var_dump($memberships);

// Fetch labels
$labels = $qonto->Labels->list();
var_dump($labels);

// Fetch an attachment
$attachment = $qonto->Attachments->get("some-attachement-id");
var_dump($attachment);
```

