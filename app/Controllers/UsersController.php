<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UsersController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'List User - Daftar Buku Pustaka Library',
            'data' => $this->usersModel->get()
        ];
        return view('pages/user/index', $data);
    }

    public function addDataPage()
    {
        $data = [
            'title' => 'Tambah User - Daftar Buku Pustaka Library',
            'validation' => $this->validation
        ];
        return view('pages/user/add_user', $data);
    }
}
