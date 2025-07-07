<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGolonganKendaraanTable extends Migration
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
            'golongan' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'deskripsi' => [
                'type' => 'text',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('golongan_kendaraan');
    }

    public function down()
    {
        $this->forge->dropTable('golongan_kendaraan');
    }
}
