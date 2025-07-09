<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotifikasiModel;
use App\Models\PembayaranModel;
use App\Models\PesananModel;
use App\Models\TiketModel;

class OrderController extends BaseController
{
    protected $db, $tiketModel, $pesananModel, $pembayaranModel, $pesananModelBuilder, $notifikasiModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pesananModelBuilder = $this->db->table('pesanan');
        $this->tiketModel = new TiketModel();
        $this->pesananModel = new PesananModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->notifikasiModel = new NotifikasiModel();
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

    // Dashboard
    public function dashboardIndex()
    {
        $orders = $this->pesananModel
            ->select('pesanan.*, gambar, harga, golongan, jenis, golongan_kendaraan.deskripsi as deskripsi_golongan_kendaraan, jenis_pengguna_jasa.deskripsi as deskripsi_jenis_pengguna_jasa, bukti_pembayaran, full_name, username, avatar, email')
            ->join('tiket', 'pesanan.id_tiket = tiket.id')
            ->join('jenis_pengguna_jasa', 'tiket.id_jenis_pengguna_jasa = jenis_pengguna_jasa.id')
            ->join('golongan_kendaraan', 'tiket.id_golongan_kendaraan = golongan_kendaraan.id', 'left')
            ->join('pembayaran', 'pembayaran.id_pesanan = pesanan.id')
            ->join('users', 'pesanan.id_pengguna = users.id');
        if (in_groups('user')) {
            $orders->where('id_pengguna', user()->id);
        }
        $orders->orderBy('created_at', 'asc');
        $ordersArray = $orders->paginate(5);

        $orders = array_map(function ($item) {
            return (object) $item;
        }, $ordersArray);

        $pager = $this->pesananModel->pager;

        $data = [
            'pageTitle' => 'Kayangan Harbor | Dasbor',
            'orders' => $orders,
            'pager' => $pager,
        ];

        if (in_groups('admin')) {
            return view('dashboard/admin/order/index', $data);
        } else {
            return view('dashboard/user/order/index', $data);
        }
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

    public function update($orderId)
    {
        $order = $this->pesananModel->find($orderId);

        if (!$order) {
            return redirect()->back()->with('not_found', 'Pesanan tidak ditemukan.');
        }

        $result = $this->pesananModel->update($orderId, [
            'status_tiket' => 'aktif',
            'status_pembayaran' => 'berhasil'
        ]);
    }
}
