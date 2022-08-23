<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

class AddShell extends Shell
{
    public function main()
    {
        $f = fopen("../slib.csv", "r");
        /*echo "<table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>category</th>
            <th>address</th>
            <th>latitude</th>
            <th>longitude</th>
        </tr>";*/

        while($line = fgetcsv($f)) {
            echo "<tr>";
            $articlesTable = TableRegistry::getTableLocator()->get('Libraries');
            $article = $articlesTable->newEntity();
            //echo ($articlesTable);
            for ($i=0;$i<count($line);$i++) {
                //echo "<td>" . $line[$i] . "</td>";
                switch($i){
                case 0:{$article->id=$line[$i];/*echo 0;*/}break;
                    case 1:$article->name=$line[$i];break;
                    case 2:$article->category=$line[$i];break;
                    case 3:$article->address=$line[$i];break;
                    case 4:$article->latitude=$line[$i];break;
                    case 5:$article->longitude=$line[$i];break;
                }
                
                
                /*if($articlesTable->save($article)){
                    echo $article->name;
                }*/
            }
            echo $article->id;
            if($articlesTable->save($article)){
                    echo $article->id;
            }
            
            echo "</tr>";
        }
        echo "</table>";
        
        
        fclose($f);
    }

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('libraries');
    }

    public function show()
    {
        if (empty($this->args[0])) {
            // CakePHP 3.2 より前なら error() を利用
            return $this->abort('Please enter a username.');
        }
        $user = $this->Users->findByUsername($this->args[0])->first();
        $this->out(print_r($user, true));
    }
}