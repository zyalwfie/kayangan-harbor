<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePesananTable extends Migration
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
                'unsigned' => true
            ],
            'id_tiket' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'default' => null,
                'null' => true
            ],
            'nama_pemesan' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'jumlah_penumpang' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'total_harga' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'pelabuhan_asal' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'pelabuhan_tujuan' => [
                'type' => 'varchar',
                'constraint' => 30,
            ],
            'jadwal_masuk' => [
                'type' => 'varchar',
                'constraint' => 30
            ],
            'status_tiket' => [
                'type' => 'ENUM',
                'constraint' => ['aktif', 'tertunda', 'kadaluarsa'],
                'default' => 'tertunda'
            ],
            'status_pembayaran' => [
                'type' => 'ENUM',
                'constraint' => ['tertunda', 'berhasil', 'gagal'],
                'default' => 'tertunda'
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
        $this->forge->addForeignKey('id_tiket', 'tiket', 'id', '', 'CASCADE');
        $this->forge->createTable('pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pesanan');
    }
}
