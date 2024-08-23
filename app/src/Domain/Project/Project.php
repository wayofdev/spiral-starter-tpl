<?php

declare(strict_types=1);

namespace Domain\Project;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\ORM\Entity\Behavior\Uuid\Uuid7;
use Domain\Auth\Contracts\AuditableEntity;
use Domain\Auth\HasSignatures;
use Domain\Auth\Signature;
use Domain\Project\Contracts\ProjectRepository;
use Domain\Project\Events\ProjectCreated;
use Domain\Shared\Events\Concerns\AggregatableRoot;
use EventSauce\EventSourcing\AggregateRoot;
use EventSauce\EventSourcing\AggregateRootId;

#[Entity(repository: ProjectRepository::class)]
#[Uuid7(field: 'id', column: 'id')]
class Project implements AggregateRoot, AuditableEntity
{
    use AggregatableRoot;
    use HasSignatures;

    #[Column(type: 'uuid', primary: true, typecast: [ProjectId::class, 'castValue'], unique: true)]
    private ProjectId $id;

    #[Column(type: 'string')]
    private string $name;

    #[Column(type: 'string')]
    private string $description;

    public function __construct(
        ProjectId $id,
        string $name,
        string $description,
        Signature $signature,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;

        $this->created = $signature;
        $this->updated = clone $signature;
        $this->deleted = Signature::empty();

        $this->recordThat(
            new ProjectCreated(
                $id,
                $name,
                $description,
                $signature
            )
        );
    }

    public function aggregateRootId(): AggregateRootId
    {
        return $this->id;
    }

    public function id(): ProjectId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }
}
