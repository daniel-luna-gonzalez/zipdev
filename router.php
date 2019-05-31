<?php

/**
 * Build an object using the request with the below structure:
 *
 *      ["controller"]=>
 *           string(9) "PhoneBook"
 *           ["action"]=>
 *           string(5) "index"
 *           ["requestMethod"]=>
 *           string(3) "GET"
 *           ["params"]=>
 *           ["key" => "value"]
 *       ]
 *
 * Class Router
 */
class Router
{
    static  $uri;

    public function __construct()
    {

    }

    /**
     * @param $url
     * @param $objRrequest
     * @return object|null
     */
    static public function parse($url, $objRrequest)
    {
        try {
            self::$uri = explode("/", parse_url($objRrequest->url, PHP_URL_PATH));

            if(!self::isRequest())
                return null;

            $request = (object)[];
            $request->controller =self::controllerName();
            $request->action = self::action();
            $request->requestMethod = self::requestMethod();
            $request->params = self::params($request);

            return $request;
        } catch(Exception $e) {
            echo __CLASS__." ".__METHOD__." Exception::".$e->getMessage();

            return null;
        }

    }

    static function isRequest() {
        return (php_sapi_name() == "cli") ? false : true;
    }

    /**
     * @return mixed
     */
    static function controllerName() {
        return self::$uri[1];
    }

    /**
     * @return mixed
     */
    static function requestMethod() {
        return  $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return mixed
     */
    static function action() {
        return self::$uri[2];
    }

    /**
     * @param $request
     * @return array
     */
    static function params($request) {
        switch ($request->requestMethod) {
            case 'GET':
                return $_GET;
            case 'POST':
                return self::getParamsFromRequestMethod();
            case 'PUT':
                parse_str(file_get_contents("php://input"),$post_vars);
                $request->params = $post_vars;
                return $request;

             return $request;
        }
    }

    static function getParamsFromRequestMethod() {
        $params = array_merge($_GET, $_POST);

        $input = file_get_contents('php://input');
        $json = json_decode($input, true);

        if(is_array($json))
            return array_merge($params, $json);

        else
            return $params;

    }
}
