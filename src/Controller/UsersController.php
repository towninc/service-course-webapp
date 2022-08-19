<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

class UsersController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $users = $this->Paginator->paginate($this->Users->find());
        $this->set(compact('users'));
    }
}