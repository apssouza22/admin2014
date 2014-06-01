<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');



require './src/App/Config/bootstrap.php';
$loader = require 'vendor/autoload.php';
$loader->add('App', './src/');//add path to namespace App
$conn = new PDO("mysql:host=localhost; dbname=testeadmin; ", 'root', '5834');


$oUser = new Asouza\Admin\User;
var_dump($oUser->count('role = "user"'));
var_dump($oUser->delete(10));
var_dump($oUser->fetch(2));
var_dump($oUser->fetchObject(2));
var_dump($oUser->fetchAllObject());
var_dump($oUser->fetchAll());
exit;

//INSERT
$result = $oUser->store(array(
    'name' => 'Alex2ultimo',
    'email' => 'apssouza222@gmail.com',
    'password' => '583471',
    'role' => 'user',
));
var_dump($result);

//UPDATE
$result = $oUser->store(array(
    'id' => 2,
    'name' => 'Alex2',
    'email' => 'apssouza222@gmail.com',
    'password' => '583471',
    'role' => 'user',
));

var_dump($result);

