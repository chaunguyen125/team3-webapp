<?php
if (!isset($_COOKIE['userlogin'])) {

    if (isset($_SESSION['email'])) {
        unset($_SESSION['email']);
        unset($_SESSION['password']); // xóa session login
    }
    setcookie('userlogin', $_COOKIE['userlogin'], time() - 1000);
    header("Location: login");
}
require_once './views/includes/header.php';
?>
<main>
    <div class="container container-lg container-md container-sm">
        <p class="text-light fs-4">Tất cả tập phim</p>
        <div class="row row-cols-lg-2 my-playlist pb-2">
            <?php foreach ($data['playlist_item'] as $playlist_item) : extract($playlist_item); ?>
                <div class="col mt-4 playlist-item">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $url_episode ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <a class="text-light text-decoration-none mt-2 d-block playlist-item__description playlist-item__text-link" href="#">
                        <?= $name_episode ?> - Tập <?= $episode ?>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</main>
<?php
require_once './views/includes/footer.php';
?>