<?php
use Migrations\AbstractSeed;

/**
 * Hotels seed.
 */
class HotelsSeed extends AbstractSeed
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
        $filepath = 'hotel_ichiran201812.csv';
        $file = fopen($filepath, 'r');
        $header = fgetcsv($file);
        $table = $this->table('hotels');

        while (($row = fgetcsv($file)) !== false) {
            // データ整形
            $row= array_slice($row, 4, 6);
            $data = [
                'name' => $row[0],  
                'address' => $row[1],
                'phone_number' => $row[2],
                'url' => $row[3],
                'latitude' => $row[4],
                'longitude' => $row[5],
            ];

            $table->insert($data)->save();
        }

        fclose($file);
    }
}