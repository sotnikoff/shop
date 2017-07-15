<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 12.07.17
 * Time: 21:30
 */

namespace App\Controllers;


use App\Migrations\ItemsMigration;
use Kernel\Controller;
use Kernel\ViewHandler as View;
use Kernel\DB\DB;

class MainController extends Controller
{
    public function index()
    {
        $view = new View('Test');
        $view->assignParameter('title','Магазин костылей');
        $view->render();
    }

    public function test()
    {
        new ItemsMigration();
    }

}