<?php

mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('wellcheckclinic') or die(mysql_error());

$newComment = $_POST['comment'];

mysql_query("INSERT INTO patient(comment) VALUE('$newComment);");

?>

