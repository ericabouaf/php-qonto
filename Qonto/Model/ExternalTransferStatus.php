<?php

namespace neyric\Qonto\Model;

/**
 * Class ExternalTransferStatus
 * @package neyric\Qonto\Model
 * @author MeilleursBiens
 */
class ExternalTransferStatus
{
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const CANCELED = 'canceled';
    const DECLINED = 'declined';
    const SETTLED = 'settled';
}