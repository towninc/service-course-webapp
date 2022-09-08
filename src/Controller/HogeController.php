<?php
namespace App\Controller;

use App\Controller\AppController;

class HogeController extends AppController {

    public function ajaxTest()
    {
        $this->autoRender = false;

        //if ($this->request->is('ajax')) {
            $post_data = $this->request->getData();
            $ajax_data= $post_data['data'];
            return " ajaxで受信したデータ:".$ajax_data['name'];
       //}
    }
}
?>