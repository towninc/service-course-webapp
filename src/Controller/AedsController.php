<?php
namespace App\Controller;
use App\Controller\AppController;

class AedsController extends AppController{
    public function index()
    {
        $this->viewBuilder()->autoLayout(false);
        $allAedData = $this->Aed->find('all');
        $this->set('data', $allAedData);
    }

    // 新しいデータをデータベースに追加する
    public function add(){
        // $savedata['プロパティ'] = '追加するデータ'
        $aedsTable = TableRegistry::get('Aeds');
        $aeds = $aedsTable->newEntity($savedata);
        $aedsTable->save($aeds);
    }
}