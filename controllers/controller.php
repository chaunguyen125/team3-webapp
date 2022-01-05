<?php
class Controller extends Database{
    public static function CreateView($viewName) {
        require_once ("./views/pages/$viewName.php");
    }

    

    //method gọi view
    public static function view($view, $data = []){
        require_once './views/pages/'.$view.'.php';
    }
}
?>