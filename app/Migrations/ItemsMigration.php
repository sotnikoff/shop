<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 15.07.17
 * Time: 22:12
 */

namespace App\Migrations;

use Kernel\DB\Migration;
use Kernel\DB\DBTable;
use Kernel\DB\DBColumn;

class ItemsMigration extends Migration
{
    function getTable()
    {
        return new DBTable('items',[
            DBColumn::varchar('name')->length(100),
            DBColumn::varchar('photo')->nullable(),
        ]);
    }
}