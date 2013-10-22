<?php
	$auth = new \Asouza\Admin\Auth;
//$auth->authenticate('apssouza22@gmail.com', '1234');
	if(!$auth->isAllowed('admin', 'all')){
		header('location:'. DIR_HTM_ROOT. 'admin/index.php');
		exit;
	}
?>
