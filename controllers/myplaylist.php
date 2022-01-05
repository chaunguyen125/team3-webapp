<?php
class MyPlaylist extends Controller {
    public static function index(){
        $user_id = MyPlaylistModel::getIdUserByEmail($_COOKIE['userlogin']);

        $my_playlist  = MyPlaylistModel::getMyPlaylist($user_id);

        //gọi và show dữ liệu ra view
        Controller::view('my-playlist',[
            'my_playlist' => $my_playlist
        ]);
    }

    public static function DeleteMyplaylist ($user_email, $id_playlist) {
        $user_id = MyPlaylistModel::getIdUserByEmail($user_email);

        MyPlaylistModel::deleteMyPlaylistHandler($id_playlist, $user_id);

        header("Location: my-playlist");

    }
    
}

?>