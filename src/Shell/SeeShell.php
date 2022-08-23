<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;


class SeeShell extends Shell
{
    public function main()
    {
        $query=$articles->find('all');
        foreach ($query as $row) {
        }
        
        // all() の呼び出しはクエリーを実行し、結果セットを返す
        $results = $query->all();
        
        // 結果セットがあれば すべての行を取得できる
        $data = $results->toList();
        
        // クエリーからキーと値の配列への変換はクエリーを実行する
        $data = $query->toArray();
    }

    
}