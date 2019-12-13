<?php

namespace neyric\Qonto\ApiResource;

use neyric\Qonto\Core\ApiResource;
use neyric\Qonto\Model\LabelCollection;

class ApiLabels extends ApiResource
{

    /**
     * @return LabelCollection
     */
    public function list()
    {
        $data = $this->fetch('/labels');
        return $this->denormalize($data, LabelCollection::class);
    }

}