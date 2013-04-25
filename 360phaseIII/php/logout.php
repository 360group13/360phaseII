<?php
    //logout.php
    require_once 'includes/global.inc.php';

    $userTools = new InfoController();
    $userTools->logout();
    echo 'You have been successfully logged out';
    header("refresh:2; UI.php");
?>
