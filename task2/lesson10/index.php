<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 01.12.18
 * Time: 14:59
 */
abstract class User{
    public $name;
    public $status;

    abstract public function getStatus();
}

class Admin extends User
{
    public function getStatus(){
        echo 'Admin';
    }
}
//$user2 = new User;
$user1 = new Admin;
$user1->getStatus();