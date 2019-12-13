<?php

namespace neyric\Qonto\Model;

class TransactionStatus
{
    const PENDING = 'pending';
    const REVERSED = 'reversed';
    const DECLINED = 'declined';
    const COMPLETED = 'completed';
}