<?php

namespace App\Db;

require "config.php";

use PDO;
use PDOException;

class Database
{
    private string $table;
    private PDO $connection;

    public function __construct(string $table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $this->connection = new PDO("mysql:host=".HOST.";dbname=".NAME,USER,PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: ".$e->getMessage());
        }
    }

    public function execute(string $query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die("ERROR: ".$e->getMessage());
        }
    }

    public function insert(array $values)
    {
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),"?");
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId();
    }

    public function select(string $where = null, string $order = null, string $limit = null, string $fields = '*')
    {
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        return $this->execute($query);
    }

    public function update(string $where, array $values): bool
    {
        $fields = array_keys($values);
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
        $this->execute($query, array_values($values));
        return True;
    }

    public function delete(string $where): bool
    {
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->execute($query);
        return True;
    }
}