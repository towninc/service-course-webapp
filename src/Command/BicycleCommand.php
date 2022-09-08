<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\ORM\TableRegistry;
class BicycleCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $f = fopen("./Bicycles.csv", "r");
        $i = 0;
        while($data = fgetcsv($f)){   
            if(implode($data) != null  && $i != 0){
                debug($data);
            }
            $i++;
        }
        
        fclose($f);
    }
}

?>