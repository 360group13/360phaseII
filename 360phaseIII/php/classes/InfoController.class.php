<?php

include_once('dbconnect.class.php');
//include_once('Employee.class.php');
include_once('User.class.php');

$con = new dbconnect();
$con->connect();

class InfoController
{
    private $user;
    
    function __construct() {  
        
    }
    
    public function login($username, $password){
        $result1 = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$password';");
        if (mysql_num_rows($result1) != 1) { // add this check.
            return false;
        }
        else{
            // $_SESSION["user"] = serialize(new User(mysql_fetch_assoc($result)));  
            $_SESSION['logged_in'] = 1;
            $_SESSION['user'] = serialize($this->getUser($username));
            return true;
        }
    }
    
    public function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['logged_in']);  
        session_destroy();  
    }
    
    // returns the type of the user
    public function getUsertype($username){
        $this->user = new User($username);
        return $this->user->userType;
    }
    public function getUser($username){
        $this->user = new User($username);
        return $this->user;
    }
    
     public function getInfo($username){
        $this->user = new User($username);
        return $this->user->getInfo();
    }
    public function getJsonInfo($username){
        $this->user = new User($username);
        return $this->user->getJsonInfo();
    }
    
    public function getPatients($username){
        $employee = new Employee($username);
        $patients = $employee->getPatients();
        return $patients;
    }
}

?>
