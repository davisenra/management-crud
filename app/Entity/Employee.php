<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Employee
{
    public int $id;
    public string $name;
    public string $role;
    public int $wage;

    public function registerNewEmployee()
    {
        $database = new Database("staff");
        $database->insert([
            "name" => $this->name,
            "role" => $this->role,
            "wage" => $this->wage
        ]);
        return True;
    }

    public static function getAllEmployees(string $where = null, string $order = null, string $limit = null)
    {
        return (new Database('staff'))->select($where, $order, $limit)
                                            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getEmployee(int $id)
    {
        return (new Database('staff'))->select('id= '.$id)
                                            ->fetchObject(self::class);
    }

    public function updateEmployee(): bool
    {
        return (new Database('staff'))->update('id = '.$this->id, [
            "name" => $this->name,
            "role" => $this->role,
            "wage" => $this->wage
        ]);
    }

    public function deleteEmployee(): bool
    {
        return (new Database('staff'))->delete('id = '.$this->id);
    }
}