<?php

include('dbconnect.class.php');

$con = new dbconnect();
$con->connect();

class InfoController
{
    
    public function login($username, $password){
        $result1 = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$password';");
        
        if (mysql_num_rows($result1) != 1) { // add this check.
            return false;
        }
        else{
            return true;
        }
    }
    
    // returns the type of the user
    public function getUsertype($username){
        $result = mysql_query("SELECT user_type FROM users WHERE username = '$username';");
        $usertype = mysql_fetch_array($result);
        return $usertype['user_type'];
    }
    
    
}

?>
