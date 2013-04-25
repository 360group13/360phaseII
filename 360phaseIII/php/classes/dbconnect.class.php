<?php
class dbconnect{
    private $con;
    
    public function connect()
    {
        $con = mysql_connect("localhost", "root", "");
    
        if(!$con)
        {
            die('Could not connect: '.mysql_error());
        }

        mysql_select_db("wellcheckclinic", $con);
    }
    
    public function dbclose()
    {
        mysql_close($con);
    }
}
?>
