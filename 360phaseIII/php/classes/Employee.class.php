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
        $this->employeeID = $employee['employee_id'];
    }
    
    function __construct2($employeeID, $empty)
    {
        $result = mysql_query("SELECT username FROM employee WHERE employee_id = '$employeeID';");
        $username = mysql_fetch_array($result);
        parent::__construct($username);     
        $this->employeeID = $employeeID;
    }
    
    public function getPatients()
    {
        $sql = mysql_query("SELECT Patients.username, first_name, last_name FROM patients, users WHERE (Patients.doctor_id = '$this->employeeID' OR Patients.nurse_id = '$this->employeeID') AND Users.username = Patients.username;");
        $patients = array();
        $i = 0;
        while($result = mysql_fetch_array($sql)){
            $patients[$i] = $result[0]."|".$result[1]."|".$result[2];
            $i++;
        }
        return json_encode($patients);
    }
}

?>
