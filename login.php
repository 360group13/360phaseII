<?php

mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('wellcheckclinic') or die(mysql_error());

$newUser = $_POST["username"];
$newPass = $_POST["password"];

$result = mysql_query("SELECT * FROM accounts WHERE username = '$newUser' AND password = '$newPass'");

$type = -1;

while($row = mysql_fetch_array($result))
{
    $type = $row['userType'];
    if($type == 0)
    { 
        header("refresh: 0; http://localhost/360phaseII/patientwelcome.html");
    }
    if($type == 1)
    {
        header("refresh: 0; http://localhost/360phaseII/nursewelcome.html");
    }
    if($type == 2)
    {
        header("refresh: 0; http://localhost/360phaseII/login.html");
    }
}

if($type == -1)
    {
        echo "Invalid username and/or password. Redirecting to login.";
        header("refresh: 5; http://localhost/360phaseII/login.html");
    }

?> 