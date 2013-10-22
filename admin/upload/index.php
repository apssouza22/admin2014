<?php
require './UserFile.php';
use Helpers\UserFile;

$userFile = new UserFile();
echo $userFile->upload();
