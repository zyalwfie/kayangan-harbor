<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Masuk'
        ];
        
        return view('auth/login', $data);
    }
    public function register()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Register'
        ];
        
        return view('auth/register', $data);
    }
}
