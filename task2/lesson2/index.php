<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
class Shop
{
    private $name;
    public function naming(){
        $this->name = 'Adidas';
        echo $this->name;
    }
}
//$product = new Shop;
//$product->naming();
//$product->name = 'Nike';

class User
{
    public $name = "Name";
    public $password = "Pasword";
    public $email = "Email";
    public $city = "City";
}

$admin = new User();
$user1 = new User();
$admin->name = "Alexey";
$user1->name = "Andrey";

echo $admin->name;
echo $user1->name;

$user1->surname = "Ivanov"; //Is it right to create properties by this way?
echo $user1->surname;
?>
</body>
</html>