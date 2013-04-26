<?php

require_once 'dbconnect.class.php';

class Employee extends User{
    protected $employeeID;
    
    public function getID()
    {
        return $employeeID;
    }
    
    function __construct($username){
        parent::__construct($username);
        $result = mysql_query("SELECT * FROM employee WHERE username = '$username';");
        $employee = mysql_fetch_array($result);
        $this->employeeID = (isset($patient['employee_id'])) ? $patient['employee_id'] : "";
    }
    
    function __construct2($employeeID, $empty)
    {
        $result = mysql_query("SELECT username FROM employee WHERE employee_id = '$employeeID';");
        $username = mysql_fetch_array($result);
        parent::__construct($username);     
        $this->employeeID = $employeeID;
    }
}

?>
