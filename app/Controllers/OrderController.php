<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\PesananModel;
use App\Models\TiketModel;

class OrderController extends BaseController
{
    protected $db, $tiketModel, $pesananModel, $pembayaranModel, $pesananModelBuilder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pesananModelBuilder = $this->db->table('pesanan');
        $this->tiketModel = new TiketModel();
        $this->pesananModel = new PesananModel();
        $this->pembayaranModel = new PembayaranModel();
    }

    public function index($orderId)
    {
        $userId = user()->id;

        $query = $this->pesananModelBuilder
            ->select('pesanan.*, gambar, harga, golongan, jenis, golongan_kendaraan.deskripsi as deskripsi_golongan_kendaraan, jenis_pengguna_jasa.deskripsi as deskripsi_jenis_pengguna_jasa, bukti_pembayaran')
            ->join('tiket', 'pesanan.id_tiket = tiket.id')
            ->join('jenis_pengguna_jasa', 'tiket.id_jenis_pengguna_jasa = jenis_pengguna_jasa.id')
            ->join('golongan_kendaraan', 'tiket.id_golongan_kendaraan = golongan_kendaraan.id', 'left')
            ->join('pembayaran', 'pembayaran.id_pesanan = pesanan.id')
            ->where('pesanan.id', $orderId)
            ->where('pesanan.id_pengguna', $userId)
            ->get();

        $order = $query->getRowObject();

        $data = [
            'pageTitle' => 'Kayangan Harbor | Rincian Pesanan',
            'order' => $order
        ];

        return view('landing/order', $data);
    }

    public function store()
    {
        $userId = user()->id;
        $postData = $this->request->getPost();
        $postData['id_pengguna'] = $userId;

        $this->pesananModel->insert($postData);

        $newOrder = $this->pesananModel->orderBy('created_at', 'desc')->first();

        $this->pembayaranModel->insert([
            'id_pesanan' => $newOrder['id']
        ]);

        $newPayment = $this->pembayaranModel->orderBy('created_at', 'desc')->first();

        $orderId = $newPayment['id_pesanan'];

        return redirect()->route('order.index', [$orderId])->with('success', 'Pesanan telah dibuat!');
    }
}
