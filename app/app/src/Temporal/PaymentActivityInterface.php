<?php

declare(strict_types=1);

namespace App\Temporal;

use Temporal\Activity\ActivityInterface;
use Temporal\Activity\ActivityMethod;

#[ActivityInterface(prefix: 'paymentActivity.')]
interface PaymentActivityInterface
{
    #[ActivityMethod(name: 'paymentStatus')]
    public function checkStatus(int $paymentId): bool;
}
