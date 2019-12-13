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
        // TODO: optional filters (Cf https://api-doc.qonto.eu/2.0/transactions/list-transactions)

        $data = $this->fetch('/transactions', [
            'slug' => $slug,
            'iban' => $iban,
        ]);

        return $this->denormalize($data, TransactionCollection::class);
    }

}