<?php

require_once './App/Config/bootstrap.php';

$db->createTable('admin_user', array(
	'id    INTEGER PRIMARY KEY',
	'name varchar(200) NOT NULL',
	'email varchar(200) NOT NULL',
	'password varchar(200) NOT NULL',
	'picture varchar(100) DEFAULT NULL',
	'role varchar(50) NOT NULL',
	'salt varchar(50) DEFAULT NULL',
	'dateinsert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
	'visible tinyint(1) NOT NULL DEFAULT \'1\'',
))->exec();




