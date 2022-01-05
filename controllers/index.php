<?php
class Index extends Controller {

    public static function index(){
        //gọi method getPlaylist
       $all_playlist  = Home::getPlaylist();

       //gọi và show dữ liệu ra view
       Controller::view('home',[
           'all_playlist' => $all_playlist
       ]);
    }

    public static function addPlaylist($user_email, $id_playlist){
        $user_id = Home::getIdUserByEmail($user_email);
        Home::AddPlaylistHandler($user_id, $id_playlist);
    }

}

?>