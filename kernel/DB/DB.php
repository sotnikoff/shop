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

        var_dump($params);

        foreach ($params as $key => $val)
        {
            $cols[] = "`$key`";
            $vals[] = ":$key";
        }



        $obj = new static();
        $connect = $obj->connection;

        $text = "INSERT INTO `".$obj->database."`.`".$table."` (".implode(',',$cols).") VALUES (".implode(',',$vals).")";

        $statement = $connect->prepare($text);

        foreach ($params as $key => $val)
        {
            var_dump($key,$val);
            $statement->bindValue(":$key",$val);
        }

        $statement->debugDumpParams();

        try
        {
            var_dump($statement->execute());
        }
        catch (PDOException $exception)
        {
            var_dump($exception);
        }


        var_dump($statement->errorInfo());


        var_dump($text);

    }

}