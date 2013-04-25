<?php
//logout.php
require_once 'includes/global.inc.php';

$userTools = new InfoController();
$userTools->logout();

?>

You are not logged in. <a href="login.php">Log In</a>
