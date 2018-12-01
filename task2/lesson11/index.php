<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 01.12.18
 * Time: 15:04
 */
interface FirstInterface{
    public function getName();
}
interface SecondInterface{
    public function getStatus();
}
interface ThirdInterface extends FirstInterface, SecondInterface{

}

class Test implements FirstInterface, SecondInterface{
    public $name = 'Alexey';
    public $status = 'Admin';

    public function getName(){
        echo $this->name;
    }

    public function getStatus(){
        echo $this->status;
    }
}

$user1 = new Test;
$user1->getStatus();
$user1->getName();