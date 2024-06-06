<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableUsers extends AbstractMigration
{
    public function up(): void
    {
        $this->table('users', ['id' => 'id'])
            ->addColumn('name', 'string', ['null' => false])
            ->addColumn('email', 'string', ['null' => false])
            ->addColumn('phone', 'string', ['null' => true, 'default' => null])
            ->addColumn('cell_phone', 'string', ['null' => true, 'default' => null])
            ->addColumn('cpf', 'string', ['null' => true, 'default' => null])
            ->addColumn('role', 'integer', ['null' => false])
            ->addColumn('status', 'integer', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addColumn('deleted_at', 'datetime', ['null' => true])
            ->create();

            $this->table('users')
                ->addIndex(['email'], ['name' => 'email', 'unique' => true])
                ->save();
    }

    public function down(): void
    {
        $this->table('users')->drop()->save();
    }
}
