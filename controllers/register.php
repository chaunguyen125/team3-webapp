<?php
class Register extends Controller {
    public static function approvalRegister($email) {
        return RegisterModel::approveRegister($email);
    }
}

?>