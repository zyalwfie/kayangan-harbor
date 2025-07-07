<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;

class UserController extends BaseController
{
    protected $db, $pesananModelBuilder, $pesananModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pesananModelBuilder = $this->db->table('pesanan');
        $this->pesananModel = new PesananModel();
    }

    public function index()
    {
        $recentOrder = $this->pesananModel->orderBy('created_at', 'desc')->findAll(4);
        $orderCount = count($recentOrder);
        $pendingOrderCount = $this->pesananModel->where('status_tiket', 'tertunda')->where('id_pengguna', user()->id)->countAllResults();
        $successOrderCount = $this->pesananModel->where('status_tiket', 'berhasil')->where('id_pengguna', user()->id)->countAllResults();
        $failedOrderCount = $this->pesananModel->where('status_tiket', 'gagal')->where('id_pengguna', user()->id)->countAllResults();
        $spendingAmount = $this->pesananModel->selectSum('total_harga')->where('id_pengguna', user()->id)->first()['total_harga'] ?? 0;
        
        $data = [
            'pageTitle' => 'Kayangan Harbor | Dasbor',
            'recentOrder' => $recentOrder,
            'orderCount' => $orderCount,
            'spendingAmount' => $spendingAmount,
            'pendingOrderCount' => $pendingOrderCount,
            'successOrderCount' => $successOrderCount,
            'failedOrderCount' => $failedOrderCount,
        ];

        return view('dashboard/user/index', $data);
    }

    public function orders()
    {
        $query = $this->pesananModelBuilder
            ->select('pesanan.*')
            ->get();
        $orders = $query->getResultObject();

        $data = [
            'pageTitle' => 'Kayangan Harbor | Dasbor | Pesanan',
            'orders' => $orders
        ];

        return view('dashboard/user/order/index', $data);
    }
}
