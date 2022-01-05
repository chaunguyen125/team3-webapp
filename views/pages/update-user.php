<?php
if (isset($_COOKIE['userlogin'])) {

    session_start();

    $isDone = false;

    if (isset($_POST['Name']) && isset($_POST['Email']) && isset($_POST['Password'])) {

        //Xét email đã tồn tại chưa
        $isExist = Home::getIdUserByEmail($_POST['Email']);
        if ($isExist && ($_COOKIE['userlogin'] != $_POST['Email'])) {
            $mess1 = 'Email is available!';
        } else {
            UpdateUser::updateUser($_POST['Name'], $_POST['Password'], $_POST['Email']);
            $isDone = true;
            if (!$isDone) {
                echo "<script>alert('Failed. Please contact us to solve this problem.');</script>";
            } else {
                header("Location: login");
            }
        }
    }
} else {
    if (isset($_SESSION['email'])) {
        unset($_SESSION['email']); // xóa session login
        setcookie('userlogin', $_COOKIE['userlogin'], time() - 1000);
        header("Location: home");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="container center">
        <h1>
            Update user
        </h1>

        <span class="form-message">
            <?php
            if (isset($mess1)) {
                echo $mess1;
            }

            ?>
        </span>

        <?php foreach ($data['user_info'] as $user_info) : extract($user_info); ?>
            <form action="" method="POST">

                <div class="form-item">
                    <input type="text" name="Name" value="<?= $users_name ?>" required placeholder="Name...">
                </div>
                <div class="form-item">
                    <input type="Email" name="Email" value="<?= $email ?>" required placeholder="Email...">
                </div>
                <div class="form-item">
                    <input type="password" name="Password" value="<?= $user_password ?>" required placeholder="Address...">
                </div>
                <div class="btn-wrap d-flex align-items-center justify-content-between m-auto" style="width: 400px">
                    <button class="btn green" name="submit" type="submit">Update</button>
                    <a class="d-block ms-2 text-decoration-none text-light rounded bg-info text-center" style="height: 30px; line-height: 30px; width: 55px;" href=" home ">Cancel</a>

                </div>

                <p>You will be redirected after updating is success!</p>
            </form>
        <?php endforeach; ?>
    </div>

</body>

</html>