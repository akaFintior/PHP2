<?php

use Phinx\Migration\AbstractMigration;

class CreateShopTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('products');
        $table->addColumn('name','text')
            ->addColumn('description', 'text')
            ->addColumn('price', 'float')
            ->create();

        $table = $this->table('basket');
        $table->addColumn('session_id', 'text')
            ->addColumn('product_id', 'integer')
            ->create();

        $table = $this->table('users');
        $table->addColumn('login', 'text')
            ->addColumn('pass', 'text')
            ->addColumn('hash', 'text')
            ->create();

        $table = $this->table('orders');
        $table->addColumn('name', 'text')
            ->addColumn('phone', 'text')
            ->addColumn('adress', 'text')
            ->addColumn('session_id','text')
            ->addColumn('is_processed', 'integer', ['default' => 0])
            ->create();
    }
}
