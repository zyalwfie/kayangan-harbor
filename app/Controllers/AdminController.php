<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use Myth\Auth\Models\UserModel;

class AdminController extends BaseController
{
    protected $db, $pesananModel, $userModel, $userBuilder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pesananModel = new PesananModel();
        $this->userModel = new UserModel();
        $this->userBuilder = $this->db->table('users');
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

    public function users()
    {
        $query = $this->userBuilder
            ->select('users.*, auth_groups.name as groupName')
            ->join('auth_groups_users', 'users.id = auth_groups_users.user_id')
            ->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
            ->where('auth_groups.name', 'user')
            ->get();

        $users = $query->getResult();

        $data = [
            'pageTitle' => 'Dasbord | Daftar Pengguna',
            'users' => $users,
        ];

        return view('dashboard/admin/user/index', $data);
    }

    public function userDestroy($userId)
    {
        $user = $this->userBuilder->where('id', $userId)->get()->getRow();
        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
        $this->userBuilder->where('id', $userId)->delete();
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
