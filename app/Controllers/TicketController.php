<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GolonganKendaraanModel;
use App\Models\JenisPenggunaJasaModel;
use App\Models\TiketModel;

class TicketController extends BaseController
{
    protected $db, $tiketModel, $tiketModelBuilder, $jenisPenggunaJasaModel, $golonganKendaraanModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->tiketModelBuilder = $this->db->table('tiket');
        $this->tiketModel = new TiketModel();
        $this->jenisPenggunaJasaModel = new JenisPenggunaJasaModel();
        $this->golonganKendaraanModel = new GolonganKendaraanModel();
    }
    
    public function index()
    {
        $query = $this->tiketModelBuilder
            ->select('jenis, golongan, golongan_kendaraan.deskripsi as deskripsiGolonganKendaraan, tiket.*')
            ->join('jenis_pengguna_jasa', 'tiket.id_jenis_pengguna_jasa = jenis_pengguna_jasa.id')
            ->join('golongan_kendaraan', 'tiket.id_golongan_kendaraan = golongan_kendaraan.id', 'left')
            ->get();

        $tickets = $query->getResult();
        
        $data = [
            'pageTitle' => 'Dasbor | Tiket',
            'tickets' => $tickets
        ];

        return view('dashboard/admin/ticket/index', $data);
    }

    public function create()
    {
        $typeOfServiceUser = $this->jenisPenggunaJasaModel->findAll();
        $vehicleClass = $this->golonganKendaraanModel->findAll();
        
        $data = [
            'pageTitle' => 'Dasbor | Tiket | Tambah Tiket',
            'typeOfServiceUser' => $typeOfServiceUser,
            'vehicleClass' => $vehicleClass
        ];
        
        return view('dashboard/admin/ticket/form', $data);
    }

    public function store()
    {
        $validationRules = [
            'id_jenis_pengguna_jasa' => 'required|is_natural_no_zero',
            'id_golongan_kendaraan' => 'permit_empty|is_natural_no_zero',
            'pelabuhan_asal' => 'required|string|max_length[100]',
            'pelabuhan_tujuan' => 'required|string|max_length[100]',
            'jadwal_tiket_tersedia' => 'required|valid_date',
            'jadwal_tiket_habis' => 'required|valid_date',
            'harga' => 'required|integer|min_length[1]',
            'stok' => 'required|integer|min_length[1]'
        ];

        $validationMessages = [
            'id_jenis_pengguna_jasa' => [
                'required' => 'Jenis pengguna jasa wajib diisi.',
                'is_natural_no_zero' => 'Pilih jenis pengguna jasa yang valid.'
            ],
            'id_golongan_kendaraan' => [
                'is_natural_no_zero' => 'Pilih golongan kendaraan yang valid.'
            ],
            'pelabuhan_asal' => [
                'required' => 'Pelabuhan asal wajib diisi.',
                'max_length' => 'Maksimal 100 karakter.'
            ],
            'pelabuhan_tujuan' => [
                'required' => 'Pelabuhan tujuan wajib diisi.',
                'max_length' => 'Maksimal 100 karakter.'
            ],
            'jadwal_tiket_tersedia' => [
                'required' => 'Tanggal tiket tersedia wajib diisi.',
                'valid_date' => 'Format tanggal tidak valid.'
            ],
            'jadwal_tiket_habis' => [
                'required' => 'Tanggal tiket habis wajib diisi.',
                'valid_date' => 'Format tanggal tidak valid.'
            ],
            'harga' => [
                'required' => 'Harga wajib diisi.',
                'integer' => 'Harga harus berupa angka.'
            ],
            'stok' => [
                'required' => 'Stok wajib diisi.',
                'integer' => 'Stok harus berupa angka.'
            ]
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $jadwalTiketTersedia = $this->request->getPost('jadwal_tiket_tersedia');
        $jadwalTiketHabis = $this->request->getPost('jadwal_tiket_habis');
        if ($jadwalTiketTersedia && $jadwalTiketHabis && $jadwalTiketHabis < $jadwalTiketTersedia) {
            $errors = session('errors') ?? [];
            $errors['jadwal_tiket_habis'] = 'Tanggal tiket habis tidak boleh lebih awal dari tanggal tersedia.';
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'id_jenis_pengguna_jasa' => $this->request->getPost('id_jenis_pengguna_jasa'),
            'id_golongan_kendaraan' => $this->request->getPost('id_golongan_kendaraan'),
            'pelabuhan_asal' => $this->request->getPost('pelabuhan_asal'),
            'pelabuhan_tujuan' => $this->request->getPost('pelabuhan_tujuan'),
            'jadwal_tiket_tersedia' => $this->request->getPost('jadwal_tiket_tersedia'),
            'jadwal_tiket_habis' => $this->request->getPost('jadwal_tiket_habis'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        ];

        $this->tiketModel->insert($data);
        return redirect()->to(route_to('dashboard.admin.tickets.index'))->with('success', 'Tiket berhasil ditambahkan.');
    }

    public function edit($ticketId)
    {
        $ticket = $this->tiketModel->find($ticketId);
        $typeOfServiceUser = $this->jenisPenggunaJasaModel->findAll();
        $vehicleClass = $this->golonganKendaraanModel->findAll();

        $data = [
            'pageTitle' => 'Dasbor | Edit Tiket',
            'ticket' => $ticket,
            'typeOfServiceUser' => $typeOfServiceUser,
            'vehicleClass' => $vehicleClass
        ];  

        return view('dashboard/admin/ticket/form', $data);
    }

    public function update($ticketId)
    {
        $ticket = $this->tiketModel->find($ticketId);
        if (!$ticket) {
            return redirect()->to(route_to('dashboard.admin.tickets.index'))->with('error', 'Tiket tidak ditemukan.');
        }

        $validationRules = [
            'id_jenis_pengguna_jasa' => 'required|is_natural_no_zero',
            'id_golongan_kendaraan' => 'permit_empty|is_natural_no_zero',
            'pelabuhan_asal' => 'required|string|max_length[100]',
            'pelabuhan_tujuan' => 'required|string|max_length[100]',
            'jadwal_tiket_tersedia' => 'required|valid_date',
            'jadwal_tiket_habis' => 'required|valid_date',
            'harga' => 'required|integer|min_length[1]',
            'stok' => 'required|integer|min_length[1]'
        ];

        $validationMessages = [
            'id_jenis_pengguna_jasa' => [
                'required' => 'Jenis pengguna jasa wajib diisi.',
                'is_natural_no_zero' => 'Pilih jenis pengguna jasa yang valid.'
            ],
            'id_golongan_kendaraan' => [
                'is_natural_no_zero' => 'Pilih golongan kendaraan yang valid.'
            ],
            'pelabuhan_asal' => [
                'required' => 'Pelabuhan asal wajib diisi.',
                'max_length' => 'Maksimal 100 karakter.'
            ],
            'pelabuhan_tujuan' => [
                'required' => 'Pelabuhan tujuan wajib diisi.',
                'max_length' => 'Maksimal 100 karakter.'
            ],
            'jadwal_tiket_tersedia' => [
                'required' => 'Tanggal tiket tersedia wajib diisi.',
                'valid_date' => 'Format tanggal tidak valid.'
            ],
            'jadwal_tiket_habis' => [
                'required' => 'Tanggal tiket habis wajib diisi.',
                'valid_date' => 'Format tanggal tidak valid.'
            ],
            'harga' => [
                'required' => 'Harga wajib diisi.',
                'integer' => 'Harga harus berupa angka.'
            ],
            'stok' => [
                'required' => 'Stok wajib diisi.',
                'integer' => 'Stok harus berupa angka.'
            ]
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $jadwalTiketTersedia = $this->request->getPost('jadwal_tiket_tersedia');
        $jadwalTiketHabis = $this->request->getPost('jadwal_tiket_habis');
        if ($jadwalTiketTersedia && $jadwalTiketHabis && $jadwalTiketHabis < $jadwalTiketTersedia) {
            $errors = session('errors') ?? [];
            $errors['jadwal_tiket_habis'] = 'Tanggal tiket habis tidak boleh lebih awal dari tanggal tersedia.';
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'id_jenis_pengguna_jasa' => $this->request->getPost('id_jenis_pengguna_jasa'),
            'id_golongan_kendaraan' => $this->request->getPost('id_golongan_kendaraan'),
            'pelabuhan_asal' => $this->request->getPost('pelabuhan_asal'),
            'pelabuhan_tujuan' => $this->request->getPost('pelabuhan_tujuan'),
            'jadwal_tiket_tersedia' => $this->request->getPost('jadwal_tiket_tersedia'),
            'jadwal_tiket_habis' => $this->request->getPost('jadwal_tiket_habis'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        ];

        $this->tiketModel->update($ticketId, $data);
        return redirect()->to(route_to('dashboard.admin.tickets.index'))->with('success', 'Tiket berhasil diubah.');
    }

    public function destroy($ticketId)
    {
        $ticket = $this->tiketModel->find($ticketId);
        if (!$ticket) {
            return redirect()->to(route_to('dashboard.admin.tickets.index'))->with('error', 'Tiket tidak ditemukan.');
        }
        $this->tiketModel->delete($ticketId);
        return redirect()->to(route_to('dashboard.admin.tickets.index'))->with('success', 'Tiket berhasil dihapus.');
    }
}
