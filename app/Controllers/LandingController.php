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

    public function hotels()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Hotel Kami'
        ];
        
        return view('landing/hotels', $data);
    }

    public function packages()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Paket Kami'
        ];
        
        return view('landing/packages', $data);
    }

    public function contact()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Kontak Kami'
        ];
        
        return view('landing/contact', $data);
    }
}
