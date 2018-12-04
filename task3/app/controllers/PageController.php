<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 03.12.18
 * Time: 10:11
 */

namespace app\controllers;


class PageController extends AppController
{
 public function viewAction(){
     debug($this->route);
     $menu = $this->menu;
     $title = 'PAGE TITLE';
     $this->set(compact('title', 'menu'));
 }
}