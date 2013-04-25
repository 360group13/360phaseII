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
        echo '
            <head>
                <title>login</title>  
                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>   

                <link href="css/bootstrap.min.css" rel="stylesheet">
                <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
            </head>
            <body>
                <div class="container">
                    <div class="page-header">  
                        <h1>Invalid username and password entered. Please try again.<br></br></h1>
                        <h3><a href = /360phaseII\360phaseIII/UI.html>Try Again</a></h3>
                    </div>
                </div> 
            </body>
            '; 
    }
?>