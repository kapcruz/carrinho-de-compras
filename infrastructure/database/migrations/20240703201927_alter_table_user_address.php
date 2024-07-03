<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AlterTableUserAddress extends AbstractMigration
{

    public function up(): void
    {
        $this->table('user_address')
            ->addColumn('id_user', 'integer', ['default' => null, 'null' => true, 'after' => 'id', 'signed' => false])
            ->addForeignKey('id_user', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
            ->save();
    }

    public function down(): void
    {
        $this->table('user_address')
        ->dropForeignKey('id_user')
        ->removeColumn('id_user')
        ->save();

    }

}
