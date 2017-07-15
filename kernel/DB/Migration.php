<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 15.07.17
 * Time: 22:13
 */

namespace Kernel\DB;

use Kernel\DB\DB;

abstract class Migration
{

    private $tableName;
    private $columns;

    abstract function getTable();

    private $tableEntity;

    function __construct()
    {
        $this->tableEntity = $this->getTable();
        //var_dump($this->tableEntity);

        $this->tableName = $this->tableEntity->tableName;
        $this->columns = $this->tableEntity->columns;

        $this->getSqlQueryString();

        return $this;

    }

    private function parseColumns()
    {
        $strings = [];

        foreach ($this->columns as $column)
        {
            $strings[] = $column->getSqlString();
        }

        return implode("\n",$strings);

    }

    private function getSqlQueryString()
    {
        $columns = $this->parseColumns();

        $sqlString = "CREATE TABLE `shop`.`new_table` (
          `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
          ".$columns."
          PRIMARY KEY (`id`));";

        var_dump($sqlString);


    }

}