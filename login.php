<?php

mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('wellcheckclinic') or die(mysql_error());

$newUser = $_POST["username"];
$newPass = $_POST["password"];

$result1 = mysql_query("SELECT userType FROM patient WHERE username = '$newUser' AND password = '$newPass';");
$result2 = mysql_query("SELECT userType FROM nurse WHERE username = '$newUser' AND password = '$newPass';");
$result3 = mysql_query("SELECT userType FROM doctor WHERE username = '$newUser' AND password = '$newPass';");

if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
}
if (!$result2) { // add this check.
    die('Invalid query: ' . mysql_error());
}
if (!$result3) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$type = 'invalid';

while($row = mysql_fetch_array($result1))
{
    $type = $row['userType'];
    if($type == 'patient')
    { 
        header("refresh: 0; http://localhost/360phaseII/patientwelcome.html");
    }
}
while($row = mysql_fetch_array($result2))
{
    $type = $row['userType'];
    if($type == 'nurse')
    {
        header("refresh: 0; http://localhost/360phaseII/nursewelcome.html");
    }
}
while($row = mysql_fetch_array($result3))
{
    $type = $row['userType'];
    if($type == 'doctor')
    {
        header("refresh: 0; http://localhost/360phaseII/doctorwelcome.html");
    }
}

if($type == 'invalid')
    {
        echo "Invalid username and/or password. Redirecting to login.";
        header("refresh: 3; http://localhost/360phaseII/login.html");
    }

?> 