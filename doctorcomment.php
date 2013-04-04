<?php

mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('wellcheckclinic') or die(mysql_error());

$newComment = $_POST['comment'];

mysql_query("INSERT INTO patient(comment) VALUE('$newComment)';");

echo "Comment Successfully Added.";
header("refresh: 3; url=http://localhost/360phaseII/doctorwelcome.html");

?>

