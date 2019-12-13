<?php

namespace neyric\Qonto\ApiResource;

use neyric\Qonto\Core\ApiResource;
use neyric\Qonto\Model\Organization;
use neyric\Qonto\Model\OrganizationResponse;

class ApiOrganizations extends ApiResource
{

    /**
     * @param string $organizationId
     * 
     * @return Organization
     */
    public function get($organizationId)
    {
        $data = $this->fetch('/organizations/' . $organizationId);
        $organizationResponse = $this->denormalize($data, OrganizationResponse::class);
        return $organizationResponse->organization;
    }

}