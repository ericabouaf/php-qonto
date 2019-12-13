<?php

namespace neyric\Qonto\ApiResource;

use neyric\Qonto\Core\ApiResource;
use neyric\Qonto\Model\TransactionCollection;

class ApiTransactions extends ApiResource
{

    /**
     * @param string $slug
     * @param string $iban
     * 
     * @return TransactionCollection
     */
    public function list(string $slug, string $iban)
    {
        // TODO: optional filters
        // status
        // updated_at_from
        // updated_at_to
        // settled_at_from
        // settled_at_to
        // sort_by
        // current_page
        // per_page


        $data = $this->fetch('/transactions', [
            'slug' => $slug,
            'iban' => $iban,
        ]);

        return $this->denormalize($data, TransactionCollection::class);
    }

}