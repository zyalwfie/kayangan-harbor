<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisPenggunaJasaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'jenis' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'text',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis_pengguna_jasa');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_pengguna_jasa');
    }
}
