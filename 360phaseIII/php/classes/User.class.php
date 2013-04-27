<?php  
//User.class.php  
  
include_once('dbconnect.class.php');

$con = new dbconnect();
$con->connect();
  
  
class User {
    protected $password;
    protected $firstName;
    protected $lastName;
    protected $gender;
    protected $dateOB;
    protected $address;
    protected $city;
    protected $state;
    protected $zip;
    protected $phone;
                        
    public $username;
    public $userType;    
  
    //Constructor is called whenever a new object is created.  
    //Takes an associative array with the DB row as an argument.  
    function __construct($username) {
        $result = mysql_query("SELECT * FROM users WHERE username = '$username';");
        $user = mysql_fetch_array($result);
        
        $this->username = (isset($user['username'])) ? $user['username'] : ""; 
        $this->userType = (isset($user['user_type'])) ? $user['user_type'] : "";
        $this->password = (isset($user['password'])) ? $user['password'] : "";
        $this->firstName = (isset($user['first_Name'])) ? $user['first_Name'] : "";
        $this->lastName = (isset($user['last_Name'])) ? $user['last_Name'] : "";
        $this->gender = (isset($user['gender'])) ? $user['gender'] : "";
        $this->dateOB = (isset($user['dateOB'])) ? $user['dateOB'] : "";
        $this->address = (isset($user['address'])) ? $user['address'] : "";
        $this->city = (isset($user['city'])) ? $user['city'] : "";
        $this->state = (isset($user['state'])) ? $user['state'] : "";
        $this->zip = (isset($user['zip'])) ? $user['zip'] : "";
        $this->phone = (isset($user['phone'])) ? $user['phone'] : "";
    }   
    
    function getInfo()
    {
        $info = array ('firstName' => $this->firstName);
        return $info;
    }
}
?>  