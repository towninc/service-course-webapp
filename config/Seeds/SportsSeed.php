<?php
use Migrations\AbstractSeed;

/**
 * Sports seed.
 */
class SportsSeed extends AbstractSeed
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
        $f = fopen("sports_utf8.csv", "r");
        while($data = fgetcsv($f)){
            $mark_data[] = [
                'name' => $data[0],
                'address' => $data[1],
                'longitude' => $data[2],
                'latitude' => $data[3],
                'tel' => $data[4],
                'url'=> $data[5],
            ];
        }
        $table = $this->table('sports');
        for($length=0;$length<count($mark_data);++$length){
            $table->insert($mark_data[$length])->save();
        }
        fclose($f);
    }
}
