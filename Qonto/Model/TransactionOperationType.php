<?php

namespace neyric\Qonto\Model;

class TransactionOperationType
{
    const TRANSFER = 'transfer';
    const CARD = 'card';
    const DIRECT_DEBIT = 'direct_debit';
    const INCOME = 'income';
    const QONTO_FEE = 'qonto_fee';
    const CHEQUE = 'cheque';
}