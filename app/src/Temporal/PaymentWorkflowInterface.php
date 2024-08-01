<?php

declare(strict_types=1);

namespace App\Temporal;

use Temporal\Workflow\WorkflowInterface;
use Temporal\Workflow\WorkflowMethod;

#[WorkflowInterface]
interface PaymentWorkflowInterface
{
    #[WorkflowMethod(name: 'paymentWorkflow')]
    public function start(int $id);
}
