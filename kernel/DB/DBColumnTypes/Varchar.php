<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 15.07.17
 * Time: 21:58
 */

namespace Kernel\DB\DBColumnTypes;


class Varchar
{
    protected $length;
    protected $nullable;
    protected $columnName;
    protected $columnType;

    function __construct($columnName)
    {
        $this->length = 255;
        $this->nullable = false;
        $this->columnName = $columnName;
        $this->columnType = "VARCHAR";
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @return mixed
     */
    public function getNullable()
    {
        return $this->nullable;
    }

    /**
     * @return mixed
     */
    public function getColumnName()
    {
        return $this->columnName;
    }

    /**
     * @return string
     */
    public function getColumnType()
    {
        return $this->columnType;
    }

    public function length($length)
    {
        $this->length = $length;
        return $this;
    }

    public function nullable()
    {
        $this->nullable = true;
        return $this;
    }

    public function getSqlString()
    {

        if($this->nullable)
        {
            $nullable = 'NOT NULL';
        }else{
            $nullable = 'NULL';
        }

        return "`".$this->columnName."` ".$this->columnType."(".$this->length.") ".$nullable.",";
    }
}