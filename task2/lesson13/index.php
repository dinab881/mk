<?php

/**
 * Created by PhpStorm.
 * User: dina
 * Date: 01.12.18
 * Time: 15:18
 */
class User
{
    private $name;
    private $city;
    private $id;

    function __construct($name, $city)
    {
        $this->name = $name;
        $this->city = $city;
    }

    function setId($id)
    {
        $this->id = $id;
    }


    public function __clone()
    {
        $this->id = 0;
    }


}

$user1 = new User('Alexey', 'Kiev');
$user1->setId(5662);
$user2 = clone $user1;
//var_dump($user1);
var_dump($user2);


class GetSet{
    private $number = 1;
    public function __get($name){
        echo "You get {$name}";
    }

    public function __set($name, $val){
        echo "You set {$name} to {$val}";
    }
}

$obj = new GetSet();
echo $obj->number;
echo $obj->number = 689;