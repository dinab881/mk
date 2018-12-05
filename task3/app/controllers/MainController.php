<?php
namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\core\base\View;

class MainController extends AppController
{
    //public $layout = 'main';
    public function indexAction()
    {
        // create a log channel

        $model = new Main;
        //\R::fancyDebug(true);
        //trigger_error('E_USER_ERROR', E_USER_ERROR);
        //echo $tes;
        $posts = \R::findAll('posts');
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
        //$this->setMeta($post->title, $post->description, $post->keywords);
        //$meta = $this->meta;
        //Создать массив, содержащий названия переменных и их значения
        View::setMeta('Main page', 'Page description', 'Keywords');
        $this->set(compact('title', 'posts', 'menu', 'meta'));
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            $model = new Main();

            //$data = ['answer' => 'Response from server', 'code' => 200];
           // echo json_encode($data);
           $post = \R::findOne('posts', "id = {$_POST['id']}");
            /*
             * Для каждого из переданного параметров, функция compact() ищет переменную
             * с указанным именем в текущей таблице символов и добавляет их в выводимый массив так,
             * что имя переменной становится ключом, а содержимое переменной становится значением этого ключа
             * она обратна функции extract()
             *
             * */
           $this->loadView('_test', compact('post'));
            die;
        }
        echo 222;
        //$this->layout = false;
    }
}