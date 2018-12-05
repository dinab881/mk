<?php

namespace app\controllers\admin;
use fw\core\base\View;

class UserController extends AppController
{
    public $layout = 'default';

    public function indexAction()
    {
        View::setMeta('Admin area :: Main page', 'Description of admin area', 'Admin keywords');
        $test = "";
        $data = ['test', 3];

        $this->set([
            'test' => $test,
            'data' => $data
        ]);
    }

    public function testAction()
    {
        $this->layout = 'admin';
        echo __METHOD__;
    }
}