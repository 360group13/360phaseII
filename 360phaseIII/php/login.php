<?php

    //include '/classes/InfoController.class.php';
    require_once 'includes/global.inc.php';

    $newUser = $_POST["username"];
    $newPass = md5($_POST["password"]);
    
    $info = new InfoController();

    if($info->login($newUser, $newPass))
    {
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
        header("refresh: 1; UI.php");
        echo 'Invalid username and password entered. Please try again.'; 
    }
?>