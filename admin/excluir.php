<?php
require_once 'config/bootstrap.php';
require_once 'includes/authenticate.php';
//echo $_GET['classe'];
//exit;
$classe = $_GET['classe'];
$objeto = new $classe($_GET['id']);
if ($objeto->id) {
	try{
		$objeto->delete(); 
	}  catch (Exception $e ){
		
		echo "<script>alert('Não é possível deletar o registro.')
			window.location.href='".$classe::getPgListar()." '</script>";
		exit;
	}
}

header('Location: ' .$classe::getPgListar());
?>
