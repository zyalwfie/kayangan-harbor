<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LandingController extends BaseController
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor'
        ];
        
        return view('landing/index', $data);
    }

    public function about()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Tentang Kami'
        ];
        
        return view('landing/about', $data);
    }

    public function tickets()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Tiket'
        ];
        
        return view('landing/tickets', $data);
    }

    public function contact()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Kontak Kami'
        ];
        
        return view('landing/contact', $data);
    }
}
