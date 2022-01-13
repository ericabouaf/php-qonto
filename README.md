Qonto API client for PHP [![Build Status](https://travis-ci.org/neyric/php-qonto.svg?branch=master)](https://travis-ci.org/neyric/php-qonto) [![Latest Stable Version](https://poser.pugx.org/neyric/php-qonto/v/stable)](https://packagist.org/packages/neyric/php-qonto) [![Total Downloads](https://poser.pugx.org/neyric/php-qonto/downloads)](https://packagist.org/packages/neyric/php-qonto) [![License](https://poser.pugx.org/neyric/php-qonto/license)](https://packagist.org/packages/neyric/php-qonto)
=================================================

neyric/php-qonto is an unofficial PHP client library to work with [Qonto REST API v2](https://api-doc.qonto.eu/).


Requirements
-------------------------------------------------
To use this SDK, you will need (as a minimum):
* PHP v7.1
* You do not have to use [Composer](https://getcomposer.org/), but you are strongly advised to
* A working Qonto Account


Installation with Composer
-------------------------------------------------
You can use neyric/php-qonto library as a dependency in your project with [Composer](https://getcomposer.org/) (which is the preferred technique). Follow [these installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have Composer installed.
A composer.json file is available in the repository and it has been referenced from [Packagist](https://packagist.org/packages/neyric/php-qonto). 

    you@yourhost:/path/to/your-project$ composer require neyric/php-qonto
    

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

// Fetch the list of transactions with filters
use neyric\Qonto\Model\TransactionFilterBuilder;

$filters = TransactionFilterBuilder::create()
            ->status("completed")
            ->side("credit")
            ->updatedAtFrom("2019-01-10T11:47:53.123Z")
            ->updatedAtTo("2021-01-10T11:47:53.123Z")
            ->attachments();

$transactionCollection = $qonto->Transactions->listFilter('bank-account-slug', 'FR76XXXXXXXXXXXXXXXXXXXXXXX', $filters);
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

// Fetch the list of external transfers 
$externalTransfersCollection = $qonto->ExternalTransers->list();
var_dump($externalTransfersCollection);

// Fetch the list of external transfers with filters
use neyric\Qonto\Model\ExternalTransferFilterBuilder;
use neyric\Qonto\Model\ExternalTransferStatus;

$filters = ExternalTransferFilterBuilder::create()
            ->beneficary(["0a8df251-de2a-4394-bffc-6b9d9795700d"])
            ->status(ExternalTransferStatus::PENDING)
            ->scheduledAtFrom("2022-01-10")
            ->updatedAtTo("2022-01-27T22:05:07.000Z");

$externalTransfersCollection = $qonto->ExternalTransers->listFilter($filters);
var_dump($externalTransfersCollection);

// Create an external transfer 
use neyric\Qonto\Model\ExternalTransferBuilder;

$builder = ExternalTransferBuilder::create()
            ->beneficaryId("0a8df251-de2a-4394-bffc-6b9d9795700d")
            ->debitIban("FR7630001007941234567890185")
            ->currency("EUR")
            ->note("External transfer for John")
            ->reference("External transfer reference (ex: John Car)")
            ->amount(18000.56)
            ->scheduledDate("2022-02-10");
            
$qonto->ExternalTransers->create($builder);
```

