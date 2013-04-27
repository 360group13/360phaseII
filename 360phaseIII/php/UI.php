<?php
    //require_once '/360phaseII/360phaseIII/php/includes/global.inc.php';
?>
<html>
    <head>
        <title>Well Check Clinic</title>  
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
        
    </head>
    
    <body>
        <div class="container">
        <div class="row">            
            <div class="page-header">
                <h1>The Bulls</h1>   
            </div>
            <div class="row offset3 span6">     
                <div class="offset2"><h2>Log In</h2></div>
                <form action="login.php" method="post" class="form-horizontal"> 
                        <div class="control-group">
                            <label class="control-label" for="username">Username</label>  
                            <div class="controls">  
                                <input type="text" name="username" id="username" placeholder="Your username">  
                            </div>                     
                        </div>  

                        <div class="control-group">  
                            <label class="control-label" for="password">Password</label>  
                            <div class="controls">  
                                <input type="password" name="password" id="password" placeholder="Your password">  
                            </div>  
                        </div>
                        
                        <div id='resultLogin'></div>
                    
                        <div class="form-actions">
                            <input type="hidden" name="submit"  value="submit">  
                            <button type="submit" name='submit-login' id='submit-login' class="btn btn-primary">Submit</button>
                            
                            <input type="hidden" name="forgotpassword" value="forgotpassword">  
                            <button type="submit" name='forgotpassword' class="btn btn-primary">Forgot Password?</button>
                        </div>
                </form>
                   
            </div>
        </div>
        </div>        
        <script>
            $(document).ready(function() {
                $('button#submit-login').click(function() {
                    $.ajax({
                        type: 'POST',
                        url: 'login.php',
                        data: "username=" + $('#username').val() + "&password=" + $('#password').val(),
                        success: function(msg) {
                            $('div#resultLogin').html(msg);
                        }
                    });//.ajax
                });// .click
            });// document.ready
        </script>
    </body>
</html>