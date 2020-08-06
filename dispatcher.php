<?php
namespace AHT;
use AHT\Controllers\tasksController;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadModelController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadModelController()
    {
        $name = $this->request->controller . "Controller";
        $nameClass = 'AHT\Controllers\\'. $this->request->controller . "Controller";

        $fileModel = ROOT . 'Models/'. ucfirst(str_replace('Controller', '', $name)) .'.php';
        $fileController = ROOT . 'Controllers/' . $name . '.php';

        require($fileModel);
        require($fileController);
        
        $controller = new $nameClass;
        return $controller;
    }

}
?>