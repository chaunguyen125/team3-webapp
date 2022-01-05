<?php
class ItemOfPlaylist extends Controller {
    

    public static function getEpisodeList($id_playlist){
        $sql = "SELECT id_all_episode FROM item_playlist WHERE id_playlist = $id_playlist";
        $list_id = self::query($sql);
        
        $playlist_item = array();

        for($i=0; $i<count($list_id); $i++) {
            $sl = $list_id[$i]['id_all_episode'];
            $select_playlist = "SELECT * from all_episode where id = '$sl'";
            $playlist_item[] = self::select($select_playlist);   
        }
        return $playlist_item;
    }
}


?>




