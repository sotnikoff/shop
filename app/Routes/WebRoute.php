<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 12.07.17
 * Time: 21:28
 */

namespace App\Routes;

use Kernel\RouteHandle;

class WebRoute extends RouteHandle
{
    public function initializeRoutes()
    {
        $this->registerPath([
            'path'          =>      '/',
            'controller'    =>      'MainController',
            'method'        =>      'index',
            'requestMethod' =>      'GET'
        ]);

        $this->registerPath([
        'path'          =>      '/test',
        'controller'    =>      'MainController',
        'method'        =>      'test',
        'requestMethod' =>      'GET'
    ]);
    }
}