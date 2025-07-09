<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotifikasiModel;

class NotificationController extends BaseController
{
    protected $notifikasiModel;

    public function __construct()
    {
        $this->notifikasiModel = new NotifikasiModel();
    }

    public function read($notifId)
    {
        $notification = $this->notifikasiModel->find($notifId);

        if (!$notification) {
            return redirect()->back()->with('error', 'Pesan tidak ditemukan!');
        }

        $result = $this->notifikasiModel->update($notifId, [
            'dibaca' => 1
        ]);

        if ($result) {
            return redirect()->back()->with('success', 'Pesan telah dibaca');
        }
        return redirect()->back()->with('success', 'Gagal membaca pesan');
    }
    
    public function destroy()
    {
        $postData = $this->request->getPost();
        $notification = $this->notifikasiModel->find($postData['id_notifikasi']);
        
        if (!$notification) {
            return redirect()->back()->with('error', 'Pesan tidak ditemukan!');
        }

        $result = $this->notifikasiModel->delete($postData['id_notifikasi']);

        if ($result) {
            return redirect()->back()->with('success', 'Pesan telah dihapus');
        }
        return redirect()->back()->with('success', 'Gagal menghapus pesan');
    }
}
