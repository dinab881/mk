<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
class User
{
    public $name = "Name";
    public $password = "Password";
    public $email = "Email";
    public $city = "City";

    public function hello(){
        echo "Hello {$this->name}";
    }

    function getInfo(){
        return "{$this->mname}"."$this->surname}";
    }
}

$admin = new User();
$this->name = "Alexey";
$this->surname = "Ivanov";
$admin->hello();
echo "Пользователь {$admin->getInfo()}";
?>
</body>
</html>