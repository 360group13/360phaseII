<?php

mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('wellcheckclinic') or die(mysql_error());

$newPrescription = $_POST['prescription'];

mysql_query("INSERT INTO patient(prescriptions) VALUE('$newPrescription)';");

echo "Prescription Successfully Added.";
header("refresh: 3; url=http://localhost/360phaseII/doctorwelcome.html");

?>

