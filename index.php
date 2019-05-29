<?php
define('BASE_PATH', getcwd());
define('APP_PATH', BASE_PATH.'/app/');
require(APP_PATH . 'helpers/Helper.php');
require(APP_PATH . 'config/db.php');
require(BASE_PATH . '/router.php');
require(BASE_PATH . '/request.php');
require(BASE_PATH . '/dispatcher.php');
$dispatch = new Dispatcher();
$dispatch->dispatch();
