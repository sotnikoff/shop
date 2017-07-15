<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 15.07.17
 * Time: 21:42
 */

namespace Kernel\DB;


class DBTable
{
    public $tableName;
    public $columns;

    public function __construct($tableName,array $columns)
    {

        $this->tableName = $tableName;
        $this->columns = $columns;

        return $this;
    }
}