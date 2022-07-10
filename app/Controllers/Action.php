<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class Action extends BaseController
{
    public function addDataBuku()
    {
        $rules = [
            'sampul' => [
                'rules' => 'required|valid_url_strict',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_url_strict' => 'masukkan url dengan benar'
                ],
            ],
            'judul' => [
                'rules' => 'required|is_unique[daftar_buku.judul]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada di database',
                ],
            ],
            'deskripsi' => [
                'rules' => 'required|max_length[500]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => 'maksimal 500 karakter',
                ],
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/pages/create')->withInput();
        }

        $fieldsArray = [
            'sampul' => $this->request->getVar('sampul'),
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ];

        $this->daftarBukuModel->saveData($fieldsArray);

        $this->session->setFlashdata('success_msg', 'Data berhasil ditambahkan.');
        return redirect()->to('/pages/home');
    }

    public function updateDataBuku($id)
    {
        $rules = [
            'sampul' => [
                'rules' => 'required|valid_url_strict',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_url_strict' => 'masukkan url dengan benar'
                ],
            ],
            'judul' => [
                'rules' => 'required|is_unique[daftar_buku.judul, id, ' . $id . ']',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada di database',
                ],
            ],
            'deskripsi' => [
                'rules' => 'required|max_length[500]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'max_length' => 'maksimal 500 karakter',
                ],
            ],
            'pengarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/pages/buku/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fieldsArray = [
            'sampul' => $this->request->getVar('sampul'),
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'updated_at' => Time::now()
        ];

        $this->daftarBukuModel->updateData($id, $fieldsArray);

        $this->session->setFlashdata('success_msg', 'Data berhasil diubah.');
        return redirect()->to('/pages/home');
    }

    public function deleteDataBuku($id)
    {
        $this->daftarBukuModel->deleteData($id);

        // $this->session->setFlashdata('success_msg', 'Data berhasil dihapus.');
        // return redirect()->to('/pages/home');
    }

    public function addUser()
    {
        $rules = [
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 100 Karakter',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/pages/user/add')->withInput();
        }

        $fieldsArray = [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'role' => 'user',
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ];

        $this->usersModel->saveData($fieldsArray);

        $this->session->setFlashdata('success_msg', 'Berhasil menambahkan pengguna.');
        return redirect()->to('/pages/user/add');
    }

    public function deleteUser($id)
    {
        $this->usersModel->deleteData($id);

        // $this->session->setFlashdata('success_msg', 'Data berhasil dihapus.');
        // return redirect()->to('/pages/home');
    }

    public function changeName($id)
    {
        $rules = [
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 100 Karakter',
                ]
            ]
        ];



        if (!$this->validate($rules)) {
            return redirect()->to('/pages/profile')->withInput();
        }

        $fieldsArray = [
            'name' => $this->request->getVar('name'),
            'updated_at' => Time::now()
        ];

        $this->usersModel->updateData($id, $fieldsArray);
        $this->session->remove('name');
        $this->session->set(['name' => $this->request->getVar('name')]);

        $this->session->setFlashdata('name_changed', 'Nama berhasil diubah.');
        return redirect()->to('/pages/profile');
    }

    public function changePassword($id)
    {
        $rules = [
            'password_new' => [
                'rules' => 'required|min_length[4]|max_length[50]|is_unique[users.password]',
                'errors' => [
                    'required' => 'Password baru harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'password_confirm' => [
                'rules' => 'matches[password_new]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password baru',
                ]
            ]
        ];


        $getPassOld = $this->request->getVar('password_old');
        $getPassFromDB = $this->usersModel->builder->where('username', $this->session->get('username'))->get()->getRow()->password;

        if (!password_verify($getPassOld, $getPassFromDB)) {
            $rules['password_old'] = [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Password lama harus diisi',
                    'matches' => 'Password lama salah'
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->to('/pages/profile')->withInput();
        }

        $fieldsArray = [
            'password' => password_hash($this->request->getVar('password_new'), PASSWORD_BCRYPT),
            'updated_at' => Time::now()
        ];

        $this->usersModel->updateData($id, $fieldsArray);

        $this->session->setFlashdata('pass_changed', 'Password berhasil diubah.');
        return redirect()->to('/pages/profile');
    }

    public function process_register()
    {
        $rules = [
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 100 Karakter',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 4 Karakter',
                    'max_length' => '{field} maksimal 50 Karakter',
                ]
            ],
            'password_confirm' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/auth/register')->withInput();
        }

        $fieldsArray = [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'role' => 'user',
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ];

        $this->usersModel->saveData($fieldsArray);

        $this->session->setFlashdata('success_register', 'Berhasil membuat akun, silakan login.');

        return redirect()->to('/auth/login');
    }

    public function process_login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        // $dataUser = $users->where(['username' => $username])->getData()->getRow();
        $dataUser = $this->usersModel->builder->where('username', $username)->get()->getRow();
        // dd($dataUser);
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                $this->session->set([
                    'username' => $dataUser->username,
                    'name' => $dataUser->name,
                    'role' => $dataUser->role,
                    'logged_in' => true
                ]);
                return redirect()->to('/pages/home');
            } else {
                $this->session->setFlashdata('login_msg', 'Username & Password Salah');
                return redirect()->to('/auth/login');
            }
        } else {
            $this->session->setFlashdata('login_msg', 'Username & Password Salah');
            return redirect()->to('/auth/login');
        }
    }
}
