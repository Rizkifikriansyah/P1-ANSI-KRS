<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDosenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'      => ['type' => 'INT', 'auto_increment' => true],
            'user_id' => ['type' => 'INT'],
            'nidn'    => ['type' => 'VARCHAR', 'constraint' => '20'],
            'fakultas' => ['type' => 'VARCHAR', 'constraint' => '100'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dosen');
    }


    public function down()
    {
        //
    }
}
