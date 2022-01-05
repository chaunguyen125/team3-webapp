<?php

class UpdateUserModel extends Controller {
    public static function renderView($id) {
        $check_user = "SELECT * FROM users 
        WHERE id = :id" ;
    
        $row = self::query($check_user, array(
            ':id' => $id
        ));
        return $row;
    }

    public static function updateUserHandler($id, $name, $email, $pass) {
        $sql = "UPDATE users
        SET users_name = '$name', user_password = '$pass', email = '$email'
        WHERE id = '$id'";
        Database::update($sql);

    }
}


?>