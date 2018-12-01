<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 01.12.18
 * Time: 13:41
 */
/*
final class User{
    public $name;
    public $password;
    public $email;
    public $city;

    function __construct($name, $password, $email, $city)
    {
        $this->name = $name;
        $this->password = $password;
        $this->name = $email;
        $this->city = $city;
    }

    final function getInfo()
    {
        $information = "{$this->name}" . "{$this->password}" . "{$this->email}" . "{$this->city}";
        return $information;
    }
}

$user1 = new User("Alex", "123456", "a@gmail.com", "Kiev");
echo $user1->getInfo();

class Moderator extends User{
    public $info;
    public $rights;

    function __construct($name, $password, $email, $city, $info, $rights){
        parent::__construct($name, $password, $email, $city);
        $this->info = $info;
        $this->rights = $rights;
    }

   function getInfo()
    {
        $information = parent::getInfo();
        $information .= "{$this->info}" . "{$this->rights}";
        return $information;
    }

}
$moder = new Moderator("Andrey", "654321", "andrey@gmail.com", "Odessa","Moderator", "True");
echo $moder->getInfo();
*/

class Test
{
    protected $info;
}

class Test2 extends Test
{
    public function test(){
        $this->info = "";
        echo $this->info;
    }
}

$test2 = new Test2();
$test2->test();
//$test2->info = 'information';