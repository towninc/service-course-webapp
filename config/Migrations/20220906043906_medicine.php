<?php
use Migrations\AbstractMigration;

class Medicine extends AbstractMigration
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
        $table = $this->table('medicines');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('location', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('location_detail', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('tel', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('founder', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('latitude', 'float', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('longitude', 'float', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();
    }

    public function down()
    {
      $table = $this->table('medicines');
      $table->changeColumn('latitude', 'float', [
        'default' => null,
        'null' => true,
    ]);
    $table->chabgeColumn('longitude', 'float', [
        'default' => null,
        'null' => true,
    ]);    
      $table->update();
    }
}
