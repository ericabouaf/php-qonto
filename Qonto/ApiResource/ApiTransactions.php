<?php

namespace neyric\Qonto\ApiResource;

use neyric\Qonto\Core\ApiResource;
use neyric\Qonto\Model\TransactionCollection;
use neyric\Qonto\Model\TransactionFilterBuilder;

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
        $data = $this->fetch('/transactions', [
            'slug' => $slug,
            'iban' => $iban,
        ]);

        return $this->denormalize($data, TransactionCollection::class);
    }

    /**
     * @param string $slug
     * @param string $iban
     *
     * @return TransactionCollection
     */
    public function listFilter(string $slug, string $iban, TransactionFilterBuilder $transactionFilterBuilder)
    {
        $queryBaseParameters = [
            'slug' => $slug,
            'iban' => $iban,
        ];

        $filtersArray = $transactionFilterBuilder->getFiltersArray();

        $data = $this->fetch('/transactions', array_merge($queryBaseParameters, $filtersArray));

        return $this->denormalize($data, TransactionCollection::class);
    }



}