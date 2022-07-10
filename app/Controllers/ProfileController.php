<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Profil - Daftar Buku Pustaka Library',
            'validation' => $this->validation,
            'data' => $this->usersModel->builder->where('username', $this->session->get('username'))->get()
        ];
        return view('pages/profile', $data);
    }
}
