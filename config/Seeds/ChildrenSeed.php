<?php
use Migrations\AbstractSeed;
use Cake\Log\Log;
/**
 * Children seed.
 */
class ChildrenSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $f = fopen("teikihoiku_utf8.csv", "r");
        Log::debug($f);
        while($data = fgetcsv($f)){
            $mark_data[] = [
                'name' => $data[0],
                'address' => $data[2],
                'url'=> $data[3],
                'tel' => $data[4],
                'latitude' => $data[6],
                'longitude' => $data[5]
            ];
            Log::debug($mark_data);
        }
        $table = $this->table('childrens');
        for($length=0;$length<count($mark_data);++$length){
            $table->insert($mark_data[$length])->save();
        }
        fclose($f);
    }
}
