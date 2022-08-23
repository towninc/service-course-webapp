<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class HogeController extends AppController {

public function ajaxTest(){
    $this->autoRender = false;
    $this->loadComponent('RequestHandler');
     // $this->request->is('ajax') でAjax通信か判定する
    //if($this->request->is('ajax')) {
      // $format = strtolower($format);
       //$this->viewBuilder()->className('Json'[$format]);
       $articles = TableRegistry::getTableLocator()->get('Libraries');

        $libraries= $articles->find();
       /* var_dump($libraries);
        exit;*/
        header('Content-type: application/json');
        echo json_encode($libraries);
        /*foreach($libraries as $libraries){
            $data=[$libraries->name,$libraries->latitude,$libraries->longitude];
            echo json_encode($data);  
        }*/
        $this->set('_jsonOptions', JSON_FORCE_OBJECT);
        exit;


       // $this->set(compact('libraries'));
       // $this->set('libraries', 'qqqqq');
       // $this->set('_serialize', ['libraries']);
      //  $this->set('errors', '{aaaaa}');
      //  $this->set('_jsonOptions', JSON_FORCE_OBJECT);
       // $this->set('_serialize', ['errors']);
        
        /* $this->set('libraries', $this->paginate());
         // JsonView がシリアライズするべきビュー変数を指定する
         $this->set('_serialize', 'libraries');
         $this->set(compact('name', 'latitude','longitude'));
         $this->set('_serialize', ['name', 'latitude','longitude']);
         */
      //  header('Content-type: application/json');
/*
        

      */   
         
       
       // echo json_encode($libraries);

         

         //return $userData;
     //}
 }
}
