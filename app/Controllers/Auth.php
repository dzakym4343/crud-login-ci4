<?php

namespace App\Controllers;

class Auth extends BaseController
{

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {

        $data = [
            'validation' => $this->validation
        ];
        return view('auth/register', $data);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/auth/login');
    }
}
