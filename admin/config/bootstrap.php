<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

date_default_timezone_set('America/Sao_Paulo');

$enviroment = 'dev';

if (mb_strpos($_SERVER['HTTP_HOST'], 'com') !== false) {
    $enviroment = 'prod';
}else{
    $enviroment = 'dev';
}

define('ENVIROMENT', $enviroment );
$sitePath = '/';

if (mb_strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
	$sitePath = '/opensource/admin2014/';	
	$sitePath = '/free/admin/';	
}

$host = $_SERVER['HTTP_HOST'] . '/';
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';

define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'] . $sitePath);
define('DIR_HTM_ROOT', $protocol . $host . $sitePath);

$loader = require DIR_ROOT .'vendor/autoload.php';
$loader->add('App', DIR_ROOT);//add path to namespace App

use Respect\Relational\Db;

//$pdo = new PDO("mysql:host=localhost; dbname=testeadmin; ", 'root', '5834');
$pdo = new PDO("mysql:host=localhost; dbname=testeadmin; ", 'root', '');
$pdo->exec("set names utf8");
$pdo->setAttribute(1002, 'SET NAMES utf8');

$db = new Db($pdo);

\Asouza\Registry::set('db', $db);
\Asouza\Registry::set('dbconfig', array(
			'driver' => 'PDO_MYSQL',
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'testeadmin'
		));