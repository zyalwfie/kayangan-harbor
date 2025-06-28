<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Dasbor'
        ];

        return view('dashboard/user/index', $data);
    }
}
