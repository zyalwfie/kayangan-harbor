<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\PesananModel;
use App\Models\TiketModel;

class PaymentController extends BaseController
{
    protected $db, $tiketModel, $pesananModel, $pembayaranModel, $pesananModelBuilder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pesananModelBuilder = $this->db->table('pesanan');
        $this->tiketModel = new TiketModel();
        $this->pesananModel = new PesananModel();
        $this->pembayaranModel = new PembayaranModel();
    }

    public function upload()
    {
        $orderId = $this->request->getPost('id_pesanan');
        $payment = $this->pembayaranModel->where('id_pesanan', $orderId)->first();
        $proof = $this->request->getFile('bukti_pembayaran');
        $uriString = $this->request->getPost('uri_string');

        $validationRule = [
            'bukti_pembayaran' => [
                'rules' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,2048]|ext_in[bukti_pembayaran,jpg,jpeg,png,pdf]'
            ]
        ];

        $customMessages = [
            'bukti_pembayaran' => [
                'uploaded' => 'Bukti Pembayaran harus diunggah!',
                'max_size' => 'Ukuran file Bukti Pembayaran terlalu besar!',
                'ext_in' => 'Bukti Pembayaran harus berupa file JPG, JPEG, PNG, atau PDF!'
            ]
        ];

        if (!$this->validate($validationRule, $customMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($proof->isValid() && !$proof->hasMoved()) {
            $newName = $proof->getRandomName();
            if ($payment['bukti_pembayaran'] === null) {
                $result = $this->pembayaranModel->where('id_pesanan', $orderId)->set(['bukti_pembayaran' => $newName])->update();
                if ($result) {
                    $proof->move(FCPATH . 'img/ticket/proof/', $newName);

                    if ($uriString) {
                        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload.');
                    } else {
                        return redirect()->route('order.thanks')->with('success', 'Bukti pembayaran berhasil diupload.');
                    }
                }
                return redirect()->back()->with('error', 'Gagal mengupload file.');
            } else {
                $oldPath = FCPATH . 'img/ticket/proof/' . $payment['bukti_pembayaran'];
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }

                $result = $this->pembayaranModel->where('id_pesanan', $orderId)->set(['bukti_pembayaran' => $newName])->update();
                if ($result) {
                    $proof->move(FCPATH . 'img/ticket/proof/', $newName);

                    if ($uriString) {
                        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diperbarui.');
                    } else {    
                        return redirect()->route('order.thanks')->with('success', 'Bukti pembayaran berhasil diperbarui.');
                    }
                }
                return redirect()->back()->with('error', 'Gagal memperbarui file.');
            }
        }
    }

    public function thanks()
    {
        $data = [
            'pageTitle' => 'Kayangan Harbor | Terima Kasih'
        ];

        return view('landing/thanks', $data);
    }
}
