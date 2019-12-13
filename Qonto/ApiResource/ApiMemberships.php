<?php

namespace neyric\Qonto\ApiResource;

use neyric\Qonto\Core\ApiResource;
use neyric\Qonto\Model\MembershipCollection;

class ApiMemberships extends ApiResource
{

    /**
     * @return MembershipCollection
     */
    public function list()
    {
        $data = $this->fetch('/memberships');
        return $this->denormalize($data, MembershipCollection::class);
    }

}