<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 15.07.17
 * Time: 21:56
 */

namespace Kernel\DB;

use Kernel\DB\DBColumnTypes\Varchar;

class DBColumn
{
    public static function varchar($columnName)
    {
        return new Varchar($columnName);
    }
}