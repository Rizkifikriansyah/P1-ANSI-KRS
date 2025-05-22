<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMatakuliahTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'auto_increment' => true],
            'kode_mk'  => ['type' => 'VARCHAR', 'constraint' => '10'],
            'nama_mk'  => ['type' => 'VARCHAR', 'constraint' => '100'],
            'sks'      => ['type' => 'INT'],
            'semester' => ['type' => 'INT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('matakuliah');
    }


    public function down()
    {
        //
    }
}
