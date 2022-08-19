<?php

class HogeController extends AppController {

    public function ajaxTest()
    {
        //CakePHPのレンダー機能を無効化する
        $this->autoRender = false;
        // $this->request->is('ajax') でAjax通信か判定する
        if ($this->request->is('ajax')) {
            $post_data = $this->request->getData();
            $ajax_data= $post_data['data'];
            return " ajaxで受信したデータ:".$ajax_data['name'];
        }
    }
}

?>