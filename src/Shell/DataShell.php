<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

class DataShell extends Shell
{
    public function main()
    {
        $f = fopen("/var/www/html/app/src/Shell/shiro02.csv", "r");
        
        echo'<table border="1">
            <tr>
            <th>ID</th>
            <th>名称</th>
            <th>北緯</th>
            <th>東経</th>
            <th>所在地</th>
            </tr>';
        
        while($data=fgetcsv($f)){
            echo '<tr>';
            for($i=0; $i<count($data); $i++){
                echo '<td>'.$data[$i].'</td>';    
            }
            echo '</tr>  ';

            // Prior to 3.6 use TableRegistry::get('Articles')
            $UsersTable = TableRegistry::getTableLocator()->get('Users');
            $user = $UsersTable->newEntity();
            
            $user->place = $data[1];
            $user->north_latitude = $data[2];
            $user->east_longtitude = $data[3];
            $user->address = $data[4];

            if ($UsersTable->save($user)) {
                // $article エンティティーは今や id を持っています
                $id = $user->id;
            }
        }

        echo '<table>';

        fclose($f);
    }
}

?>