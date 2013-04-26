<?php
require_once 'classes/User.class.php';  
require_once 'classes/InfoController.class.php';  
require_once 'classes/dbconnect.class.php';

//connect to the database  
$db = new dbconnect();
$db->connect();
  
//initialize UserTools object
$userTools = new InfoController();
  
//start the session  
session_start(); 
  
//refresh session variables if logged in  
if(isset($_SESSION['logged_in'])) {  
    $user = unserialize($_SESSION['user']);  
    $_SESSION['user'] = serialize($userTools->getUser($user->username));  
}
?>