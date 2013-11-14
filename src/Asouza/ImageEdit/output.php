<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

require_once './ImageEdit.class.php';

$wmax = isset($_GET["wmax"]) ? $_GET["wmax"] : 100;
$hmax = isset($_GET["hmax"]) ? $_GET["hmax"] : 100;

header('Content-type: image/jpeg');
$img = new ImageEdit( $_GET["file"]);
$img->setDimensions($wmax, $hmax, true);
echo $img->getOutputImage();
exit();

