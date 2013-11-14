<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

$loader = require 'vendor/autoload.php';
$loader->add('App', './');//add path to namespace App

use Respect\Relational\Db;

$db = new Db(new PDO("mysql:host=localhost; dbname=testeadmin; port=", 'root', '5834'));


\Asouza\Registry::set('db', $db);

$oUser = new Asouza\Admin\User;
$result = $oUser->store(array(
    'name' => 'Souza',
    'email' => 'apssouza@gmail.com',
    'password' => 0
));

var_dump($result);