<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Dasbor'
        ];
        
        return view('dashboard/admin/index', $data);
    }
}
