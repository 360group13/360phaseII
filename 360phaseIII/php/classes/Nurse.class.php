<?php

require_once 'dbconnect.class.php';
include 'Patient.class.php';

class Nurse extends Employee
{
    function __construct1($username)
    {
        parent::__construct($username);
    }
    
    function __construct2($nurseID, $empty)
    {
        parent::__construct($nurseID, $empty);
    }
    
    public function setMetrics($patientID, $weight, $bp, $sugar)
    {
        $patient = new Patient($patientID, "");
        $patient->setMetrics($weight, $bp, $sugar);
    }
    
    public function addPatients($patient)
    {
        $this->patient = $patient;
    }
    
    public function getPatient()
    {
        return $patient;
    }
}

?>
