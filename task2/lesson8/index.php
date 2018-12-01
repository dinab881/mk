<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 01.12.18
 * Time: 14:41
 */

class User
{
    public static $name;
    public static function hello(){
        echo 'Hello';
        return self::$name;
    }
}

User::$name = "Alexey";
echo User::$name;
echo User::hello();