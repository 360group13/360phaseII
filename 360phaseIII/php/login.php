<?php

    include_once 'classes/InfoController.class.php';
    require_once 'includes/global.inc.php';

    $newUser = $_GET['username'];
    $newPass = md5($_GET['password']);
    
    $info = new InfoController();

    if($info->login($newUser, $newPass))
    {
        echo json_encode("Login success. Redirecting...");
        header("refresh: 0; showUser.php");
    }
    else
    {
        echo json_encode("Invalid username and/or password entered. Please try again.");
    }
?>