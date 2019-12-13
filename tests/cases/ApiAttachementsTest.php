<?php

namespace neyric\Qonto\Tests\Cases;

use neyric\Qonto\QontoApi;

use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

use PHPUnit\Framework\TestCase;

set_time_limit(0);

class ApiAttachementsTest extends TestCase
{

    function test_QontoApiOrganizations()
    {
        $qonto = new QontoApi('login', 'secretKey');

        // Setup a MockHttpClient for the api client
        $responses = [
            new MockResponse(json_encode([
                "attachment" => [
                    "id" => "ad3234b4-2529-36ee-b5b9-d0883271f079",
                    "created_at" => "2019-08-27T12:04:31.029Z",
                    "file_name" => "Somefilename.pdf",
                    "file_size" => "56608",
                    "file_content_type" => "application/pdf",
                    "url" => "https://qonto.s3.eu-central-1.amazonaws.com/production/uploads/attachment/somefileid?with=s3token"
                ]
            ])),
        ];
        $qonto->client->httpClient = new MockHttpClient($responses);
        

        $attachment = $qonto->Attachments->get('ad3234b4-2529-36ee-b5b9-d0883271f079');

        $this->assertNotNull($attachment);

        $this->assertEquals('Somefilename.pdf', $attachment->file_name);
    }

}