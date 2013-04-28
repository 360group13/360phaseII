<?php
    //require_once '/360phaseII/360phaseIII/php/includes/global.inc.php';
?>
<html>
    <head>
        <title>Well Check Clinic</title>  
        <!-- Jquery UI 1.9.1 -->
	<script src="/360phaseII/360phaseIII/js/jquery-ui-1.9.1.js"></script>
	<link  href="/360phaseII/360phaseIII/css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link  href="/360phaseII/360phaseIII/css/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
	<!-- Bootstrap Stuff -->
	<link  href="/360phaseII/360phaseIII/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link  href="/360phaseII/360phaseIII/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	<script src = "/360phaseII/360phaseIII/js/bootstrap.js"/></script>
	<!-- Default css look-->
	<link rel="stylesheet" href="/360phaseII/360phaseIII/css/default.css" />	
	<!-- table maker -->
	<script src = "/360phaseII/360phaseIII/js/TableMaker.js"/></script>
	<!-- UI function file -->
	<script src = "/360phaseII/360phaseIII/js/ui.js"/></script>
	<!-- DB functions -->
	<script src = "/360phaseII/360phaseIII/js/dbfunctions.js"/></script>

    </head>
    
    <body>
        <div class="container">
            <div class="row">            
                <div class="page-header">
                    <h1>The Bulls</h1>   
                </div>
                <div class="row offset3 span6">     
                    <div class="offset2"><h2>Log In</h2></div>
                    <form class="form-horizontal"> 
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
                    
                    <script type="text/javascript">
                        $('#submit-login').on("click")
                        $.getJSON(
                            "/360phaseII/360phaseIII/php/login.php", // The server URL
                            {username: $('#username'),
                             password: $('#password')},
                            function (json) {
                                document.getElementById("resultLogin").innerHTML = json;
                            }
                        );
                    </script>
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