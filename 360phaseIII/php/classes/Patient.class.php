<?php

include_once 'dbconnect.class.php';
include_once 'Doctor.class.php';
include_once 'Nurse.class.php';
include_once 'User.class.php';

$con = new dbconnect();
$con->connect();

class Patient extends User{
    private $insuranceComp;
    private $insuranceStat;
    private $insuranceID;
    private $insurancePhNum;
    private $patientID;
    private $doctor;
    private $nurse;
    
    function __construct1($username)
    {
        parent::__construct($username);
        $result = mysql_query("SELECT * FROM patients WHERE username = '$username';");
        $patient = mysql_fetch_array($result);
        $this->patientID = (isset($patient['patient_id'])) ? $patient['patient_id'] : "";
        $this->insuranceComp = (isset($patient['insuranceComp'])) ? $patient['insuranceComp'] : "";
        $this->insuranceState = (isset($patient['insuranceState'])) ? $patient['insuranceState'] : "";
        $this->insuranceID = (isset($patient['insurance_id'])) ? $patient['insurance_id'] : "";
        $this->insurancePhNum = (isset($patient['insurance_ph'])) ? $patient['insurance_ph'] : "";
        $this->doctor = new Doctor($patient['doctor_id'], "");
    }
    
    function __construct2($patientID, $empty)
    {
        $result = mysql_query("SELECT * FROM patients WHERE patient_id = '$patientID';");
        $patient = mysql_fetch_array($result);
        
        parent::__construct($patient['username']);
        $this->patientID = (isset($patient['patient_id'])) ? $patient['patient_id'] : "";
        $this->insuranceComp = (isset($patient['insuranceComp'])) ? $patient['insuranceComp'] : "";
        $this->insuranceState = (isset($patient['insuranceState'])) ? $patient['insuranceState'] : "";
        $this->insuranceID = (isset($patient['insurance_id'])) ? $patient['insurance_id'] : "";
        $this->insurancePhNum = (isset($patient['insurance_ph'])) ? $patient['insurance_ph'] : "";
        $this->doctor = new Doctor($patient['doctor_id'], "");
    }
    
    public function setMetrics($weight, $bp, $sugar)
    {
        
    }
    
    public function insured()
    {
        return $insuranceState;
    }
    
    public function getUsername()
    {
        return $username;
    }
    
    public function getPatientID()
    {
        return $patientID;
    }
    
    public function getInsuranceComp()
    {
        return $insuranceComp;
    }
    
    public function getInsuranceState()
    {
        return $insuranceState;
    }
    
    public function getInsuranceID()
    {
        return $insuranceID;
    }
    
    public function getInsurancePhNum()
    {
        return $insurancePhNum;
    }
}

?>
