<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\ORM\TableRegistry;

class TestCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $i = 0;
        $f = fopen("./Bicycles.csv", "r");
        while($data = fgetcsv($f)){   
            if(implode($data) != null && $i != 0){
                $bicyclesTable = TableRegistry::getTableLocator()->get('Bicycles');
                $bicycle= $bicyclesTable->newEntity();

                $bicycle->name = $data[1];
                $bicycle->location = $data[2];
                $bicycle->latitude = $data[3];
                $bicycle->longitude = $data[4];
                $bicycle->utilization_time = $data[5];
                $bicycle->price_per_day = $data[6];
                $bicycle->phone_number = $data[7];
                $bicycle->capacity = $data[8];
                $bicycle->url = $data[9];

                if ($bicyclesTable->save($bicycle)) {
                    $id = $bicycle->id;
                }
            }
            $i++;
        }
        
        fclose($f);
    
    }
}