<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 01.12.18
 * Time: 15:09
 */
class Base{
    public function sayHello(){
        echo 'Hello';
    }
}
trait Hello{
    public function sayHello(){
        echo 'Hello';
    }
}
/*trait sayWorld{
    public function sayHello(){
        parent::sayHello();
        echo 'World';
    }
}*/

trait World{
    public function sayWorld(){
        echo 'World';
    }
}

class myHelloWorld /*extends Base*/ {
   // use sayWorld;
   use Hello, World;
}

$obj = new myHelloWorld();
$obj->sayHello();
$obj->sayWorld();