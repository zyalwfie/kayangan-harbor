<?php

namespace App\Database\Seeds;

use App\Models\JenisPenggunaJasaModel;
use CodeIgniter\Database\Seeder;

class JenisPenggunaJasaSeeder extends Seeder
{
    public function run()
    {
        $jenisPenggunaJasaModel = new JenisPenggunaJasaModel();
        
        $data = [
            [
                'jenis' => 'Pejalan Kaki',
                'deskripsi' => 'Pembeli bepergian dengan kapal tanpa menggunakan kendaraan'
            ],
            [
                'jenis' => 'Kendaraan',
                'deskripsi' => 'Pembeli bepergian dengan kapal menggunakan kendaraan'
            ]
        ];

        $jenisPenggunaJasaModel->insertBatch($data);
    }
}
