<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class DataBukuSeeder extends Seeder
{
    public function run()
    {
        $time = Time::now();
        $data = [
            [
                'sampul' => 'https://s3-ap-southeast-1.amazonaws.com/ebook-previews/31752/100792/1.jpg',
                'judul' => 'Perahu Kertas',
                'slug' => 'perahu-kertas',
                'deskripsi' => 'Namanya Kugy. Mungil, pengkhayal, dan berantakan. Dari benaknya, mengalir untaian dongeng indah. Keenan belum pernah bertemu manusia seaneh itu ....  Namanya Keenan. Cerdas, artistik, dan penuh kejutan. Dari tangannya, mewujud lukisan-lukisan magis. Kugy belum pernah bertemu manusia seajaib itu ....  Dan kini mereka berhadapan di antara hamparan misteri dan rintangan. Akankah dongeng dan lukisan itu bersatu? Akankah hati dan impian mereka bertemu?',
                'pengarang' => 'Dee Lestari',
                'penerbit' => 'Mizan Publishing',
                'tahun_terbit' => '2016',
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'sampul' => 'https://cdn.gramedia.com/uploads/items/9789793062792_New-Edition-Laskar-Pelangi.jpg',
                'judul' => 'Laskar Pelangi',
                'slug' => 'laskar-pelangi',
                'deskripsi' => 'Laskar Pelangi telah menjadi international best seller, diterjemahkan ke dalam 40 bahasa asing. Telah terbit dalam 22 bahasa, diedarkan di lebih dari 130 negara. Melalui program beasiswa, Hirata meraih Master of Science (M.Sc.) bidang teori ekonomi dari Sheffield Hallam University, UK. Hirata juga mendapat beasiswa pendidikan sastra di IWP (International Writing Program), University of Iowa, USA.',
                'pengarang' => 'Andrea Hirata',
                'penerbit' => 'Bentang Pustaka',
                'tahun_terbit' => '2011',
                'created_at' => $time,
                'updated_at' => $time

            ]
        ];

        $this->db->table('daftar_buku')->insertBatch($data);
    }
}
