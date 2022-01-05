<?php
class MyPlaylistModel extends Controller {
    public static function getIdUserByEmail($user_email){
        $sql = "SELECT id FROM users WHERE email = '$user_email'";
        $result = self::select($sql);
        return $result['id'];
    }

    public static function getMyPlaylist($user_id){
        $sql = "SELECT id_playlist from my_playlist where id_user = '$user_id'";
        $list_id = self::query($sql);
        
        $playlist = array();

        for($i=0; $i<count($list_id); $i++) {
            $sl = $list_id[$i]['id_playlist'];
            $select_playlist = "SELECT * from all_playlist where id = '$sl'";
            $playlist[] = self::select($select_playlist);
            
            
        }
        return $playlist;
        
    }

    public static function deleteMyPlaylistHandler($id_playlist, $id_user) {
        $sql = "DELETE FROM my_playlist where id_user = '$id_user' and id_playlist = '$id_playlist'";
        // echo "<script>console.log('Debug Objects: " .  $sql . "' );</script>";
        self::delete($sql);
    }
}


?>