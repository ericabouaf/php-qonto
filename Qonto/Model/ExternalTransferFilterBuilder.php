<?php

namespace neyric\Qonto\Model;

use Cassandra\Date;
use neyric\Qonto\Utils\DateUtils;

/**
 * Class ExternalTransferFilterBuilder
 * @package neyric\Qonto\Model
 * @author MeilleursBiens
 */
class ExternalTransferFilterBuilder
{

    public $filters = [
        "with_attachments" => false
    ];

    /**
     * @return ExternalTransferFilterBuilder
     */
    public static function create(){
        return new ExternalTransferFilterBuilder();
    }

    /**
     * Filter by external transfer status.
     *
     * @param string $status (pending, processing, canceled, declined, settled)
     * @throws \Exception Status must be (pending, processing, canceled, declined, settled)
     * @see ExternalTransferStatus
     */
    public function status(string $status): ExternalTransferFilterBuilder
    {
        if(!in_array($status, ["pending", "processing", "canceled", "declined", "settled"])) throw new \Exception("Status must be (pending, processing, canceled, declined, settled)");

        array_push($this->filters, [
            "status" => $status
        ]);

        return $this;
    }

    /**
     * Add attachment to the transactions list
     */
    public function beneficary(array $beneficacy_ids): ExternalTransferFilterBuilder
    {
        array_push($this->filters, [
            "beneficacy_ids" => $beneficacy_ids
        ]);

        return $this;
    }

    /**
     * Filter by updated date of the external transfer
     * Format : ISO8601
     *
     * @throws \Exception The date must be formated in ISO8601 format !
     */
    public function updatedAtFrom(string $date): ExternalTransferFilterBuilder
    {
        if(!DateUtils::assertISO8601Date($date)) throw new \Exception("The date must be formated in ISO8601 format !");

        array_push($this->filters, [
            "updated_at_from" => $date
        ]);

        return $this;
    }

    /**
     * Filter by updated date of the external transfer
     * Format : ISO8601
     *
     * @throws \Exception The date must be formated in ISO8601 format !
     */
    public function updatedAtTo(string $date): ExternalTransferFilterBuilder
    {
        if(!DateUtils::assertISO8601Date($date)) throw new \Exception("The date must be formated in ISO8601 format !");

        array_push($this->filters, [
            "updated_at_to" => $date
        ]);

        return $this;
    }

    /**
     * Filter by updated date of the external transfer
     * Format : YYYY-MM-DD
     * Ex: 2019-01-10
     */
    public function scheduledAtFrom(string $date): ExternalTransferFilterBuilder
    {
        array_push($this->filters, [
            "scheduled_date_from" => $date
        ]);

        return $this;
    }

    /**
     * Filter by updated date of the external transfer
     * Format : YYYY-MM-DD
     * Ex: 2019-01-10
     */
    public function scheduledAtTo(string $date): ExternalTransferFilterBuilder
    {
        array_push($this->filters, [
            "scheduled_date_to" => $date
        ]);

        return $this;
    }

    // -----------------------------

    /**
     * Build the filter query string.
     *
     * @return string Query http string
     */
    public function buildQueryString(): string
    {
        return http_build_query($this->filters);
    }

    /**
     * Get the filters array.
     *
     * @return array Filters array
     */
    public function getFiltersArray(): array
    {
        return $this->filters;
    }
}