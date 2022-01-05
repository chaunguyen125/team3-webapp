<?php
if (isset($_COOKIE['userlogin'])) {

    session_start();
    $name = Home::getUserNameByEmail($_COOKIE['userlogin']);
    $id = Home::getIdUserByEmail($_COOKIE['userlogin']);
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
    <link rel="stylesheet" href="./assets/css/main.css">

</head>

<body>
    <div class="app bg-dark">
        <header>
            <div class="container container-lg container-md container-sm">
                <nav class="navbar navbar-expand-lg navbar-dark ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="home">Group 3</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">

                                    <a class="nav-link active" aria-current="page" href="home">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                        </svg>
                                        Home
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                                        </svg>
                                        Help
                                    </a>
                                </li>
                                

                                    <?php
                                    if (isset($_COOKIE['userlogin'])) {
                                        echo '
                                        <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            '.$name.'
                                        </a>
                                        
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href="update-user&id='.$id.'">Update Profile</a></li>
                                            <li><a class="dropdown-item" href="my-playlist">My Playlist</a></li>
                                            <li><a class="dropdown-item" href="logout">Log out</a></li>
                                        </ul>
                                        ';
                                    } else {
                                        echo '
                                        <li class="d-flex align-items-center">
                                       
                                        <a class="d-block ms-2 text-decoration-none text-light rounded bg-info text-center" style="height: 30px; line-height: 30px; min-width: 55px;" href=" login ">Login</a>
                                        <a class="d-block ms-2 text-decoration-none text-light rounded bg-info text-center" style="height: 30px; line-height: 30px; min-width: 70px;" href=" register ">Register</a>
                                        
                                        ';
                                    }

                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>