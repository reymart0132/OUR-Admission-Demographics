<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/maps/resource/php/class/core/init.php';
$user = new user();
$user->logout();
Redirect::to('adminlogin.php');
 ?>
