<?php
/**
 * Created by PhpStorm.
 * User: mikhailsotnikov
 * Date: 15.07.17
 * Time: 20:58
 */

namespace Kernel\DB;

use \PDO;
use \PDOException;

class DB
{
    protected $connection;
    private $dsn;
    private $login;
    private $database;
    private $password;

    static $obj = null;

    public function __construct()
    {

        if(!$this->getSettings())
        {
            return false;
        }

        try
        {
            $this->connection = new PDO($this->dsn,$this->login,$this->password);
        }
        catch (PDOException $e)
        {
            print($e);
            exit();
        }

        return $this;

    }

    /**
     * @return mixed
     */
    public function getDatabase()
    {
        return $this->database;
    }

    private function getSettings()
    {
        $fileName = __DIR__ . '/../../settings.php';

        if(file_exists($fileName))
        {
            $data = require_once $fileName;
            $this->dsn = $data['DBDriver'].":host=".$data['DBHost'].";dbname=".$data['DBName'].";port=".$data['DBPort'];
            $this->login = $data['DBLogin'];
            $this->password = $data['DBPassword'];
            $this->database = $data['DBName'];
            return true;
        }

        return false;
    }

    public function executeRaw($query)
    {
        try
        {
            return $this->connection->exec($query);
        }
        catch (PDOException $e)
        {
            var_dump($e);
            return false;
        }
    }

    public static function create($table,$params)
    {
        //INSERT INTO `items` (`name`,`photo`) VALUES ('123','123');
        $vals = [];
        $cols = [];

        foreach ($params as $key => $val)
        {
            $cols[] = "`$key`";
            $vals[] = ":$key";
        }


        if(!self::$obj)
        {
            self::$obj = new static();
        }

        $connect = self::$obj->connection;

        $text = "INSERT INTO `".self::$obj->database."`.`".$table."` (".implode(',',$cols).") VALUES (".implode(',',$vals).")";

        $statement = $connect->prepare($text);

        foreach ($params as $key => $val)
        {
            $statement->bindValue(":$key",$val);
        }

        if(!$statement->execute())
        {
            var_dump($statement->errorInfo());
        }

        return self::$obj->connection->lastInsertId();

    }


    public static function query($query = null,$table)
    {
        if(!self::$obj)
        {
            self::$obj = new static();
        }

        $connect = self::$obj->connection;

        $text = "SELECT * FROM `".self::$obj->database."`.`".$table;



    }

}