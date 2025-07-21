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

        // Definisi harga berdasarkan jenis pengguna dan golongan kendaraan
        $hargaMatrix = [
            // Kendaraan - harga berdasarkan golongan
            2 => [
                1 => 69899,   // Sepeda kayuh
                2 => 79899,   // Motor <500cc
                3 => 89899,   // Motor >500cc & roda 3
                4 => 108000,  // Mobil penumpang <5m
                5 => 118000,  // Mobil barang <5m
                6 => 128000,  // Bus sedang <7m
                7 => 138000,  // Truk <7m
                8 => 148000,  // Bus besar <10m
                9 => 158000,  // Truk <10m
                10 => 178000, // Truk tronton <12m
                11 => 198000, // Truk tronton <16m
                12 => 218000, // Truk tronton >16m
            ]
        ];

        $data = [];

        // Generate tiket untuk Pejalan Kaki (tanpa kendaraan)
        for ($i = 0; $i < 2; $i++) {
            $jadwalTersedia = date('Y-m-d H:i:s', mt_rand(
                strtotime('2025-08-01 06:00:00'),
                strtotime('2025-12-31 18:00:00')
            ));

            $jadwalHabis = date(
                'Y-m-d H:i:s',
                strtotime($jadwalTersedia) + (rand(2, 6) * 3600)
            );

            $rute = $this->getRandomRute();

            $data[] = [
                'id_jenis_pengguna_jasa' => 1, // Pejalan kaki
                'id_golongan_kendaraan' => null, // Tanpa kendaraan
                'gambar' => 'default.png',
                'pelabuhan_asal' => $rute['asal'],
                'pelabuhan_tujuan' => $rute['tujuan'],
                'jadwal_tiket_tersedia' => $jadwalTersedia,
                'jadwal_tiket_habis' => $jadwalHabis,
                'harga' => rand(15000, 25000), // Harga pejalan kaki
                'stok' => rand(20, 100)
            ];
        }

        // Generate tiket untuk Kendaraan (semua golongan)
        for ($golonganKendaraan = 1; $golonganKendaraan <= 12; $golonganKendaraan++) {
            // Generate 3-5 tiket untuk setiap golongan kendaraan
            $jumlahTiket = 1;

            for ($i = 0; $i < $jumlahTiket; $i++) {
                // Generate jadwal yang berbeda-beda
                $jadwalTersedia = date('Y-m-d H:i:s', mt_rand(
                    strtotime('2025-08-01 06:00:00'),
                    strtotime('2025-12-31 18:00:00')
                ));

                // Jadwal habis 2-6 jam setelah jadwal tersedia
                $jadwalHabis = date(
                    'Y-m-d H:i:s',
                    strtotime($jadwalTersedia) + (rand(2, 6) * 3600)
                );

                // Variasi harga ±10%
                $hargaBase = $hargaMatrix[2][$golonganKendaraan]; // Gunakan harga kendaraan
                $variasi = rand(-10, 10) / 100;
                $harga = $hargaBase + ($hargaBase * $variasi);
                $harga = round($harga, -3); // Bulatkan ke ribuan terdekat

                // Variasi pelabuhan
                $rute = $this->getRandomRute();

                $data[] = [
                    'id_jenis_pengguna_jasa' => 2, // Kendaraan
                    'id_golongan_kendaraan' => $golonganKendaraan,
                    'gambar' => 'default.png',
                    'pelabuhan_asal' => $rute['asal'],
                    'pelabuhan_tujuan' => $rute['tujuan'],
                    'jadwal_tiket_tersedia' => $jadwalTersedia,
                    'jadwal_tiket_habis' => $jadwalHabis,
                    'harga' => $harga,
                    'stok' => rand(5, 50)
                ];
            }
        }

        $tiketModel->insertBatch($data);
    }

    private function getRandomRute()
    {
        $rute = [
            [
                'asal' => 'Kayangan, Nusa Tenggara Barat',
                'tujuan' => 'Pototano, Nusa Tenggara Barat'
            ]
        ];

        return $rute[array_rand($rute)];
    }
}