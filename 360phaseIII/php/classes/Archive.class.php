<?php

include_once 'dbconnect.class.php';
$con = new dbconnect();
$con->connect();

class Archive{
        private $username;
        private $weight;
        private $bloodPressure;
        private $sugarLevel;
        private $patient;
        private $employee;
        private $prescription;
        private $observation;
        private $archiveID;
        private $date;
        
        function __construct($weight, $bloodPressure, $sugarLevel, $patient, $employee, $prescription, $observation, $archiveID, $date)
        {
            $this->weight = $weight;
            $this->bloodPressure = $bloodPressure;
            $this->sugarLevel = $sugarLevel;
            $this->patient = $patient;
            $this->employee = $employee;
            $this->prescription = $prescription;
            $this->observation = $observation;
            $this->archiveID = $archiveID;
            $this->date = $date;
        }
        
        public function store()
        {
            $this->date = date("m-d-Y");
        }
        
        public function addPrescription($patientID, $prescription)
        {
            // todo
        }
        
        public function getMetrics($patientID)
        {
            // todo
        }
        
        public function checkUser($username)
        {
            // boolean
        }
        
        public function hasEmployee()
        {
            // todo
        }
        
        public function getArcID()
        {
            return $archiveID;
        }
        
        public function getBP()
        {
            return $bloodPressure;
        }
        
        public function getSL()
        {
            return $sugarLevel;
        }
        
        public function getWeight()
        {
            return $weight;
        }
        
        public function getPrescription()
        {
            return $prescription;
        }
        
        public function getDate()
        {
            return $date;
        }
        
        public function getPatient()
        {
            return $patient;
        }
        
        public function getEmployee()
        {
            return $employee;
        }
}

?>
