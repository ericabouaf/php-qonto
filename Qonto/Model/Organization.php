<?php

namespace neyric\Qonto\Model;

class Organization
{
    public $slug;

    /**
     * @var BankAccount[]
     */
    public $bank_accounts;
}