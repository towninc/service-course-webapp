<?php
use Migrations\AbstractSeed;
use Cake\Log\Log;
/**
 * Medicine seed.
 */
class MedicineSeed extends AbstractSeed
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
        $f = fopen("tenpohanbai.csv", "r");
        while($data = fgetcsv($f)){
            // 読み込んだ結果を表示
            $mark_data[] = [
                'name' => $data[1],
                'location' => $data[2],
                'location_detail'=> $data[3],
                'tel' => $data[4],
                'founder' => $data[5],
                'latitude' => $data[8],
                'longitude' => $data[9]
            ];
            Log::debug($mark_data);
        }
        $table = $this->table('medicines');
        for($length=0;$length<count($mark_data);++$length){
            $table->insert($mark_data[$length])->save();
        }
        // test.csvを閉じます。
        fclose($f);
    }
}
