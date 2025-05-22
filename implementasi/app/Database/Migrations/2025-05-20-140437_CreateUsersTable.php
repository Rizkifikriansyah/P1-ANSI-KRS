<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    
    public function up()
    {
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'auto_increment' => true],
            'username' => ['type' => 'VARCHAR', 'constraint' => '50'],
            'password' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'name'     => ['type' => 'VARCHAR', 'constraint' => '100'],
            'role'     => ['type' => 'ENUM', 'constraint' => ['mahasiswa', 'dosen']],
            'created_at' => ['type' => 'DATETIME', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }


    public function down()
    {
        //
    }
}
