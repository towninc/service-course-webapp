<?php

namespace App\Controller;

class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        // $articles と $comments を生成する何某かのコード

        // シリアライズする必要があるビュー変数をセットする
        $this->set(compact('articles', 'comments'));

        // JsonView がシリアライズするべきビュー変数を指定する
        $this->set('_serialize', ['articles', 'comments']);
    }
}

?>