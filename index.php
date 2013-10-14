<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');



$loader = require 'vendor/autoload.php';
$loader->add('App', './');//adicionando root do namespace



use \Asouza\Admin\Auth;
use Respect\Relational\Mapper;
use Respect\Relational\Db;
use Respect\Relational\Sql;

$mapper = new Mapper(new PDO("mysql:host=localhost; dbname=testeadmin; port=", 'root', ''));
$db = new Db(new PDO("mysql:host=localhost; dbname=testeadmin; port=", 'root', ''));


\Asouza\Registry::set('mapper', $mapper);
\Asouza\Registry::set('db', $db);

$model = new \Asouza\Model(13);
var_dump($model->name);

$obj = $model->insert(array(
	'name' => 'Felipe homem',
	'email' => 'felipe@gmail.com',
	'id' => null
));


$model->count();


echo "<pre>";
//var_dump($model->fetch(11));
echo "</pre>";

$auth = new Auth();
if($auth->authenticate('apssouza22@gmail.com', '1234')){
	echo $auth->isAllowed('userAction', 'create') ? 'allowed' : 'denaid';
	echo 'logado';
}


?>
