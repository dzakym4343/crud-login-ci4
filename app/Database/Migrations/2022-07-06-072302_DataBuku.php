<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataBuku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'sampul' => [
                'type' => 'VARCHAR',
                'constraint' => 155,

            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 155,

            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 155,

            ],
            'deskripsi' => [
                'type' => 'TEXT',

            ],
            'pengarang' => [
                'type' => 'VARCHAR',
                'constraint' => 155,

            ],
            'penerbit' => [
                'type' => 'VARCHAR',
                'constraint' => 155,

            ],
            'tahun_terbit' => [
                'type' => 'VARCHAR',
                'constraint' => 155,

            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('daftar_buku');
    }

    public function down()
    {
        $this->forge->dropTable('daftar_buku');
    }
}
