<?php
if(file_exists($_GET['img'])){
    unlink($_GET['img']);
}
?>
