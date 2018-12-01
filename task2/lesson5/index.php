<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php

class User
{
    private static $name;
    public static function setName($name1){
        self::$name = $name1;
    }

    public static function getName(){
        return self::$name;
    }
   /* public $name;
    public $password;
    public $email;
    public $city;
   */

   /* public function getName()
    {
        echo $this->name;
        $this->test();
    }

    public function test()
    {
        echo 'Test';
    }*/
}
/*
$user1 = new User();
$user1->name = "Alexey";
$user1->getName();


$user2 = new User();
$user1->name = "Ivan";
$user1->getName();
*/

User::setName('Alex');
echo User::getName();
?>
</body>
</html>