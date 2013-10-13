<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

require_once 'vendor/autoload.php';

use \Asouza\Admin\Auth;

$auth = new Auth();
if($auth->authenticate('apssouza22@gmail.com', '1234')){
	echo $auth->isAllowed('userAction', 'create') ? 'allowed' : 'denaid';
	echo 'logado';
}


?>
