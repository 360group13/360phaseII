<?php
class dbconnect{
    private $con;
    
    public function connect()
    {
        $this->con = mysql_connect("localhost", "root", "");
    
        if(!$this->con)
        {
            die('Could not connect: '.mysql_error());
        }
        mysql_select_db("wellcheckclinic", $this->con);
    }
    
    public function dbclose()
    {
        mysql_close($this->con);
    }
}
?>
