<?php


$pdo = Database::connect();


if(isset($_POST['playlist_id'])){
    
    if(isset($_POST['playlist_id']) && isset($_COOKIE['userlogin'])) {
    
        
        
        $id_query = "SELECT id FROM users 
        WHERE email = :em";
    
        $user_id_arr = Database::select($id_query,array(
            ':em'=> $_COOKIE['userlogin']
    ));
    
        
        // DUYỆT XEM USER ĐÃ THÊM CHƯA
    
        $check_user = "SELECT id FROM my_playlist 
        WHERE id_user = :iu and id_playlist = :ip" ;
    
        $row = Database::select($check_user, array(
            ':iu' => $user_id_arr['id'],
            ':ip' => $_POST['playlist_id'],
        ));
        if($row === FALSE) {
            Index::addPlaylist($_COOKIE['userlogin'], $_POST['playlist_id']);
        }
        else
        echo "<script>alert('You have added this playlist!');</script>";
    
    }
    else {
        header("Location: login");
    }
}




require_once './views/includes/header.php';
?>

<main>
    <div class="container container-lg container-md container-sm mt-4">
        <div class="slide">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="./assets/img/tungnoti.jpg" class="d-block" style="height: 700px" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./assets/img/avatar.jpg" class="d-block" style="height: 700px" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/thaimap.jpg" class="d-block" style="height: 700px" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="row row-cols-lg-6 row-cols-md-4 playlist-list mb-4">
        <?php foreach($data['all_playlist'] as $all_playlist): extract($all_playlist); ?>
            <div class="col mt-4 playlist-item">
                <div class="playlist-item__link">
                    <div class="playlist-item__img" style="background-image: url(./assets/img/<?= $img ?>.jpg);" alt="<?= $name_playlist ?>"></div>
                </div>
                <div style="height: 50px;">
                    <p class="text-light text-decoration-none mt-2 d-block playlist-item__description playlist-item__text-link">
                    <?= $name_playlist ?>
                    </p>
                </div>
                <form action="" method="POST">
                    <input type="hidden" value="<?= $id ?>" name="playlist_id">
                    <button name="button" class="btn btn-warning form-add-playlist-submit">Add Playlist</button>
                </form>
            </div>

            <?php endforeach; ?>
        </div>
    </div>
</main>


<?php

require_once './views/includes/footer.php';
?>