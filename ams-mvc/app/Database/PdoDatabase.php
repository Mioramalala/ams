<?php

namespace App\Database;

use App\App;
use App\Helpers\Debugger;

class PdoDatabase
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=tmsconsuams', 'root', 'root');
    }

    public function query($sql, $single = false)
    {
        $sql = trim($sql);

        if (strpos($sql, 'INSERT') === 0 || strpos($sql, 'UPDATE') === 0 || strpos($sql, 'DELETE') === 0) {
            return $this->pdo->query($sql);
        }

        $result = $this->pdo->query($sql, \PDO::FETCH_OBJ);
        if ($result) {
            return ($single === false) ? $result->fetchAll(\PDO::FETCH_OBJ) : $result->fetch(\PDO::FETCH_OBJ);
        }
        return false;
    }

}