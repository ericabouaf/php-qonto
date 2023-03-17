<?php

namespace neyric\Qonto\Model;

/**
 * Class ExternalTransfer
 * @package neyric\Qonto\Model
 * @author MeilleursBiens
 */
class ExternalTransfer
{
    /**
     * ID of the external transfer (e.g: 497f6eca-6276-4993-bfeb-53cbbbba6f08)
     *
     * @var string
     */
    public $id;

    /**
     * Slug of the external transfer
     *
     * @var string
     */
    public $slug;

    /**
     * Can be any of the organization's bank accounts. IBAN formatted ISO 13616
     *
     * @var string
     */
    public $debit_iban;

    /**
     * The amount that will be debited from your Qonto account.
     *
     * @var float
     */
    public $debit_amount;

    /**
     * The amount that will be debited from you Qonto account in an integer format.
     *
     * @var int
     */
    public $debit_amount_cents;

    /**
     * Must be EUR. ISO 4217 formatted.
     *
     * @var string
     */
    public $debit_currency;

    /**
     * ID of the transfer initiator.
     *
     * @var string
     */
    public $initiator_id;

    /**
     * ID of the transfer beneficiary.
     *
     * @var string
     */
    public $beneficiary_id;

    /**
     *  The amount that the beneficiary will receive.
     *
     * @var float
     */
    public $credit_amount;

    /**
     * The amount that the beneficiary will receive in an integer format.
     *
     * @var int
     */
    public $credit_amount_cents;

    /**
     * Equals debit currency if issued in the SEPA network (only supported currencies).
     * ISO 4217 format.
     * Allowed value for international transfers: AUD, CAD, CHF, CNY, CZK, DKK, GBP, HKD, HRK, HUF, ILS, JPY, NOK, NZD, PLN, RON, SEK, USD
     *
     * @var string
     */
    public $credit_currency;

    /**
     * Foreign exchange rate applied to your transaction, formatted with 4 digits after comma.
     * (Ex: 1,1082)
     *
     * @var string
     */
    public $rate_applied;

    /**
     * Purpose for the external transfer.
     *
     * @var string
     */
    public $payment_purpose;

    /**
     * ISO 4217 currency code of the bank account (can be any currency)
     *
     * @var string
     */
    public $local_currency;

    /**
     * Reference of the external transfer
     *
     * @var string
     */
    public $reference;

    /**
     * Declined reason of the external transfer
     *
     * @var string
     */
    public $declined_reason;

    /**
     * Status of the external transfer (ex: pending, processing, canceled, declined, settled)
     * @see https://api-doc.qonto.com/docs/business-api/b3A6MjM0MjQzNTE-list-external-transfers
     *
     * @var string
     */
    public $status;

    /**
     * YYYY-MM-DD, indicates when the external transfer was scheduled to be sent by Qonto.
     *
     * @var \DateTime
     */
    public $scheduled_date;

    /**
     * UTC, the time at which the external transfer was first recorded.
     *
     * @var \DateTime
     */
    public $created_at;

    /**
     * UTC, when the external transfer has been started to be processed by Qonto.
     *
     * @var \DateTime
     */
    public $processed_at;

    /**
     * UTC, when the external transfer is in its final state, either settled or declined.
     *
     * @var \DateTime
     */
    public $completed_at;


    /**
     * ID of the transaction for this external transfer
     *
     * @var string
     */
    public $transaction_id;

}