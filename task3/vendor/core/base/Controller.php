<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 03.12.18
 * Time: 0:41
 */

namespace vendor\core\base;


abstract class Controller
{
    public $route = [];
    public $view;
    public $layout;
    /**
     * user's data
     * @var array
     */
    public $vars = [];

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];

        //include APP."/views/{$route['controller']}/{$this->view}.php";
    }

    public function getView(){
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }


    public function set($vars){
        $this->vars = $vars;
    }


}