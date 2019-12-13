<?php

namespace neyric\Qonto\Tests\Cases;

use neyric\Qonto\QontoApi;

use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

use PHPUnit\Framework\TestCase;

set_time_limit(0);

class ApiTransactionsTest extends TestCase
{

    function test_QontoApiOrganizations()
    {
        $qonto = new QontoApi('login', 'secretKey');

        // Setup a MockHttpClient for the api client
        $responses = [
            new MockResponse(json_encode([
                'transactions' => [
                    [
                        "transaction_id" => "acme-corp-1111-1-transaction-1",
                        "amount" => 2760,
                        "amount_cents" => 276000,
                        "attachment_ids" => [],
                        "local_amount" => 2760,
                        "local_amount_cents" => 276000,
                        "side" => "credit",
                        "operation_type" => "income",
                        "currency" => "EUR",
                        "local_currency" => "EUR",
                        "label" => "Some Label",
                        "settled_at" => "2019-10-30T08:01:42.779Z",
                        "emitted_at" => "2019-10-30T07:01:13.000Z",
                        "updated_at" => "2019-10-30T08:05:39.658Z",
                        "status" => "completed",
                        "note" => null,
                        "reference" => "Some reference",
                        "vat_amount" => null,
                        "vat_amount_cents" => null,
                        "vat_rate" => null,
                        "initiator_id" => null,
                        "label_ids" => [],
                        "attachment_lost" => false,
                        "attachment_required" => true
                    ]
                ],
                'meta' => [
                    'current_page' => 1,
                    'next_page' => null,
                    'prev_page' => null,
                    'total_pages' => 1,
                    'total_count' => 1,
                    'per_page' => 100,
                ]
            ])),
        ];
        $qonto->client->httpClient = new MockHttpClient($responses);
        
        $transactionCollection = $qonto->Transactions->list('bank-account-slug', 'bank-account-iban');

        $this->assertNotNull($transactionCollection);

        $this->assertEquals('acme-corp-1111-1-transaction-1', $transactionCollection->transactions[0]->transaction_id);
    }

}