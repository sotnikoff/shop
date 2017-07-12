<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 12.07.17
 * Time: 21:30
 */

namespace Kernel;


abstract class Controller
{

    protected $parameters;
    protected $postData;

    public function __construct()
    {
        $this->parameters = $_GET;
        $this->postData = $_POST;
    }
}