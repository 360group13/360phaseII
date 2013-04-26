<?php

include_once 'dbconnect.class.php';
$con = new dbconnect();
$con->connect();

class Archive{
        private $username;
        private $weight;
        private $bloodPressure;
        private $sugarLevel;
        private $patientid;
        private $employee;
        private $prescription;
        private $observation;
        private $archiveID;
        private $date;
        
        function __construct($patientid)
        {
            $this->patientid = $patientid;
        }
        
        public function store()
        {
            
        }
        
        public function addPrescription($prescription)
        {
            $this->prescription = $prescription;
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
