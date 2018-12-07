<?php
namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;

class MainController extends AppController
{
    //public $layout = 'main';
    public function indexAction()
    {
        // create a log channel

        $lang = App::$app->getProperty('lang')['code'];
        $model = new Main;
        $total = \R::count('posts', 'lang_code = ?', [$lang]);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 2;
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();


        $posts = \R::findAll('posts', "lang_code = ? LIMIT $start, $perpage", [$lang]);

        //$menu = $this->menu;
        View::setMeta('Blog :: Main page', 'Page description', 'Keywords');
        $this->set(compact('title', 'posts', 'meta', 'pagination', 'total'));
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