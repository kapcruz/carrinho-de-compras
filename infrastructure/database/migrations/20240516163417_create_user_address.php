<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUserAddress extends AbstractMigration
{

    public function up(): void
    {
        $this->table('user_address', ['id' => 'id'])
            ->addColumn('city', 'string', ['null' => false])
            ->addColumn('state', 'string', ['null' => false])
            ->addColumn('district', 'string', ['null' => false])
            ->addColumn('zip_code', 'string', ['null' => false])
            ->addColumn('address', 'string', ['null' => false])
            ->addColumn('complement', 'string', ['null' => true])
            ->addColumn('number', 'string', ['null' => true])
            ->addColumn('reference', 'string', ['null' => true])
            ->addColumn('created_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addColumn('deleted_at', 'datetime', ['null' => true])
            ->create();
    }

    public function down(): void
    {
        $this->table('user_address')->drop()->save();
    }
}
