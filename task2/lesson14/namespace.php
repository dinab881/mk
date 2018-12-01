<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 01.12.18
 * Time: 15:39
 */
require_once "index.php";
$obj = new \Home\User("Alexey ", "1234568888 ", "alexey@gmail.com", "Odessa ");
echo $obj->getInfo();

use newClass\Home as Home;
/*use some\namespace\{ClassA, ClassB};
use function some\namespace\{fn a, fn b};
use const some\namespace\{fn a, fn b};*/