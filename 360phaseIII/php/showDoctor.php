<?php
    //require_once '/360phaseII/360phaseIII/php/includes/global.inc.php';
    
    if(!isset($_SESSION['logged_in'])) { 
        //echo "session is not set...";
        //header("refresh:0; /360phaseII/360phaseIII/UI.html"); 
    }
?>
<html>
    <head>
        <title>Well Check Clinic</title>  
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
        
        <script>
            $(function() {
              $( "#mainTabs" ).tabs();
              $( "#patientTabs" ).tabs();
            });
        </script>
    </head>
    
    <body>

    <div class="container">

    <!-------->
        <div id="mainTabs">
            <ul id="mainTabsUl" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#viewPatients" data-toggle="tab">Patients</a></li>
                <li><a href="#viewSchedule" data-toggle="tab">Schedule</a></li>
            </ul>

            <div id="main-tab-content" class="tab-content">
                <div id="viewPatients">
                    <div class="container-fluid">
                        <div class="row-fluid">
                           
                            <div class="span2">
                                <!--Sidebar content-->
                                <h2>This is the patients section</h2>
                                <?php
                                include 'classes/InfoController.class.php';
                                    //$info = new InfoController();
                                ?>
                            </div>
                            
                            <div class="span10">
                                <!--Body content-->
                                <div id="patientTabs">
                                    <ul id="patientTabsUl" class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active"><a href="#patientAccount" data-toggle="tab">Account</a></li>
                                        <li><a href="#patientMetrics" data-toggle="tab">Metrics</a></li>
                                    </ul>
                                    
                                    <div id="main-tab-content" class="tab-content">
                                        <div id="patientAccount">
                                            <h3>Patient Account info</h3>
                                        </div>
                                        <div id="patientMetrics">
                                            <h3>Patient Metrics</h3>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="viewSchedule">
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