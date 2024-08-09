<?php

declare(strict_types=1);

namespace Application\Payment\Workflows;

use Domain\Payment\PaymentActivityInterface;
use Domain\Payment\PaymentWorkflowInterface;
use Generator;
use Temporal\Activity\ActivityOptions;
use Temporal\Workflow;

class PaymentWorkflow implements PaymentWorkflowInterface
{
    #[Workflow\WorkflowMethod(name: 'paymentWorkflow')]
    public function start(int $id): Generator
    {
        $activity = Workflow::newActivityStub(
            PaymentActivityInterface::class,
            ActivityOptions::new()->withStartToCloseTimeout(10)
        );

        return yield $activity->checkStatus($id);
    }
}
