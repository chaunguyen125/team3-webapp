<?php session_start(); 
 
if (isset($_SESSION['email'])){
    unset($_SESSION['email']); // xóa session login
}
header("Location: home");
setcookie('userlogin', $_COOKIE['userlogin'], time() - 1000);
?>
