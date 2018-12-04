<?php
namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{
    //public $layout = 'main';
    public function indexAction()
    {
        //App::$app->getList();
        $model = new Main;
        \R::fancyDebug(true);
        $posts = App::$app->cache->get('posts');
        if(!$posts){
            $posts = \R::findAll('posts');
            App::$app->cache->set('posts', $posts, 3600*24);
        }



        echo date('Y-m-d H:i', time());
        echo '<br>';
        echo date('Y-m-d H:i', 1544007123);
        $post = \R::findOne('posts', 'id = 1');
        //debug($post);
        $menu = $this->menu;

        //$posts = $model->findAll();
        //$data = $model->findBySql("SELECT * FROM {$model->table} WHERE title LIKE ?", ['%tit%']);
        //$data = $model->findLike('tit', 'title');
        // debug($data);
        //$post = $model->findOne('NULL', 'title');
        //debug($post);

        //  $res = $model->query("CREATE TABLE posts SELECT * FROM fw.post");
        // var_dump($res);
        //$this->layout = 'default';
        /* $name = 'Andrey';
         $colors = [
             'white' => 'white',
             'black' => 'black'
         ];*/
        $title = 'PAGE TITLE';
        //$this->setMeta('Main page', 'Description', 'Keywords');
        $this->setMeta($post->title, $post->description, $post->keywords);
        $meta =$this->meta;
        //Создать массив, содержащий названия переменных и их значения
        $this->set(compact('title', 'posts', 'menu', 'meta'));
    }

    public function testAction()
    {
        debug($this->route);
        $this->layout = 'test';
    }
}