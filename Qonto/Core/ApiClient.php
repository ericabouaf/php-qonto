<?php

namespace neyric\Qonto\Core;

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
                'Authorization' => self::getAuthorizationValue($login, $secretKey)
            ]
        ]);
    }


    public function getRequest($url, $queryParameters = [])
    {
        return $this->httpClient->request('GET', $url, [
            'query' => $queryParameters
        ]);
    }

    
    static function getAuthorizationValue($login, $secretKey) {
        return $login . ':' . $secretKey;
    }

}