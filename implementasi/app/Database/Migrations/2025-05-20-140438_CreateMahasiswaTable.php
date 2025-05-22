<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'auto_increment' => true],
            'user_id'  => ['type' => 'INT'],
            'nim'      => ['type' => 'VARCHAR', 'constraint' => '20'],
            'prodi'    => ['type' => 'VARCHAR', 'constraint' => '100'],
            'angkatan' => ['type' => 'YEAR'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mahasiswa');
    }


    public function down()
    {
        //
    }
}
