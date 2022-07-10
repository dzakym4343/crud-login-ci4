<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $builder;
    protected $table = 'users';
    protected $allowedFields = ['username', 'password', 'name'];


    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->builder = $db->table('users');
    }

    public function getData()
    {
        return $this->builder->get();
    }

    public function saveData($data)
    {
        $query = $this->builder->insert($data);
        return $query;
    }

    public function updateData($id, $data)
    {
        $query = $this->builder->where('id', $id)->update($data);
        return $query;
    }

    public function deleteData($id)
    {
        $query = $this->builder->where('id', $id)->delete();
        return $query;
    }
}
