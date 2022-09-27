<?php
use Migrations\AbstractMigration;

class CreateSanctuaries extends AbstractMigration
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
        $table = $this->table('sanctuaries');
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('number', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('place', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('prefecture', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('address', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('lat', 'double', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('lng', 'double', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}