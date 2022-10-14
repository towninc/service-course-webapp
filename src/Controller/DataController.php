<?php
namespace App\Controller;
 
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
 
class DataController extends AppController
{
 
  public function add(){
    $data = $this->request->data('request');
    $connection = ConnectionManager::get('default');
    $connection->insert('data', [ 'text' => $data ]);
 
  }
  public function index()
  {
    $this->set('ajax_name','send_data.js');
  }
}