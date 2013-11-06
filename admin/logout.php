<?php require_once 'config/bootstrap.php'; ?>
<?php 
session_destroy();
unset($_SESSION['userAuth']);
header('location:'. DIR_HTM_ROOT . 'admin/');
exit;