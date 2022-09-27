<?php
use Migrations\AbstractSeed;

/**
 * Sanctuaries seed.
 */
class SanctuariesSeed extends AbstractSeed
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
        // CSV から配列に変換
        // (定数 CONFIG は /config/paths.php で定義されています)
        $file = new SplFileObject(CONFIG . DS . 'SeedsCSV' . DS . 'Sanctuaries.csv');
        $file->setFlags(SplFileObject::READ_CSV);
   

        // insert() 用のデータ作成
        // (カラム数が合わない場合はスキップ)
        foreach ($file as $row) {

            list($id, $title, $number, $place, $prefecture, $address, $lat, $lng) = $row;
            $data[] = [
                'title' => $title,
                'number' => $number,
                'place' => $place,
                'prefecture' => $prefecture,
                'address' => $address,
                'lat' => $lat,
                'lng' => $lng,
            ];
         
        }
        $table = $this->table('sanctuaries');
        $table->insert($data)->save();
    }
}