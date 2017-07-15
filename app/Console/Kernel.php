<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 16.07.17
 * Time: 0:06
 */

namespace App\Console;


use App\Migrations\ItemsMigration;

class Kernel
{

    private $rawArgs;

    function __construct($arguments)
    {
        $this->rawArgs = $arguments ;

        $this->routes();

    }

    private function routes()
    {

        if(!array_key_exists(1,$this->rawArgs))
        {
            return false;
        }

        switch ($this->rawArgs[1])
        {
            case 'migrate':
                new ItemsMigration();
                break;
            case 'create':
                echo "12333\n";
                break;
            default:
                return false;
        }


    }

}