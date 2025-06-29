<?php

namespace App\Database\Seeds;

use App\Models\GolonganKendaraanModel;
use App\Models\JenisPenggunaJasaModel;
use App\Models\TiketModel;
use CodeIgniter\Database\Seeder;

class TiketSeeder extends Seeder
{
    public function run()
    {
        $tiketModel = new TiketModel();

        $data = [
            [
                'id_jenis_pengguna_jasa' => rand(1, 2),
                'id_golongan_kendaraan' => rand(1, 12),
                'gambar' => 'default.png',
                'pelabuhan_asal' => 'Kayangan, Nusa Tenggara Barat',
                'pelabuhan_tujuan' => 'Pototano, Nusa Tenggara Barat',
                'jadwal_tiket_tersedia' => date('Y-m-d H:i:s', mt_rand(strtotime('2020-01-01'), strtotime('2025-12-31'))),
                'jadwal_tiket_habis' => date('Y-m-d H:i:s', mt_rand(strtotime('2020-01-01'), strtotime('2025-12-31'))),
                'harga' => rand(69899, 158000),
                'stok' => rand(1, 25)
            ],
            [
                'id_jenis_pengguna_jasa' => rand(1, 2),
                'id_golongan_kendaraan' => rand(1, 12),
                'gambar' => 'default.png',
                'pelabuhan_asal' => 'Kayangan, Nusa Tenggara Barat',
                'pelabuhan_tujuan' => 'Pototano, Nusa Tenggara Barat',
                'jadwal_tiket_tersedia' => date('Y-m-d H:i:s', mt_rand(strtotime('2020-01-01'), strtotime('2025-12-31'))),
                'jadwal_tiket_habis' => date('Y-m-d H:i:s', mt_rand(strtotime('2020-01-01'), strtotime('2025-12-31'))),
                'harga' => rand(69899, 158000),
                'stok' => rand(1, 25)
            ],
            [
                'id_jenis_pengguna_jasa' => rand(1, 2),
                'id_golongan_kendaraan' => rand(1, 12),
                'gambar' => 'default.png',
                'pelabuhan_asal' => 'Kayangan, Nusa Tenggara Barat',
                'pelabuhan_tujuan' => 'Pototano, Nusa Tenggara Barat',
                'jadwal_tiket_tersedia' => date('Y-m-d H:i:s', mt_rand(strtotime('2020-01-01'), strtotime('2025-12-31'))),
                'jadwal_tiket_habis' => date('Y-m-d H:i:s', mt_rand(strtotime('2020-01-01'), strtotime('2025-12-31'))),
                'harga' => rand(69899, 158000),
                'stok' => rand(1, 25)
            ],
            [
                'id_jenis_pengguna_jasa' => rand(1, 2),
                'id_golongan_kendaraan' => rand(1, 12),
                'gambar' => 'default.png',
                'pelabuhan_asal' => 'Kayangan, Nusa Tenggara Barat',
                'pelabuhan_tujuan' => 'Pototano, Nusa Tenggara Barat',
                'jadwal_tiket_tersedia' => date('Y-m-d H:i:s', mt_rand(strtotime('2020-01-01'), strtotime('2025-12-31'))),
                'jadwal_tiket_habis' => date('Y-m-d H:i:s', mt_rand(strtotime('2020-01-01'), strtotime('2025-12-31'))),
                'harga' => rand(69899, 158000),
                'stok' => rand(1, 25)
            ],
            [
                'id_jenis_pengguna_jasa' => rand(1, 2),
                'id_golongan_kendaraan' => rand(1, 12),
                'gambar' => 'default.png',
                'pelabuhan_asal' => 'Kayangan, Nusa Tenggara Barat',
                'pelabuhan_tujuan' => 'Pototano, Nusa Tenggara Barat',
                'jadwal_tiket_tersedia' => date('Y-m-d H:i:s', mt_rand(strtotime('2020-01-01'), strtotime('2025-12-31'))),
                'jadwal_tiket_habis' => date('Y-m-d H:i:s', mt_rand(strtotime('2020-01-01'), strtotime('2025-12-31'))),
                'harga' => rand(69899, 158000),
                'stok' => rand(1, 25)
            ],
        ];

        $tiketModel->insertBatch($data);
    }
}
