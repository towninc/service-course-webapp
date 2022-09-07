<?php
use Cake\ORM\TableRegistry;
$row = 1;
// ファイルが存在しているかチェックする
if (($handle = fopen("/Users/develop19/Documents/service-course-webapp/{maeda}/facility.csv", "r")) !== FALSE) {
    // 1行ずつfgetcsv()関数を使って読み込む
    while (($data = fgetcsv($handle))) {
        $articlesTable = TableRegistry::getTableLocator()->get('');
        $article = $articlesTable->newEmptyEntity();

        // echo "${row}行目\n";
        // $row++;
        // foreach ($data as $value) {
        //     echo "「${value}」\n";
        // }
    }
    fclose($handle);
}