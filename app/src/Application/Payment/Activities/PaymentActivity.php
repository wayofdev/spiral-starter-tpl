<?php

declare(strict_types=1);

namespace Application\Payment\Activities;

use Domain\Payment\PaymentActivityInterface;
use Spiral\Logger\LogsInterface;
use Temporal\Activity\ActivityMethod;

class PaymentActivity implements PaymentActivityInterface
{
    public function __construct(private readonly LogsInterface $logger)
    {
    }

    #[ActivityMethod(name: 'paymentStatus')]
    public function checkStatus(int $paymentId): bool
    {
        $this->logger->getLogger()->debug('Payment status checked', ['paymentId' => $paymentId]);

        return true;
    }
}
