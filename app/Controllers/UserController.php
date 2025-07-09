<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotifikasiModel;
use App\Models\PesananModel;

class UserController extends BaseController
{
    protected $db, $pesananModelBuilder, $pesananModel, $notifikasiModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pesananModelBuilder = $this->db->table('pesanan');
        $this->pesananModel = new PesananModel();
        $this->notifikasiModel = new NotifikasiModel();
    }

    public function index()
    {
        $recentOrder = $this->pesananModel->orderBy('created_at', 'desc')->findAll(4);
        $orderCount = count($recentOrder);
        $pendingOrderCount = $this->pesananModel->where('status_tiket', 'tertunda')->where('id_pengguna', user()->id)->countAllResults();
        $successOrderCount = $this->pesananModel->where('status_tiket', 'berhasil')->where('id_pengguna', user()->id)->countAllResults();
        $failedOrderCount = $this->pesananModel->where('status_tiket', 'gagal')->where('id_pengguna', user()->id)->countAllResults();
        $spendingAmount = $this->pesananModel->selectSum('total_harga')->where('id_pengguna', user()->id)->first()['total_harga'] ?? 0;
        $notifications = 
        
        $data = [
            'pageTitle' => 'Kayangan Harbor | Dasbor',
            'recentOrder' => $recentOrder,
            'orderCount' => $orderCount,
            'spendingAmount' => $spendingAmount,
            'pendingOrderCount' => $pendingOrderCount,
            'successOrderCount' => $successOrderCount,
            'failedOrderCount' => $failedOrderCount,
            'notifications' => $this->notifikasiModel->where('id_pengguna', user()->id)->orderBy('created_at', 'desc')->findAll(),
            'newNotifications' => $this->notifikasiModel->where('id_pengguna', user()->id)->where('dibaca', 0)->findAll(4),
            'totalNewNotif' => $this->notifikasiModel->where('id_pengguna', user()->id)->where('dibaca', 0)->countAllResults()
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
