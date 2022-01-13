<?php

namespace neyric\Qonto;

use neyric\Qonto\ApiResource\ApiExternalTransfers;
use neyric\Qonto\Core\ApiClient;
use neyric\Qonto\Core\ApiSerializer;

use neyric\Qonto\ApiResource\ApiAttachments;
use neyric\Qonto\ApiResource\ApiLabels;
use neyric\Qonto\ApiResource\ApiMemberships;
use neyric\Qonto\ApiResource\ApiOrganizations;
use neyric\Qonto\ApiResource\ApiTransactions;

class QontoApi
{
    public $login;

    public $secretKey;

    public $baseUrl;

    /**
     * @var ApiClient
     */
    public $client;

    /**
     * @var ApiSerializer
     */
    public $serializer;

    /**
     * @var ApiAttachments
     */
    public $Attachments;

    /**
     * @var ApiLabels
     */
    public $Labels;

    /**
     * @var ApiMemberships
     */
    public $Memberships;

    /**
     * @var ApiOrganizations
     */
    public $Organizations;

    /**
     * @var ApiTransactions
     */
    public $Transactions;

    /**
     * @var ApiExternalTransfers
     */
    public $ExternalTransers;


    public function __construct($login, $secretKey, $baseUrl = 'https://thirdparty.qonto.com/v2') {
        $this->login  = $login;
        $this->secretKey = $secretKey;
        $this->baseUrl = $baseUrl;

        // utils for ApiResource (hosted on main Api object so they 
        // are instantiated only once, and not once per resource)
        $this->client = new ApiClient($login, $secretKey, $baseUrl);
        $this->serializer = new ApiSerializer();

        // Api resources
        $this->Attachments = new ApiAttachments($this);
        $this->Labels = new ApiLabels($this);
        $this->Memberships = new ApiMemberships($this);
        $this->Organizations = new ApiOrganizations($this);
        $this->Transactions = new ApiTransactions($this);
        $this->ExternalTransers = new ApiExternalTransfers($this);
    }

}
