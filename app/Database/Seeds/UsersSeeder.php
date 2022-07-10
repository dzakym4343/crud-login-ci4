<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $time = Time::now();
        $data = [
            [
                'name' => 'Ahmad Dzaky Hafidz M',
                'username' => 'dzakym43',
                'password' => password_hash('bandon12', PASSWORD_BCRYPT),
                'role' => 'admin',
                'created_at' => $time,
                'updated_at' => $time
            ],
            [
                'name' => 'User Biasa',
                'username' => 'user',
                'password' => password_hash('user', PASSWORD_BCRYPT),
                'role' => 'user',
                'created_at' => $time,
                'updated_at' => $time
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
