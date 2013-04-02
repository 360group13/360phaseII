<?php

mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('wellcheckclinic') or die(mysql_error());

$newName = $_GET["name"];
$newPhone = $_GET["phone"];
$newAddress = $_GET["address"];
$newCity = $_GET["city"];
$newState = $_GET["state"];
$newZip = $_GET["zip"];
$newInsurance = $_GET["insurance"];
$newUsername = $_GET["username"];
$newPassword = $_GET["password"];
$newUserType = $_GET["userType"];

$result1 = mysql_query("INSERT INTO personInformation(name, phone, address, city, state, zip, insurance) VALUES('$newName', '$newPhone', '$newAddress', '$newCity', '$newState', '$newZip', '$newInsurance');");
$result2 = mysql_query("INSERT INTO accounts(username, password, userType) VALUES('$newUsername', '$newPassword', '$newUserType');");

while($row = mysql_fetch_array($result1))
{
    
}

?>
