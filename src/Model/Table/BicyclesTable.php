<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;

class BicyclesTable extends Table
{

    public function initialize(array $config)
    {
        $this->setTable('bicycle');
    }

}
?>