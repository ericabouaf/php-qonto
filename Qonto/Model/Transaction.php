<?php

namespace neyric\Qonto\Model;

class Transaction
{
    public $transaction_id;

    public $amount;

    public $amount_cents;

    /**
     * @var array
     */
    public $attachment_ids;

    /**
     * @var \DateTime
     */
    public $settled_at;

    /**
     * @var \DateTime
     */
    public $emitted_at;

    /**
     * @var \DateTime
     */
    public $updated_at;

    /**
     * @var array
     */
    public $label_ids;


    public $side;

    // ...

    public $label;


    // TODO...
}