<?php

namespace App\Database\Seeds;

use App\Models\GolonganKendaraanModel;
use CodeIgniter\Database\Seeder;

class GolonganKendaraanSeeder extends Seeder
{
    public function run()
    {
        $golonganKendaraanModel = new GolonganKendaraanModel();
        
        $data = [
            [
                'golongan' => 'Golongan I',
                'deskripsi' => 'Sepeda kayuh'
            ],
            [
                'golongan' => 'Golongan II',
                'deskripsi' => 'Sepeda motor di bawah 500cc dan gerobak dorong'
            ],
            [
                'golongan' => 'Golongan III',
                'deskripsi' => 'Sepeda motor di atas 500cc dan kendaraan roda tiga'
            ],
            [
                'golongan' => 'Golongan IV A',
                'deskripsi' => 'Kendaraan penumpang (mobil, jeep, sedan, minicab, minibus, mikrolet, station wagan) <5 meter'
            ],
            [
                'golongan' => 'Golongan IV B',
                'deskripsi' => 'Kendaraan barang <5 meter'
            ],
            [
                'golongan' => 'Golongan V A',
                'deskripsi' => 'Kendaraan penumpang (mobil, bus sedang) <7 meter'
            ],
            [
                'golongan' => 'Golongan V B',
                'deskripsi' => 'Kendaraan barang (mobil, truk barang/tangki) <7 meter'
            ],
            [
                'golongan' => 'Golongan VI A',
                'deskripsi' => 'Kendaraan penumpang (mobil, bus besar) <10 meter'
            ],
            [
                'golongan' => 'Golongan VI B',
                'deskripsi' => 'Kendaraan barang (mobil, truk barang/tangki, kereta penarik tanpa gandengan) <10 meter'
            ],
            [
                'golongan' => 'Golongan VII',
                'deskripsi' => 'Kendaraan (mobil barang, trok tronton/tangki, kereta penarik dengan gandengan, kendaraan alat berat) <12 meter'
            ],
            [
                'golongan' => 'Golongan VIII',
                'deskripsi' => 'Kendaraan (mobil barang, trok tronton/tangki, kereta penarik dengan gandengan, kendaraan alat berat) <16 meter'
            ],
            [
                'golongan' => 'Golongan IX',
                'deskripsi' => 'Kendaraan (mobil barang, trok tronton/tangki, kereta penarik dengan gandengan, kendaraan alat berat) >16 meter'
            ],
        ];

        $golonganKendaraanModel->insertBatch($data);
    }
}
