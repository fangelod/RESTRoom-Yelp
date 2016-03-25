<?php

class Login
{
    private $id;
    private $username;
    private $password;
    
    public static function create($username, $password) {
        $mysqli = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb")
        
        $result = $mysqli->query("INSERT INTO Login VALUES(0, " . $username . ", " . $password . ")");
        
        if ($result) {
            // $new_id =
            return new Login($new_id, $username, $password);
        }
        return null;
        
    }
    
    public function accountExists($username) {
        $mysqli = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");
        $result = $mysqli->query("SELECT * FROM Login WHERE username = " . $username);
        if ($result) {
            if ($result->num_rows == 0) {
                return false;
            }
            return true;
        }
    }
    
    public static function getUser($username) {
        
    }
    
    public function setPassword($username, $password) {
        $mysqli = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");
        $result = $mysqli->query("UPDATE Login SET password = " . $password . "WHERE username = " . $username);
        
    }
    
}

?>