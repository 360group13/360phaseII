<?php

mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('wellcheckclinic') or die(mysql_error());

$newName = $_POST["name"];
$newPhone = $_POST["phone"];
$newAddress = $_POST["address"];
$newCity = $_POST["city"];
$newState = $_POST["state"];
$newZip = $_POST["zip"];
$newInsurance = $_POST["insurance"];
$newUsername = $_POST["username"];
$newPassword = $_POST["password"];
$newUserType = $_POST["userType"];
$newDoctorId = $_POST["doctorId"];

mysql_query("UPDATE INTO patient(name, phone, address, city, state, zip, insurance, username, password, userType, doctorId) VALUES('$newName', '$newPhone', '$newAddress', '$newCity', '$newState', '$newZip', '$newInsurance', '$newUsername', '$newPassword', '$newUserType', '$newDoctorId');");

echo 'Account Successfully Updated.';
header("refresh: 3; http://localhost/360phaseII/nursewelcome.html")

?>
