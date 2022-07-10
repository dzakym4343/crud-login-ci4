<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarBukuModel extends Model
{
    protected $builder;
    protected $table = 'daftar_buku';
    protected $allowedFields = ['sampul', 'judul', 'slug', 'deskripsi', 'pengarang', 'penerbit', 'tahun_terbit'];

    protected $useTimestamps = true;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->builder = $db->table('daftar_buku');
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

    public function readData($slug)
    {
        $query = $this->builder->where('slug', $slug)->get();
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
