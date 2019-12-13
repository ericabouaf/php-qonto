<?php

namespace neyric\Qonto\Model;

class BankAccount
{
    public $slug;

    public $iban;

    public $bic;

    public $currency;

    public $balance;

    public $balance_cents;

    public $authorized_balance;

    public $authorized_balance_cents;
}