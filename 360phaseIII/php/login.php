<?php

    include_once 'classes/InfoController.class.php';
    require_once 'includes/global.inc.php';

    $newUser = $_GET['username'];
    $newPass = md5($_GET['password']);
    
    $info = new InfoController();

    if($info->login($newUser, $newPass))
    {
        header("refresh: 1; showUser.php");
        echo "Login success. Redirecting...";
    }
    else
    {
        echo "Invalid username and/or password entered. Please try again.";
        header("refresh: 1; ui.php");
    }
?>