<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKrsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'mahasiswa_id'  => ['type' => 'INT'],
            'matakuliah_id' => ['type' => 'INT'],
            'tahun_ajaran'  => ['type' => 'VARCHAR', 'constraint' => '20'],
            'semester'      => ['type' => 'ENUM', 'constraint' => ['ganjil', 'genap']],
            'approved_by'   => ['type' => 'INT', 'null' => true],
            'approved_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('mahasiswa_id', 'mahasiswa', 'id');
        $this->forge->addForeignKey('matakuliah_id', 'matakuliah', 'id');
        $this->forge->addForeignKey('approved_by', 'users', 'id');
        $this->forge->createTable('krs');
    }


    public function down()
    {
        //
    }
}
