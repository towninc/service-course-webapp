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
            // 読み込んだ結果を表示します。
            //Log::debug($data);
            $ooo[] = [
                'name' => $data[1],
                'location' => $data[2],
                'latitude' => $data[8],
                'longitude' => $data[9]
            ];
            Log::debug($ooo);
        }
        $table = $this->table('medicines');
        $table->insert($ooo[3])->save();

        // test.csvを閉じます。

        fclose($f);
        
    }
}
