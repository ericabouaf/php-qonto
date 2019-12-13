<?php

namespace neyric\Qonto\Model;

class Transaction
{
    /**
     * ID of the transaction (e.g: acme-corp-1111-1-transaction-123)
     *
     * @var string
     */
    public $transaction_id;

    /**
     * Amount of the transaction, in euros
     *
     * @var float
     */
    public $amount;

    /**
     * Amount of the transaction, in euro cents
     *
     * @var int
     */
    public $amount_cents;

    /**
     * List of attachments' id
     *
     * @var array
     */
    public $attachment_ids;

    /**
     * Amount in the local_currency
     *
     * @var float
     */
    public $local_amount;

    /**
     * Amount in cents of the local_currency
     *
     * @var int
     */
    public $local_amount_cents;

    /**
     * Allowed Values: debit, credit
     *
     * @var string
     */
    public $side;

    /**
     * Allowed Values: transfer, card, direct_debit, income, qonto_fee, cheque
     * 
     * @var string
     */
    public $operation_type;

    /**
     * ISO 4217 currency code of the bank account (can only be EUR, currently)
     * 
     * @var string
     */
    public $currency;

    /**
     * ISO 4217 currency code of the bank account (can be any currency)
     * 
     * @var string
     */
    public $local_currency;

    /**
     * Counterparty of the transaction (e.g: Amazon)
     *
     * @var string
     */
    public $label;

    /**
     * Date the transaction impacted the balance of the account
     * 
     * @var \DateTime
     */
    public $settled_at;

    /**
     * Date at which the transaction impacted the authorized balance of the account
     * 
     * @var \DateTime
     */
    public $emitted_at;

    /**
     * Date at which the transaction was last updated
     * 
     * @var \DateTime
     */
    public $updated_at;


    /**
     * Allowed Values: pending, reversed, declined, completed
     * 
     * @var string
     */
    public $status;

    /**
     * Memo added by the user on the transaction
     * 
     * @var string|null
     */
    public $note;

    /**
     * Message sent along income, transfer and direct_debit transactions
     * 
     * @var string|null
     */
    public $reference;

    /**
     * Amount of VAT filled in on the transaction, in euros
     * 
     * @var float|null
     */
    public $vat_amount;

    /**
     * Amount of VAT filled in on the transaction, in euro cents
     * 
     * @var int|null
     */
    public $vat_amount_cents;

    /**
     * Allowed Values: -1, 0, 2.1, 5.5, 10, 20
     * 
     * @var float|null
     */
    public $vat_rate;

    /**
     * ID of the membership who initiated the transaction
     * 
     * @var string|null
     */
    public $initiator_id;

    /**
     * List of labels' id
     * 
     * @var array|null
     */
    public $label_ids;

    /**
     * Indicates if the transaction's attachment was lost (default: false)
     * 
     * @var bool|null
     */
    public $attachment_lost;

    /**
     * Indicates if the transaction's attachment is required (default: true)
     * 
     * @var bool|null
     */
    public $attachment_required;
}