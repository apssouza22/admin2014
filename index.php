<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');



$loader = require 'vendor/autoload.php';
$loader->add('App', './');//add path to namespace App


use \Asouza\Admin\Auth;
use Respect\Relational\Mapper;
use Respect\Relational\Db;

$mapper = new Mapper(new PDO("mysql:host=localhost; dbname=testeadmin; port=", 'root', ''));
$db = new Db(new PDO("mysql:host=localhost; dbname=testeadmin; port=", 'root', ''));


\Asouza\Registry::set('mapper', $mapper);
\Asouza\Registry::set('db', $db);

$model = new \Asouza\Model(13);
$model->count();

//$user = new \Asouza\Admin\User;
//$user->add(array(
//	'name' => "Alexsandro",
//	'email' => 'alex@agenciasalve.com.br',
//	'role' => 'user',
//	'password' => '1234'
//));

		

$auth = new Auth();
if($auth->authenticate('apssouza22@gmail.com', '1234')){
	echo $auth->isAllowed('userAction', 'create') ? 'allowed' : 'denaid';
	echo 'logado';
}


?>
