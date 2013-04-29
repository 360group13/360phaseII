<?php
require_once 'classes/User.class.php';  
require_once 'classes/InfoController.class.php';
require_once 'classes/dbconnect.class.php';


$username = $_GET['username'];

$infoController = new InfoController();

$userInfo = $infoController->getJsonMetricInfo($username);
echo $userInfo;

?>
