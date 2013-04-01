<?php

$con=mysql_connect("localhost", "username", "password");
mysql_select_db("wellcheckclinic", $con);

$newUser = $_POST["user"];

$query = "SELECT userType FROM accounts where username=$newUser";

header("refresh: 0; http://localhost/360phaseII/patientwelcome.html");

?>