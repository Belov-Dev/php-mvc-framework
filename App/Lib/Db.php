<?php

namespace App\Lib;

use PDO;
use PDOException;

class Db
{
    protected $database;

    public function __construct()
    {
        $config = require_once 'App/conf/database.php';

        try {
            $this->database = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['user'], $config['pass']);

        } catch (PDOException $e) {
            die("Ошибка подключения к БД!: " . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $statement = $this->database->prepare($sql);

        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $statement->bindValue(':'.$key, $val, $type);
            }
        }
        $statement->execute();

        return $statement;
    }

    public function row($sql, $params = [])
    {
        try {
            $result = $this->query($sql, $params);

            return $result->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print ($e->getMessage());
        }
    }

    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);

        return $result->fetchColumn();
    }
}