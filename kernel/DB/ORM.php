<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 15.07.17
 * Time: 20:44
 */

namespace Kernel\DB;

use Kernel\DB\DB;

abstract class ORM
{

    protected $table;
    protected $fields;

    public function __construct()
    {

    }

    public function save()
    {

    }

    /**
     * @param array $params
     */
    public static function create(array $params)
    {
        $instance = new static();
        $verifyParams = [];

        foreach ($params as $key => $val)
        {
            if (in_array($key,$instance->fields))
            {
                $verifyParams[$key] = $val;
            }
        }

        $id = DB::create($instance->table,$verifyParams);

        return $instance;

    }

    public static function findByQuery()
    {
        //TODO: findByQuery()
    }

    public static function find()
    {
        //TODO: find()
    }

    public static function getAll()
    {
        //TODO : getall();
    }
}