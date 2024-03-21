<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateProductsTable extends AbstractMigration
{
    public function up(): void
    {
        $this->table('products', ['id' => 'id'])
            ->addColumn('name', 'string', ['null' => false])
            ->addColumn('price', 'double', ['null' => false, 'default' => 0])
            ->addColumn('quantity', 'integer', ['null' => false, 'default' => 0])
            ->addColumn('slug', 'string', ['null' => false])
            ->addColumn('code', 'integer', ['null' => true, 'default' => null])
            ->addColumn('image', 'string', ['null' => true, 'default' => null])
            ->addColumn('created_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addColumn('deleted_at', 'datetime', ['null' => true])
            ->create();
    }

    public function down(): void
    {
        $this->table('products')->drop()->save();

    }
}
