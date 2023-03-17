<?php

namespace neyric\Qonto\Model;

use Cassandra\Date;
use neyric\Qonto\Utils\DateUtils;

/**
 * Class TransactionFilterBuilder
 * @package neyric\Qonto\Model
 * @author MeilleursBiens
 */
class TransactionFilterBuilder
{

    public $filters = [
        "with_attachments" => false
    ];

    /**
     * @return TransactionFilterBuilder
     */
    public static function create(){
        return new TransactionFilterBuilder();
    }

    /**
     * Filter by transaction status.
     *
     * @param string $status (pending, reversed, declined, completed)
     * @throws \Exception Status must be (pending, reversed, declined, completed)
     * @see TransactionStatus
     */
    public function status(string $status): TransactionFilterBuilder
    {
        if(!in_array($status, ["pending", "reversed", "declined", "completed"])) throw new \Exception("Status must be (pending, reversed, declined, completed)");

        array_push($this->filters, [
            "status" => $status
        ]);

        return $this;
    }

    /**
     * Filter by transaction side.
     *
     * @param string $side (debit, credit)
     * @throws \Exception Side must be (debit, credit)
     * @see TransactionSide
     */
    public function side(string $side): TransactionFilterBuilder
    {
        if(!in_array($side, ["debit", "credit"])) throw new \Exception("Side must be (debit, credit)");

        array_push($this->filters, [
            "side" => $side
        ]);

        return $this;
    }

    /**
     * Add attachment to the transactions list
     */
    public function attachments(): TransactionFilterBuilder
    {
        array_push($this->filters, [
            "with_attachments" => true
        ]);

        return $this;
    }

    /**
     * Filter by updated date of the transaction
     * Format : ISO8601
     *
     * @throws \Exception The date must be formated in ISO8601 format !
     */
    public function updatedAtFrom(string $date): TransactionFilterBuilder
    {
        if(!DateUtils::assertISO8601Date($date)) throw new \Exception("The date must be formated in ISO8601 format !");

        array_push($this->filters, [
            "updated_at_from" => $date
        ]);

        return $this;
    }

    /**
     * Filter by updated date of the transaction
     * Format : ISO8601
     *
     * @throws \Exception The date must be formated in ISO8601 format !
     */
    public function updatedAtTo(string $date): TransactionFilterBuilder
    {
        if(!DateUtils::assertISO8601Date($date)) throw new \Exception("The date must be formated in ISO8601 format !");

        array_push($this->filters, [
            "updated_at_to" => $date
        ]);

        return $this;
    }

    /**
     * Filter by updated date of the transaction
     * Format : ISO8601
     *
     * @throws \Exception The date must be formated in ISO8601 format !
     */
    public function settledAtFrom(string $date): TransactionFilterBuilder
    {
        if(!DateUtils::assertISO8601Date($date)) throw new \Exception("The date must be formated in ISO8601 format !");

        array_push($this->filters, [
            "settled_at_from" => $date
        ]);

        return $this;
    }

    /**
     * Filter by updated date of the transaction
     * Format : ISO8601
     *
     * @throws \Exception The date must be formated in ISO8601 format !
     */
    public function settledAtTo(string $date): TransactionFilterBuilder
    {
        if(!DateUtils::assertISO8601Date($date)) throw new \Exception("The date must be formated in ISO8601 format !");

        array_push($this->filters, [
            "settled_at_to" => $date
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