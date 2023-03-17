<?php

namespace neyric\Qonto\ApiResource;

use neyric\Qonto\Core\ApiResource;
use neyric\Qonto\Model\ExternalTransfer;
use neyric\Qonto\Model\ExternalTransferBuilder;
use neyric\Qonto\Model\ExternalTransferCollection;
use neyric\Qonto\Model\ExternalTransferFilterBuilder;
use neyric\Qonto\Model\TransactionCollection;
use neyric\Qonto\Model\TransactionFilterBuilder;

/**
 * Class ApiExternalTransfers
 * @package neyric\Qonto\ApiResource
 * @author MeilleursBiens
 * @url https://api-doc.qonto.com/docs/business-api/b3A6MjM0MjQzNTE-list-external-transfers
 */
class ApiExternalTransfers extends ApiResource
{

    /**
     * Retrieve a list of external transfers.
     *
     * @return ExternalTransferCollection
     */
    public function list(): ExternalTransferCollection
    {
        $data = $this->fetch('/external_transfers');

        return $this->denormalize($data, ExternalTransferCollection::class);
    }

    /**
     * Retrieve a list of external transfers with filters.
     *
     * @param ExternalTransferFilterBuilder $externalTransferFilterBuilder
     * @return ExternalTransferCollection
     */
    public function listFilter(ExternalTransferFilterBuilder $externalTransferFilterBuilder): ExternalTransferCollection
    {
        $filtersArray = $externalTransferFilterBuilder->getFiltersArray();

        $data = $this->fetch('/external_transfers', $filtersArray);

        return $this->denormalize($data, ExternalTransferCollection::class);
    }

    /**
     * Create an external transfer.
     *
     * @param ExternalTransferBuilder $externalTransferBuilder
     * @return ExternalTransfer
     */
    public function create(ExternalTransferBuilder $externalTransferBuilder): ExternalTransfer
    {
        $externalTransferArray = $externalTransferBuilder->build();

        $data = $this->post('/external_transfers', $externalTransferArray);

        return $this->denormalize($data, ExternalTransfer::class);
    }

}