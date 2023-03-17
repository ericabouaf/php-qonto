<?php

namespace neyric\Qonto\Core;

use neyric\Qonto\QontoApi;

/**
 * Base class for Qonto API managers
 */
abstract class ApiResource
{
    /**
     * @var QontoApi
     */
    protected $api;

    /**
     * @param QontoApi $api
     */
    public function __construct($api)
    {
        $this->api = $api;
    }

    /**
     * @param string $path
     * @param array $queryParameters
     * 
     * @return array
     */
    protected function fetch($path, $queryParameters = [])
    {
        $url = $this->api->baseUrl . $path;
        $response = $this->api->client->getRequest($url, $queryParameters);

        return $response->toArray();
    }

    /**
     * @param string $path
     * @param array $bodyParameters
     *
     * @return array
     */
    protected function post($path, $bodyParameters = []): array
    {
        $url = $this->api->baseUrl . $path;
        $response = $this->api->client->getRequestPOST($url, $bodyParameters);

        return $response->toArray();
    }

    /**
     * @param array $data
     * @param string $class
     * 
     * @return mixed
     */
    protected function denormalize($data, $class)
    {
        return $this->api->serializer->denormalize($data, $class);
    }
}