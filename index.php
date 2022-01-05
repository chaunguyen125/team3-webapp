<?php
// echo $_GET['url'];
spl_autoload_register(function($class) {
    if(file_exists('./classes/'.$class.'.php'))
        require_once './classes/'.$class.'.php';
    else if(file_exists('./controllers/'.$class.'.php'))
        require_once './controllers/'.$class.'.php';
    else if(file_exists('./models/'.$class.'.php'))
        require_once './models/'.$class.'.php';

});
require_once './routes.php';

?>