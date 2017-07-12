<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 12.07.17
 * Time: 21:24
 */

namespace Kernel;


abstract class RouteHandle
{

    abstract public function initializeRoutes();

    /**
     * path =>
     *      [ controller
     *        method
     *      ]
     */
    protected $route;
    protected $params;
    private $paths;

    public function __construct()
    {
        if(strpos($_SERVER['REQUEST_URI'],'?') === false)
        {
            $this->route = $_SERVER['REQUEST_URI'];
        }else{
            $this->route = strstr($_SERVER['REQUEST_URI'],'?',true);
        }


        $this->params = $_GET;
    }

    /**
     * @param array $path[path,controller,method]
     */

    protected function registerPath(array $path)
    {

        $this->paths[$path['path']] = $path;
    }

    public function processPaths()
    {

        $this->initializeRoutes();



        $path = $this->paths[$this->route];

        if($_SERVER['REQUEST_METHOD'] !== $path['requestMethod'])
        {
            echo 'REQUEST METHOD ERROR';
            return;
        }

        $controller = "App\\Controllers\\" . $path['controller'];
        $controllerObject = new $controller($this->params);
        $controllerObject->{$path['method']}();
    }

}