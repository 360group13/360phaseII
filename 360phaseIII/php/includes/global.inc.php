<?php  
foreach (glob("classes/*.php") as $filename)
{
    require_once $filename;
}
  
//connect to the database  
$db = new dbconnect();  
$db->connect();  
  
//initialize UserTools object  
$userTools = new User();
  
//start the session  
session_start();  
  
//refresh session variables if logged in  
/*if(isset($_SESSION['logged_in'])) {  
    $user = unserialize($_SESSION['user']);  
    $_SESSION['user'] = serialize($userTools->get($user->id));  
}*/ 
?>  