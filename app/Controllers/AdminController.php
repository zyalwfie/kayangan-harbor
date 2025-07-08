<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    protected $pesananModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
    }

    public function index()
    {
        $recentOrder = $this->pesananModel->orderBy('created_at', 'desc')->findAll(4);
        $orderCount = count($recentOrder);
        $pendingOrderCount = $this->pesananModel->where('status_tiket', 'tertunda')->countAllResults();
        $successOrderCount = $this->pesananModel->where('status_tiket', 'berhasil')->countAllResults();
        $failedOrderCount = $this->pesananModel->where('status_tiket', 'gagal')->countAllResults();
        $earnAmount = $this->pesananModel->selectSum('total_harga')->first()['total_harga'] ?? 0;

        $data = [
            'pageTitle' => 'Kayangan Harbor | Dasbor',
            'recentOrder' => $recentOrder,
            'orderCount' => $orderCount,
            'earnAmount' => $earnAmount,
            'pendingOrderCount' => $pendingOrderCount,
            'successOrderCount' => $successOrderCount,
            'failedOrderCount' => $failedOrderCount,
        ];

        return view('dashboard/admin/index', $data);
    }
}
