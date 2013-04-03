<?php

mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('wellcheckclinic') or die(mysql_error());

?>

<html>
<body>
<center>
<h1> <strong> Welcome <?php  ?></strong> </h1>

<table border=2>
<tr>
      <td colspan="4"><strong>Patients</strong>
</tr>
<th><form>
<?php 
$result = mysql_query("SELECT name FROM patient;");
while($row = mysql_fetch_array($result))
{
    echo $row[0];
}
?>
</th></form>
<th>
<form action="doctorview.html" method="post">
<input type="submit" value="View Info"/>
</form>
</th>
<th>
<form action="doctorcomment.php" method="post">
<input type="submit" value="Add Comments"/>
</form>
</th>
<th>
<form action="doctoredit.php" method="post">
<input type="submit" value="Edit Metrics"/>
</form>
</th>
</table>

<form action="logout.php" method="post">
<input type="submit"  value ="Log Out"/>
</form>

</center>
</body>
</html>