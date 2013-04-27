<?php

    include_once 'classes/InfoController.class.php';
    require_once 'includes/global.inc.php';

    $newUser = $_POST["username"];
    $newPass = md5($_POST["password"]);
    
    $info = new InfoController();

    if($info->login($newUser, $newPass))
    {
        //echo 'Login success. Redirecting...';
        // put code to check user type and send to appropriate page
        
        $usertype = $info->getUsertype($newUser);
        if($usertype == "Doctor"){
            header("refresh: 0; showDoctor.php");            
        }
        else if($usertype == 'Nurse')
            header("refresh: 0; showNurse.php");
        else if($usertype == 'Patient')
            header("refresh: 0; showPatient.php");
    }
    else
    {
        echo 'Invalid username and/or password entered. Please try again.'; 
    }
?>