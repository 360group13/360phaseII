<?php

   echo 'patient page entered';

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
                </div>
            </div>   
        </div> <!-- container -->
    </body>
</html>