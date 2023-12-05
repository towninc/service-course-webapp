<?php
use Migrations\AbstractMigration;

class Hotels extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('hotels');

        $table->addColumn('name', 'string', [
            'limit' => 255,
            'null' => true,
            'default' => null
        ]);
        $table->addColumn('address', 'string', [
            'limit' => 255,
            'null' => true,
            'default' => null
        ]);
        $table->addColumn('phone_number', 'string', [
            'limit' => 15,
            'null' => true,
            'default' => null
        ]);
        $table->addColumn('url', 'string', [
            'limit' => 255,
            'null' => true,
            'default' => null
        ]);
        $table->addColumn('latitude', 'float', [
            'null' => true,
            'default' => null
        ]);
        $table->addColumn('longitude', 'float', [
            'null' => true,
            'default' => null
        ]);
        

        $table->create();
    }
}