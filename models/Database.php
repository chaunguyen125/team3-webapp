
<?php

class Database {
    public static $host = "127.0.0.1";
    public static $dbName ="film-collections";
    public static $userName = "fred";
    public static $password = "zap";

    public static function connect() {
        $pdo = new PDO('mysql:host=MYSQL5046.site4now.net;dbname=db_a7ea27_team3we',
        'a7ea27_team3we', 'chautungthai');

        // $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8",
        // self::$userName, self::$password);
        
        //ERRMODE_SILENT is default.
        //ERRMODE_WARNING will still keep executing code.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    //lấy dữ liệu
    public static function query($query, $params = array()) {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if(explode(' ', $query)[0]=='SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
    }

    public static function select($query, $params = array()) {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if(explode(' ', $query)[0]=='SELECT'){
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    

    public static function add($query) {
        $statement = self::connect()->prepare($query);
        $statement->execute();
        $statement->fetchAll();
            
        
    }

    public static function delete($query) {
        $statement = self::connect()->prepare($query);
        $statement->execute();
        
        $statement->fetchAll();
        // echo "<script>console.log('Debug Objects: Here' );</script>";
    }

    public static function update($query) {
        $statement = self::connect()->prepare($query);
        $statement->execute();
        
        $statement->fetchAll();
    }

}

?>
