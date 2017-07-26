<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 12.07.17
 * Time: 21:30
 */

namespace App\Controllers;

use Kernel\Controller;
use Kernel\ViewHandler as View;

class MainController extends Controller
{
    public function index()
    {
        $view = new View('Test');
        $view->assignParameter('title','Магазин костылей');
        $view->render();
    }

    public function test($request)
    {
        $content = trim(file_get_contents("php://input"));
        var_dump($content);
    }

}