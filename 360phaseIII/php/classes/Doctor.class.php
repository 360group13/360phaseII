<?php

require_once 'dbconnect.class.php';
include 'Patient.class.php';

class Doctor extends Employee 
{
    private $patient;
    
    function __construct1($username)
    {
        parent::__construct($username);
    }
    
    function __construct2($doctorID, $empty)
    {
        parent::__construct($doctorID, $empty);
    }
    
    public function setMetrics($patientID, $weight, $bp, $sugar)
    {
        $patient = new Patient($patientID, "");
        $patient->setMetrics($weight, $bp, $sugar);
    }
    
    public function setComments($observations)
    {
        $patient->setComments($observations);
    }
    
    public function setPrescription($prescription)
    {
        $patient->setPrescription($prescription);
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
