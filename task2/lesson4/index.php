<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php

class User
{
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

    function getInfo()
    {
        return "{$this->name}" . "{$this->password}" . "{$this->email}" . "{$this->city}";
    }
}

$user1 = new User("Alex", "123456", "a@gmail.com", "Kiev");
echo $user1->getInfo();

class DestructableClass
{
    function __construct()
    {
        print "Конструктор";
        $this->name = "DestructableClass";

    }

    function __destruct()
    {
        print "Desruction" . $this->name;

    }
}

$obj = new DestructableClass();

?>
</body>
</html>