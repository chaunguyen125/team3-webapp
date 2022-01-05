<?php
class UpdateUser extends Controller {
    public static function index() {
        $user_info = UpdateUserModel::renderView($_GET['id']);

        Controller::view('update-user',[
            'user_info' => $user_info
        ]);
    }

    public static function updateUser($name, $pass, $email) {
        UpdateUserModel::updateUserHandler($_GET['id'], $name, $email, $pass);
    }
}

?>