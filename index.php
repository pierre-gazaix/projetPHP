<?php
$DS = DIRECTORY_SEPARATOR;
$dir = __DIR__;
$ROOT_FOLDER = $dir . $DS . 'lib'. $DS. 'File.php';

require_once ($ROOT_FOLDER);

require File::build_path(array('controller', 'routeur.php'));

?>