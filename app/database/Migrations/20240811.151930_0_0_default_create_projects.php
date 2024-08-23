<?php

declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefault598e656c4b9dfd42a08ea20f1179fd91 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('projects')
            ->addColumn('id', 'uuid', ['nullable' => false, 'defaultValue' => null, 'unique' => true, 'size' => 36])
            ->addColumn('name', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 255])
            ->addColumn('description', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 255])
            ->addColumn('created_at', 'datetime', ['nullable' => true, 'defaultValue' => null])
            ->addColumn('created_by', 'json', ['nullable' => true, 'defaultValue' => null])
            ->addColumn('updated_at', 'datetime', ['nullable' => true, 'defaultValue' => null])
            ->addColumn('updated_by', 'json', ['nullable' => true, 'defaultValue' => null])
            ->addColumn('deleted_at', 'datetime', ['nullable' => true, 'defaultValue' => null])
            ->addColumn('deleted_by', 'json', ['nullable' => true, 'defaultValue' => null])
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('projects')->drop();
    }
}
