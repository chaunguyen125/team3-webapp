<?php


$mess = [];
$pdo = Database::connect();

if (isset($_POST['email']) && isset($_POST['password'])) {

  if ($_POST['email'] == "" && $_POST['password'] == "") {
    $mess1 = 'User name and password are required';
  } else {
    $mess1 = null;
    $sql = "SELECT users_name FROM users 
                WHERE email = :em AND user_password = :pw";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(array(
      ':em' => $_POST['email'],
      ':pw' => $_POST['password']
    ));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
   

    if ($row === FALSE) {
      $hash = hash('sha256', $_POST['password']);
      error_log("Login fail " . $_POST['email'] . " $hash");
      $mess3 = 'Incorrect password';
    } else {
      $mess3 = null;
      $_SESSION['email'] = $_POST['email'];
      error_log("Login success " . $_POST['email']);
      echo "<p>Login success.</p>\n";
      header("Location: home");
      // header('Set-Cookie: cross-site-cookie=name; SameSite=None; Secure');
      setcookie('userlogin', $_POST['email'], time() + 1000);
    }
  }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./assets/css/form-validate.css">
</head>

<body>
  <div class="main">

    <form action="" method="POST" class="form" id="form-1">
      <h3 class="heading">Đăng nhập</h3>
      <p class="desc"></p>

      <div class="spacer"></div>

      <!-- <div class="form-group">
            <label for="fullname" class="form-label">Tên đầy đủ</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Sơn Đặng" class="form-control">
            <span class="form-message"></span>
          </div> -->

      <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">


        <span class="form-message"><?php
                                    if (isset($mess1)) {
                                      echo $mess1;
                                    }

                                    ?></span>
      </div>

      <div class="form-group">
        <label for="password" class="form-label">Mật khẩu</label>
        <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
        <span class="form-message"><?php
                                    if (isset($mess3)) {
                                      echo $mess3;
                                    }

                                    ?></span>
      </div>


      <!-- <div class="form-group">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
            <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
            <span class="form-message"></span>
          </div> -->
      <!-- <div class="form-group">
            <label for="gender" class="form-label">Giới tính</label>
            <diV><input name="gender"  type="checkbox" value="male" class="form-control"> Nam</diV>
            <diV><input name="gender"  type="checkbox" value="female" class="form-control"> Nữ</diV>
            <diV><input name="gender"  type="checkbox" value="other" class="form-control"> Khác</diV>
            <span class="form-message"></span>
          </div> -->

      <button class="form-submit">Đăng nhập</button>
    </form>

  </div>

  <!-- <script src="./assets/js/main.js"></script> -->
  <!-- <script>
        //Mong muốn
        Validator({
            form: '#form-1',
            errorSelector: '.form-message',
            formGroup: '.form-group',
            rules:[
                Validator.isRequire('#fullname', 'Vui lòng nhập tên đầy đủ'),
                Validator.minLength('#password', 8),
                Validator.isRequire('#email'),
                Validator.isEmail('#email'),
                Validator.isRequire('#password_confirmation'),
                Validator.isRequire('input[name="gender"]'),
                Validator.isConfirmed('#password_confirmation', function(){
                    return document.querySelector('#form-1 #password').value;
                }, 'Mật khẩu nhập lại không chính xác')

            ],
            onSubmit: function(data) {
              console.log(data);
            } 
        });

    </script> -->
</body>

</html>