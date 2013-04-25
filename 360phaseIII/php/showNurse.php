<?php

   echo 'nurse page entered';

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
              $( "#content" ).tabs();
            });
        </script>
    </head>
    
    <body>
    <!-------->
        <div id="content">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#viewPatient" data-toggle="tab">Patients</a></li>
                <li><a href="#createPatient" data-toggle="tab">Create Patient</a></li>
                <li><a href="#editAccount" data-toggle="tab">Account</a></li>
                <li><a href="#viewAppointments" data-toggle="tab">Schedule</a></li>
            </ul>

            <div id="my-tab-content" class="tab-content">
                
                <div id="viewPatient">
                    
                    <div class="container-fluid">
                        
                        <div class="row-fluid">
                            
                            <div class="span2">
                                <!--Sidebar content-->
                                <h2>This is the patients section</h2>                              
                            </div>
                            
                            <div class="span10">
                                <!--Body content-->
                                <h2>This is the patients information section</h2>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div id="createPatient">
                    <h1>Orange</h1>
                    <p>orange orange orange orange orange</p>
                </div>
                <div id="editAccount">
                    <h1>Yellow</h1>
                    <p>yellow yellow yellow yellow yellow</p>
                </div>
                <div id="viewAppointments">
                    <h1>Green</h1>
                    <p>green green green green green</p>
                </div>
            </div>
        </div> 

    </body>
</html>