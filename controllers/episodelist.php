<?php
class EpisodeList extends Controller {
    public static function index(){
        

        $playlist_item  = ItemOfPlaylist::getEpisodeList($_GET['id']);

        //gọi và show dữ liệu ra view
        Controller::view('episode-list',[
            'playlist_item' => $playlist_item
        ]);
    }
}

?>