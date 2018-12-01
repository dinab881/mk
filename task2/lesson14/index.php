<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 01.12.18
 * Time: 15:33
 */
namespace newClass\Home;
class User{
    public $name;
    public $password;
    public $email;
    public $city;


    function __construct($name, $password, $email, $city)
    {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->city = $city;
    }

    function getInfo(){
        $information = "{$this->name}"."{$this->password}"."{$this->email}"."{$this->city}";
        return $information;
    }
}

$user1 = new User("Alex ", "123456 ", "alexey@gmail.com", "Kiev ");
echo  $user1->getInfo();

namespace newClass\Home2;
{

}