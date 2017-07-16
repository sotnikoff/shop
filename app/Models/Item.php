<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 16.07.17
 * Time: 9:09
 */

namespace App\Models;


use Kernel\DB\ORM;

class Item extends ORM
{
    protected $table = 'items';
    protected $fields = ['name','photo'];
}