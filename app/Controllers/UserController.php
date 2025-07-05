<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;

class UserController extends BaseController
{
    protected $db, $pesananModelBuilder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pesananModelBuilder = $this->db->table('pesanan');
    }

    public function index()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Dasbor'
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
