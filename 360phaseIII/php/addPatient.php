<?php
    require_once 'classes/User.class.php';  
    require_once 'classes/InfoController.class.php';
    $username = $_GET['username'];
    $password = md5($_GET['password']);
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $address = $_GET['address'];
    $city = $_GET['city'];
    $state = $_GET['state'];
    $zip = $_GET['zip'];
    $insured = $_GET['insured'];
    $insComp = $_GET['insComp'];
    $insID = $_GET['insID'];
    $insPh = $_GET['insPh'];
    $docId = $_GET['docId'];
    $nurId = $_GET['nurId'];
    
    $info = new InfoController();
    $info->addPatient($username, $password, $firstname, $lastname, $address, $city, $state, $zip, $insured, $insComp, $insID, $insPh, $docId, $nurId);
?>
