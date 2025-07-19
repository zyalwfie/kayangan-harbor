<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotifikasiTable extends Migration
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
            'id_pengguna' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tipe_notifikasi' => [
                'type' => 'enum',
                'constraint' => ['biru', 'kuning', 'hijau', 'merah'],
                'default' => 'biru'
            ],
            'kepala_notifikasi' => [
                'type' => 'varchar',
                'constraint' => 15,
            ],
            'isi_notifikasi' => [
                'type' => 'varchar',
                'constraint' => 30,
            ],
            'dibaca' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'default' => 0
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_pengguna', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('notifikasi');
    }

    public function down()
    {
        $this->forge->dropTable('notifikasi');
    }
}
