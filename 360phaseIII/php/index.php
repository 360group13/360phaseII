<?php

include 'classes/InfoController.class.php';
require_once 'includes/global.inc.php';

$newUser = $_POST["username"];
$newPass = md5($_POST["password"]);

$info = new InfoController();

if($info->login($newUser, $newPass))
{
    // put code to check user type and send to appropriate page
    $usertype = $info->getUsertype($newUser);
    
    if($usertype === 'Doctor')
        header ('classes/showDoctor.php');
    else if($usertype === 'Nurse')
        header ('classes/showNurse.php');
    else if($usertype === 'Patient')
        header ('classes/showPatient.php');
}
else
{
    echo 'Login Failed! Please try again.';
    header('Location: /360phaseII\360phaseIII/UI.html');
}
?>