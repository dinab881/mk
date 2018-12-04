<?php
namespace app\controllers;
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 02.12.18
 * Time: 22:09
 */
class PostsNewController extends AppController
{
    public function indexAction()
    {
        echo 'PostsNew :: index';
    }
    public function testAction()
    {
        echo 'Posts :: test';
    }
    public function testPageAction()
    {
        echo 'Posts :: testPage';
    }

    /* some methods should be protected */
    public function before()
    {
        echo 'Posts :: before';
    }
}