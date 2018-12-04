<?php
/*require_once 'rb.php';
$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass'], $options);
R::freeze(true);
R::fancyDebug(true);*/
//var_dump(R::testConnection());
//create
/*$cat = R::dispense('category');
$cat->title = 'Category 3 fhfjgjgghjkkkkkkkkkkkk
kkkkkkkkkkkkkkkkkkk fhfjgggggggggggggggggggggggggggggggggggjg fgjgj';
$id = R::store($cat);
var_dump($id);*/

//read
/*$cat = R::load('category', 2);
print_r($cat->title); //$cat->title or $cat ['title']*/

//Update
/*$cat = R::load('category', 3);
echo $cat->title.'<br>';
$cat->title = "Category5";
R::store($cat);
echo $cat->title;*/

/*
$cat = R::dispense('category');
$cat->title = "cat 3!!";
$cat->id = 3;
r::store($cat);*/

//Delete
/*$cat = R::load('category', 2);
R::trash($cat);*/

//Clear table
//R::wipe('category');
/*
$cat = R::dispense('category');
$cat->title = 'Category 3';
$id = R::store($cat);*/

//$cats = R::findAll('category', 'id > ?', [2]);
//echo '<pre>';
//$cats = R::findAll('category', 'title LIKE ?', ['%cat%']);
//print_r($cats);
/*
$cat =  R::findOne('category', 'id = 2' );
echo '<pre>';
print_r($cat);*/