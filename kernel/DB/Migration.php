<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 15.07.17
 * Time: 22:13
 */

namespace Kernel\DB;

abstract class Migration
{

    private $tableName;
    private $columns;
    private $DB;

    abstract function getTable();

    private $tableEntity;

    function __construct()
    {
        $this->tableEntity = $this->getTable();
        //var_dump($this->tableEntity);

        $this->tableName = $this->tableEntity->tableName;
        $this->columns = $this->tableEntity->columns;

        $this->DB = new DB();

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

        $sqlString = "CREATE TABLE `".$this->DB->getDatabase()."`.`".$this->tableName."` (
          `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
          ".$columns."
          PRIMARY KEY (`id`));";


        if($this->DB->executeRaw($sqlString) !== false)
        {
            echo "CREATED $this->tableName\n";
        }
        else
        {
            echo "SOMETHING WENT WRONG\n";
        }


    }

}