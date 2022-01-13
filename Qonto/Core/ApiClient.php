<?php

namespace neyric\Qonto\Core;

use neyric\Qonto\Utils\UUIDUtils;
use Symfony\Component\HttpClient\HttpClient;

class ApiClient
{
    private $baseUrl;

    public $httpClient; // public to be easily overriden in tests

    /**
     * ApiClient constructor
     */
    public function __construct($login, $secretKey, $baseUrl)
    {
        $this->baseUrl = $baseUrl;

        $this->httpClient = HttpClient::create([
            'headers' => [
                'Authorization' => self::getAuthorizationValue($login, $secretKey),
                'Content-Type' => 'application/json',
                'X-Qonto-Idempotency-Key' => UUIDUtils::v4()
            ]
        ]);
    }


    public function getRequest($url, $queryParameters = [])
    {
        return $this->httpClient->request('GET', $url, [
            'query' => $queryParameters
        ]);
    }

    public function getRequestPOST($url, $body_parameters){
        return $this->httpClient->request('POST', $url, [
            'body' => $body_parameters
        ]);
    }

    
    static function getAuthorizationValue($login, $secretKey) {
        return $login . ':' . $secretKey;
    }

}