<?php
class Router
{
    static  $uri;

    public function __construct()
    {

        var_dump(self::$uri); die(); echo "<pre>";
    }

    static public function parse($url, $request)
    {
        try {
            $url = trim($url);
            self::$uri = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
            $request->controller =self::controllerName();
            $request->action = self::getAction();
            $request->requestMethod = self::requestMethod();
            $request->params = self::getParams($request);

        } catch(Exception $e) {

        }

    }

    static function controllerName() {
        return self::$uri[1];
    }

    static function requestMethod() {
        return  $_SERVER['REQUEST_METHOD'];
    }

    static function getAction() {
        return self::$uri[2];
    }

    static function getParams($request) {
        $params = [];
        switch ($request->requestMethod) {
            case 'GET':
                return $_GET;
            case 'POST':
                return $_POST;
            case 'PUT':
                parse_str(file_get_contents("php://input"),$post_vars);
                $request->params = $post_vars;
                return $request;

             return $request;
        }
    }
}
