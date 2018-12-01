<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
class A {
// Выводит, функция какого класса была вызвана
    function Test() { echo "Test from A\n"; }
// Тестовая функция — просто переадресует на Test()
    function Call() { Test(); }
}
class B extends A {
// Функция Test() для класса B
    function Test() { echo "Test from B\n"; }
}
$a=new A();
$b=new B();
$a->Call(); // выводит "Test from A"
$b->Test(); // выводит "Test from B"
$b->Call(); // Внимание! Выводит "Test from B"!
?>
</body>
</html>