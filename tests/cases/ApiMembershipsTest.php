<?php

namespace neyric\Qonto\Tests\Cases;

use neyric\Qonto\QontoApi;

use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

use PHPUnit\Framework\TestCase;

set_time_limit(0);

class ApiMembershipsTest extends TestCase
{

    function test_QontoApiOrganizations()
    {
        $qonto = new QontoApi('login', 'secretKey');

        // Setup a MockHttpClient for the api client
        $responses = [
            new MockResponse(json_encode([
                'memberships' => [
                    [
                        'id' => '13e6b02e-a0c8-4f25-8fd2-20bd9f80ac43',
                        'first_name' => 'John',
                        'last_name' => 'Doe',
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
        
        $membershipCollection = $qonto->Memberships->list();

        $this->assertNotNull($membershipCollection);
        $this->assertEquals('John', $membershipCollection->memberships[0]->first_name);
    }

}