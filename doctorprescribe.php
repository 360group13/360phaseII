<?php

mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('wellcheckclinic') or die(mysql_error());

$newPrescription = $_POST['prescription'];

mysql_query("INSERT INTO patient(prescriptions) VALUE('$newPrescription);");

?>

