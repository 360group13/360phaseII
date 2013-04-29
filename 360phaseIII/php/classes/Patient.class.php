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
    
    function __construct($username)
    {
        parent::__construct($username);
        $result = mysql_query("SELECT * FROM patients WHERE username = '$username';");
        $patient = mysql_fetch_array($result);
        $this->patientID = $patient['patient_id'];
        $this->insuranceComp = $patient['insuranceComp'];
        $this->insuranceStat = $patient['insuranceState'];
        $this->insuranceID = $patient['insurance_id'];
        $this->insurancePhNum = $patient['insurance_ph'];
        $this->doctor = $patient['doctor_id'];
        $this->nurse = $patient['nurse_id'];
    }
    
    function __construct2($patientID, $empty)
    {
        $result = mysql_query("SELECT * FROM patients WHERE patient_id = '$patientID';");
        $patient = mysql_fetch_array($result);
        
        parent::__construct($patient['username']);
        $this->patientID = $patient['patient_id'];
        $this->insuranceComp = $patient['insuranceComp'];
        $this->insuranceStat = $patient['insuranceState'];
        $this->insuranceID = $patient['insurance_id'];
        $this->insurancePhNum = $patient['insurance_ph'];
        $this->doctor = $patient['doctor_id'];
        $this->nurse = $patient['nurse_id'];
    }
    
    public function setMetrics($weight, $bp, $sugar)
    {
        
    }
    
    function getJsonPatientInfo()
    {
        $info = $this->username."|".$this->firstName."|".$this->lastName.
                "|".$this->gender."|".$this->dateOB."|".$this->address."|".
                $this->city."|".$this->state."|".$this->zip."|".$this->phone.
                "|".$this->insuranceComp."|".$this->insuranceID;
        return $info;
    }
    
    public function getMetrics()
    {
        $sql = mysql_query("SELECT * FROM archives WHERE patient_id = '$this->patientID' ORDER BY date_stamp DESC;");
        $patients = array();
        $i = 0;
        while($result = mysql_fetch_array($sql)){
            $patients[$i] = $result[7]."|".$result[2]."|".$result[4]."|".$result[3]."|".$result[5]."|".$result[6];
            $i++;
        }
        return json_encode($patients);
    }
    
    public function setInfo($username, $password, $firstname, $lastname, $address, $city, $state, $zip, $insured, $insComp, $insID, $insPh, $docId, $nurId)
    {
        $this->username = $username;
        $this->password = $password;
        $this->firstName = $firstname;
        $this->lastName = $lastname;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->insuranceComp = $insComp;
        $this->insuranceStat = $insured;
        $this->insuranceID = $insID;
        $this->insurancePhNum = $insPh;
        $this->doctor = $docId;
        $this->nurse = $nurId;
    }
    
    public function update()
    {
        $sql = mysql_query("SELECT * FROM patients WHERE patient_id = '$this->patientID';");
        if(mysql_num_rows($sql) == 0){
            $result1 = mysql_query("INSERT INTO users username, password, first_Name, last_Name, gender, dateOB, address, city, state, zip, phone, user_type
                         VALUES '$this->username', '$this->password', '$this->firstName', '$this->lastName', '$this->gender', $this->dateOB, '$this->address', '$this->city', '$this->state', $this->zip, $this->phone, 'Patient';");
            $result2 = mysql_query("INSERT INTO patients username, insuranceComp, insurance_id, insurance_ph, doctor_id, nurse_id
                         VALUES '$this->username', '$this->insuranceComp', $this->insuranceID, $this->insurancePhNum, $this->doctor, $this->nurse;");
        }
        else{                
            $result1 = mysql_query("UPDATE users 
                         SET username = '$this->username', password = '$this->password', first_Name = '$this->firstName', last_Name = '$this->lastName', gender = '$this->gender', dateOB = $this->dateOB, address = '$this->address', city = '$this->city', state = '$this->state', zip = $this->zip, phone = $this->phone, user_type = 'Patient')
                         WHERE username = '$this->username';");
            $result2 = mysql_query("UPDATE patients 
                         SET username = '$this->username', insuranceComp = '$this->insuranceComp', insurance_id = $this->insuranceID, insurance_ph = $this->insurancePhNum, doctor_id = $this->doctor, nurse_id = $this->nurse)
                         WHERE username = '$this->username';");
        }
        
    }
}

?>
