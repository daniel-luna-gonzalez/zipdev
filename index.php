<?php
init();

function init() {
    define('BASE_PATH', getcwd());
    define('APP_PATH', BASE_PATH.'/app/');


//class directories to load
    $directories = array(
        APP_PATH.'System/',
        APP_PATH.'Models/',
        APP_PATH.'trait/'
    );

    __autoload($directories);

    require(APP_PATH . 'helpers/Helper.php');
    require(APP_PATH . 'config/db.php');
    require(BASE_PATH . '/router.php');
    require(BASE_PATH . '/request.php');
    require(BASE_PATH . '/dispatcher.php');

}

function __autoload($directories){

    foreach($directories as $directory) {
        foreach (scandir($directory) as $classFile) {
            if(strcasecmp('.', $classFile) == 0 or strcasecmp('..', $classFile) == 0)
                continue;


            if(file_exists($directory.$classFile )) {
                require($directory.$classFile);
            }
        }

    }
}

$dispatch = new Dispatcher();
$dispatch->dispatch();
