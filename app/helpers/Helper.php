<?php
require APP_PATH.'/Libraries/Logger.php';

if (! function_exists('logger')) {

    function logger($message = null)
    {
        try {
            $log = new Logger();
            $log->write($message);
        } catch (Exception $e) {
            echo "Exception in logger: ".$e->getMessage();
        }

    }
}

if (! function_exists('response')) {

    function logger($message = null)
    {
        try {
            $log = new Logger();
            $log->write($message);
        } catch (Exception $e) {
            echo "Exception in logger: ".$e->getMessage();
        }

    }
}
