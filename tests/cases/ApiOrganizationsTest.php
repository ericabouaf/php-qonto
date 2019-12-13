<?php

namespace neyric\Qonto\Tests\Cases;

use neyric\Qonto\QontoApi;

use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

use PHPUnit\Framework\TestCase;

set_time_limit(0);

class ApiOrganizationsTest extends TestCase
{

    function test_QontoApiOrganizations()
    {
        $qonto = new QontoApi('login', 'secretKey');

        // Setup a MockHttpClient for the api client
        $responses = [
            new MockResponse(json_encode([
                'organization' => [
                    'slug' => 'acme-corp-1111',
                    'bank_accounts' => [
                        [
                            'slug' => 'acme-corp-1111-bank-account-1',
                            'iban' => 'FR76XXXXXXXXXXXXXXXXXXXXXXX',
                            'bic' => 'QNTOFRP1XXX',
                            'currency' => 'EUR',
                            'balance' => 72130.64,
                            'balance_cents' => 7213064,
                            'authorized_balance' => 72130.64,
                            'authorized_balance_cents' => 7213064,
                        ]
                    ]
                ]
            ])),
        ];
        $qonto->client->httpClient = new MockHttpClient($responses);
        

        $organization = $qonto->Organizations->get('organization-id');

        $this->assertNotNull($organization);
        $this->assertEquals('acme-corp-1111', $organization->slug);
        $this->assertEquals('acme-corp-1111-bank-account-1', $organization->bank_accounts[0]->slug);
        $this->assertEquals(7213064, $organization->bank_accounts[0]->balance_cents);
    }

}