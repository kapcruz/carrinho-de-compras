<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class OrderTable extends AbstractMigration
{

    public function up(): void
    {
        $this->table('orders', ['id' => 'id'])
        ->addColumn('delivery_address', 'string', ['null' => false])
        ->addColumn('created_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('updated_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
        ->addColumn('deleted_at', 'datetime', ['null' => true])
        ->create();
    }

    public function down(): void
    {

    }
}
