<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class FacilitiesTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('my_table');
    }
}