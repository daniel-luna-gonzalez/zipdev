<?php

if (! function_exists('logger')) {

    /**
     * @param null $message
     */
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

    /**
     * @param null $message
     */
    function response($message = null)
    {
        try {
            $response = new Response();
            return $response;
        } catch (Exception $e) {
            echo "Exception in response: ".$e->getMessage();
        }

    }
}

if (! function_exists('env')) {

    /**
     * @param null $key
     * @return mixed
     * @throws Exception
     */
    function env($key = null)
    {
        $envPath = BASE_PATH."/.env";

        if(!file_exists($envPath))
            throw new Exception(".env not found");

        $env = parse_ini_file($envPath);

        if(!isset($env[$key]))
            throw new Exception("not found key: $key in .env");

        return $env[$key];
    }
}


if (! function_exists('config')) {
    /**
     * @param null $configName
     * @return mixed
     * @throws Exception
     */
    function config($configName = null)
    {
        $configPath = APP_PATH."/config/$configName.php";

        if(!file_exists($configPath))
            throw new Exception("config not found");

        $config = include $configPath;


        return $config;
    }
}
