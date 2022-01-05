<?php
if(!isset($_COOKIE['userlogin'])) {

    if (isset($_SESSION['email'])){
        unset($_SESSION['email']);
        unset($_SESSION['password']); // xóa session login
    }
    setcookie('userlogin', $_COOKIE['userlogin'], time() - 1000);
    header("Location: login");
    
}


if(isset($_COOKIE['userlogin'])) {
    if(isset($_POST['playlist_id_delete'])) {
        MyPlaylist::DeleteMyplaylist($_COOKIE['userlogin'], $_POST['playlist_id_delete']);

    }
}

require_once './views/includes/header.php';
?>
<main>
    <div class="container container-lg container-md container-sm">
        <p class="text-light fs-4">Tất cả playlist</p>
        <div class="row row-cols-lg-6 my-playlist pb-2">
        <?php foreach($data['my_playlist'] as $my_playlist): extract($my_playlist); ?>
            <div class="col mt-4 playlist-item">
                <a class="playlist-item__link" href="episode-list&id=<?= $id ?>">
                    <div class="playlist-item__img" style="background-image: url(./assets/img/<?= $img ?>.jpg);" alt="<?= $name_playlist ?>"></div>
                </a>
                <a class="text-light text-decoration-none mt-2 d-block playlist-item__description playlist-item__text-link" style="height: 50px;" href="episode-list&id=<?= $id ?>">
                <?= $name_playlist ?>
                </a>
                <div class="btn-wrap d-flex">
                    <form action="" method="POST">
                        <input type="hidden" value="<?= $id ?>" name="playlist_id_delete">
                        <button name="button" class="btn btn-warning form-add-playlist-submit">Delete Playlist</button>
                    </form>
                    <!-- <form action="" method="POST">
                        <input type="hidden" value="<?= $id ?>" name="playlist_id_play">
                        <button name="button" class="btn btn-warning form-add-playlist-submit">Play</button>
                    </form> -->
                    <a class="d-block ms-2 text-decoration-none text-light rounded bg-info text-center" style="height: 38px; line-height: 38px; width: 62px;" href=" episode-list&id=<?= $id ?> ">Play</a>
                </div>
            </div>
            <?php endforeach; ?>
            


            
        </div>
        </div>

    </div>
</main>
<?php
require_once './views/includes/footer.php';
?>