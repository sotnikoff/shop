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

}