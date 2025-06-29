<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GolonganKendaraanModel;
use App\Models\JenisPenggunaJasaModel;
use App\Models\TiketModel;

class LandingController extends BaseController
{
    protected $db, $tiketModel, $jenisPenggunaJasaModel, $golonganKendaraanModel, $tiketModelBuilder, $jenisPenggunaJasaModelBuilder, $golonganKendaraanModelBuilder;


    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->tiketModelBuilder = $this->db->table('tiket');
        $this->jenisPenggunaJasaModelBuilder = $this->db->table('jenis_pengguna_jasa');
        $this->golonganKendaraanModelBuilder = $this->db->table('golongan_kendaraan');
        $this->tiketModel = new TiketModel();
        $this->jenisPenggunaJasaModel = new JenisPenggunaJasaModel();
        $this->golonganKendaraanModel = new GolonganKendaraanModel();
    }


    public function index()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor'
        ];

        return view('landing/index', $data);
    }

    public function about()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Tentang Kami'
        ];

        return view('landing/about', $data);
    }

    public function tickets()
    {
        $query = $this->tiketModelBuilder
            ->select('tiket.*, jenis_pengguna_jasa.jenis as jenisPenggunaJasa, jenis_pengguna_jasa.deskripsi as deskripsiJenisPenggunaJasa, golongan_kendaraan.golongan as golonganKendaraan, golongan_kendaraan.deskripsi as deskripsiGolonganKendaraan')
            ->join('jenis_pengguna_jasa', 'tiket.id_jenis_pengguna_jasa = jenis_pengguna_jasa.id')
            ->join('golongan_kendaraan', 'tiket.id_golongan_kendaraan = golongan_kendaraan.id', 'left')
            ->get();

        $tickets = $query->getResult();

        $data = [
            'pageTitle' => 'Kayangan Harbor | Tiket',
            'tickets' => $tickets,
        ];

        return view('landing/tickets', $data);
    }

    public function contact()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Kontak Kami'
        ];

        return view('landing/contact', $data);
    }
}
