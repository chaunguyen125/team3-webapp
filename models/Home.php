<?php
class Home extends Controller {
    public static function getPlaylist(){
        $sql = "SELECT * FROM all_playlist";
        $result = self::query($sql);
        return $result;
    }

    public static function getIdUserByEmail($user_email){
        $sql = "SELECT id FROM users WHERE email = '$user_email'";
        $result = self::select($sql);
        return $result['id'];
    }


    public static function getUserNameByEmail($user_email){
        $sql = "SELECT users_name FROM users WHERE email = '$user_email'";
        $result = self::select($sql);
        return $result['users_name'];
    }

    public static function AddPlaylistHandler($id_user, $id_playlist){
        $sql = "INSERT INTO my_playlist (id_user, id_playlist) values ($id_user, $id_playlist)";
        self::add($sql);
    }
}

?>