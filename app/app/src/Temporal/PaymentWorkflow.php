<?php

declare(strict_types=1);

namespace App\Temporal;

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
