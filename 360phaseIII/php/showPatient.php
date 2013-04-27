<?php
    require_once 'classes/User.class.php';  
    require_once 'classes/InfoController.class.php';  
    require_once 'classes/dbconnect.class.php';
    require_once 'includes/global.inc.php';
    
    if(isset($_SESSION['logged_in']))
        $user = unserialize($_SESSION['user']);
    
    $info = new InfoController();
    
    if(!isset($_SESSION['logged_in']) || ($info->getUsertype($user->username) != 'Patient')) { 
        echo "Please login. You will be redirected to the login page now...";
        $info->logout();
        header("refresh:2; UI.php"); 
    }
    else
    {
        echo '
            <html>
                <head>
                    <title>Well Check Clinic</title>  
                    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
                    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
                    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">

                    <script>
                        $(function() {
                          $( "#content" ).tabs();
                        });
                    </script>
                </head>

                <body>

                    <div class="container">
                    <!-------->
                        <div id="content">
                            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                <li class="active"><a href="#viewRecords" data-toggle="tab">My Records</a></li>
                                <li><a href="#viewAccount" data-toggle="tab">My Account</a></li>
                            </ul>

                            <div id="my-tab-content" class="tab-content">
                                <div id="viewRecords">
                                    <h1>Red</h1>
                                    <p>red red red red red red</p>
                                </div>
                                <div id="viewAccount">
                                    <h1>Orange</h1>
                                    <p>orange orange orange orange orange</p>
                                </div>
                                <div class="row offset10">
                                    <a href="/360phaseII/360phaseIII/php/logout.php" class="btn btn-primary">Logout</a>
                                </div>
                            </div>
                        </div>   
                    </div> <!-- container -->
                </body>
            </html>
        ';
    }
?>