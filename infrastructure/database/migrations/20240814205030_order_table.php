<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class OrderTable extends AbstractMigration
{

    public function up(): void
    {
        $this->table('orders', ['id' => 'id'])
            ->addColumn('id_user', 'integer', ['null' => false, 'signed' => false])
            ->addColumn('code', 'string', ['null' => false])
            ->addColumn('total_price', 'double', ['null' => false])
            ->addColumn('delivery_address', 'string', ['null' => false])
            ->addColumn('status', 'integer', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addColumn('deleted_at', 'datetime', ['null' => true])
            ->addForeignKey('id_user', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->create();
    }

    public function down(): void
    {
        $this->table('orders')
            ->dropForeignKey('id_user')
            ->drop()
            ->save();
    }
}
