<?php

class RegisterModel extends Controller {
    public static function approveRegister($email) {
        $check_user = "SELECT id FROM users 
        WHERE email = :em" ;
    
        $row = Database::select($check_user, array(
            ':em' => $email
        ));

        if($row===false) return true;
        else return false;
    }
}


?>