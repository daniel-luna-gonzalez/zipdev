<?php
require_once "index.php";
global $argc, $argv;


$pathCommnads = APP_PATH."command/";

$className = $argv[1] . "Command";

$commandClass = loadCommand($pathCommnads.$className.".php", $className);

$res = call_user_func_array(array($commandClass, "start"), []);


function loadCommand($pathCommand, $className)
{
    $name = basename($pathCommand);

    if(!file_exists($pathCommand))
        throw new Exception("Command not found $name");

    require($pathCommand);

    $controller = new $className();
    return $controller;
}
