<?php
namespace app\controllers;
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 02.12.18
 * Time: 22:06
 */
class PostsController extends AppController
{


    public function indexAction()
    {
        echo 'Posts :: index';
    }

    public function testAction()
    {

        echo 'Posts :: test';
    }
}