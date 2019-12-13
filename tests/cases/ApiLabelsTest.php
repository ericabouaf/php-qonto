<?php

namespace neyric\Qonto\Tests\Cases;

use neyric\Qonto\QontoApi;

use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

use PHPUnit\Framework\TestCase;

set_time_limit(0);

class ApiLabelsTest extends TestCase
{

    function test_QontoApiOrganizations()
    {
        $qonto = new QontoApi('login', 'secretKey');

        // Setup a MockHttpClient for the api client
        $responses = [
            new MockResponse(json_encode([
                'labels' => [
                    [
                        'id' => 'some-random-uuid',
                        'name' => 'Test Label',
                        'parent_id' => null,
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
        
        $labelCollection = $qonto->Labels->list();

        $this->assertNotNull($labelCollection);
        $this->assertEquals('Test Label', $labelCollection->labels[0]->name);
    }

}