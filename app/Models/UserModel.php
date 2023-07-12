<?php

namespace App\Models;

use App\BaseModel;

class UserModel extends BaseModel
{

    public function create(string $name, string $email, bool $isActive = true) :int
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, is_active, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $isActive]);
        return (int) $this->db->lastInsertId();
    }

    public function getAll() :array
    {
         $stmt = $this->db->query('SELECT * FROM users');
         $users = $stmt->fetchAll();
         return $users;
    }

}