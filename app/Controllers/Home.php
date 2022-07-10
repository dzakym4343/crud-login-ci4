<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index()
    {
        $daftarBuku = $this->daftarBukuModel->get();
        $data = [
            'title' => 'Home - Daftar Buku Pustaka Library',
            'data' => $daftarBuku,
            'countData' => $this->daftarBukuModel->countAll()
        ];
        return view('pages/home', $data);
    }

    public function add_data()
    {
        $data = [
            'title' => 'Tambah Data Buku - Daftar Buku Pustaka Library',
            'validation' => $this->validation
        ];
        return view('pages/add_data', $data);
    }

    public function read_data($slug)
    {
        if (!$this->daftarBukuModel->readData($slug)->getResult()) {
            throw PageNotFoundException::forPageNotFound($slug . ' tidak ditemukan');
        }

        $data = [
            'title' => 'Detail Buku - Daftar Buku Pustaka Library',
            'data' => $this->daftarBukuModel->readData($slug)

        ];
        return view('pages/read_data', $data);
    }

    public function update_data($slug)
    {
        if (!$this->daftarBukuModel->readData($slug)->getResult()) {
            throw PageNotFoundException::forPageNotFound($slug . ' tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Data Buku - Daftar Buku Pustaka Library',
            'data' => $this->daftarBukuModel->readData($slug),
            'validation' => $this->validation
        ];
        return view('pages/update_data', $data);
    }
}
