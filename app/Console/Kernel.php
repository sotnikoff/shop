<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 16.07.17
 * Time: 0:06
 */

namespace App\Console;


use App\Migrations\ItemsMigration;
use App\Models\Item;

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
                if(!array_key_exists(2,$this->rawArgs) or !array_key_exists(3,$this->rawArgs))
                {
                    echo "Error\n";
                    return false;
                }

                Item::create([
                    "name"=>$this->rawArgs[2],
                    "photo"=>$this->rawArgs[3],
                ]);

                break;
            default:
                return false;
        }


    }

}