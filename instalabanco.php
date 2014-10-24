<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
$db = new \PDO("mysql:host=localhost;dbname=symantec", "root", "");
$db->query('CREATE TABLE IF NOT EXISTS `admin_user` ('.
	'id    INTEGER PRIMARY KEY,'.
	'name varchar(200) NOT NULL,'.
	'email varchar(200) NOT NULL,'.
	'password varchar(200) NOT NULL,'.
	'picture varchar(100) DEFAULT NULL,'.
	'role varchar(50) NOT NULL,'.
	'salt varchar(50) DEFAULT NULL,'.
	'dateinsert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,'.
	'visible tinyint(1) NOT NULL DEFAULT \'1\')'
);




