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
            'id_jenis_pengguna_jasa' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true
            ],
            'id_golongan_kendaraan' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'default' => null,
                'null' => true
            ],
            'gambar' => [
                'type' => 'varchar',
                'constraint' => 255,
                'default' => 'default.png',
                'null' => true
            ],
            'pelabuhan_asal' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'pelabuhan_tujuan' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'jadwal_tiket_tersedia' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'jadwal_tiket_habis' => [
                'type' => 'datetime',
                'null' => true
            ],
            'harga' => [
                'type' => 'int',
                'constraint' => 11
            ],
            'stok' => [
                'type' => 'int',
                'constraint' => 11,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_jenis_pengguna_jasa', 'jenis_pengguna_jasa', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('id_golongan_kendaraan', 'golongan_kendaraan', 'id', '', 'CASCADE');
        $this->forge->createTable('tiket');
    }

    public function down()
    {
        $this->forge->dropTable('tiket');
    }
}
