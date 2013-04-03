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
$newUsername = $_POST["user"];
$newPassword = $_POST["password"];
$newUserType = $_POST["userType"];

mysql_query("INSERT INTO personInformation(name, phone, address, city, state, zip, insurance) VALUES('$newName', '$newPhone', '$newAddress', '$newCity', '$newState', '$newZip', '$newInsurance');");
mysql_query("INSERT INTO accounts(username, password, userType) VALUES('$newUsername', '$newPassword', '$newUserType');");

echo 'Account Successfully Created';
header("refresh: 3; http://localhost/360phaseII/nursewelcome.html")

?>
