<?php
class Dispatcher
{
    private $request;

    public function dispatch()
    {
        try {
            $this->request = new Request();
            $this->request = Router::parse($this->request->url, $this->request);
            $controller = $this->loadController();
            $result = call_user_func_array([$controller, $this->request->action], [$this->request]);
            return $result;
        } catch (Exception $e) {
            echo "Dispatcher exception::" . $e->getMessage();
        }

    }
    public function loadController()
    {
        $name = $this->request->controller;
        $file = APP_PATH . 'Controllers/' . $name . 'Controller.php';

        if(!file_exists($file))
            throw new Exception("Controller not found $name");

        require($file);
        $controller = new $name();
        return $controller;
    }
}
