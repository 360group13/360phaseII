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

if($newUserType = 'patient')
{
    mysql_query("INSERT INTO patient(name, phone, address, city, state, zip, insurance, username, password, userType, doctorId, permission) VALUES('$newName', '$newPhone', '$newAddress', '$newCity', '$newState', '$newZip', '$newInsurance', '$newUsername', '$newPassword', '$newUserType', '$newDoctorId', 'no');");
}
if($newUserType = 'nurse')
{
    mysql_query("INSERT INTO nurse(name, username, password, userType) VALUES('$newName', '$newUsername', '$newPassword', '$newUserType');");
}
if($newUserType = 'doctor')
{
    mysql_query("INSERT INTO doctor(name, doctorId, username, password) VALUES('$newName', '$newDoctorId', $newUsername', '$newPassword', '$newUserType');");
}
echo 'Account Successfully Created';
header("refresh: 3; http://localhost/360phaseII/nursewelcome.html")

?>
