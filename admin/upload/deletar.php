<?php
if(file_exists($_GET['img'])){
    if(unlink($_GET['img'])){
        exit('1');
    }
}
exit('0');
?>
