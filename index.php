<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

$loader = require 'vendor/autoload.php';
$loader->add('App', './');//add path to namespace App
$conn = new PDO("mysql:host=localhost; dbname=testeadmin; ", 'root', '');

//$conn = new \PDO("mysql:host=186.202.152.99;dbname=mipbrasilfarma11", "mipbrasilfarma11", "salveqa@2008");
//$conn = new \PDO("mysql:host=localhost; dbname=testeadmin; port=" , 'root', '');
//echo 'teste';
//exit;

use Respect\Relational\Db;
$db = new Db($conn);
$mapper = new \Respect\Relational\Mapper($conn);
$all = $mapper->admin_user(
        
        )
    ->fetchAll(\Respect\Relational\Sql::orderBy('name')->desc()->limit(1));

var_dump($all);
exit;;

\Asouza\Registry::set('db', $db);

$oUser = new Asouza\Admin\User;
//$result = $oUser->store(array(
//    'name' => 'Souza',
//    'email' => 'apssouza@gmail.com',
//    'password' => 0,
//    'role' => 'user',
//));

//$result = $oUser->delete(3);

$result = $db->select('*')->from('admin_user')->getSQL()->appendQuery(
            Respect\Relational\Sql::orderBy('id')->desc()->limit(2)
        )->fetchAll();
var_dump($result);