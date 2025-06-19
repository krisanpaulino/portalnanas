<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KonsultasiModel;
use App\Models\PercakapanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Konsultasi extends BaseController
{
    function index()
    {
        $model = new KonsultasiModel();
        $data['title'] = 'Daftar Konsultasi';
        $data['konsultasi'] = $model->getKonsultasi();
        return view('konsultasi/konsultasi_index', $data);
    }
    public function terima($id)
    {
        $model = new KonsultasiModel();
        $data['admin_id'] = session('user')->user_id;
        $model->where('konsultasi_id', $id);
        $model->set($data);
        $model->update();

        return redirect()->to('admin/chat/' . $id);
    }
    function chat($id)
    {
        $data['title'] = 'Percakapan';
        $model = new KonsultasiModel();
        $konsultasi = $model->getKonsultasi($id);
        $model = new PercakapanModel();
        $percakapan = $model->byKonsultasi($id);
        $data['konsultasi'] = $konsultasi;
        $data['percakapan'] = $percakapan;
        return view('konsultasi/chat', $data);
    }
    public function endChat()
    {
        $id = $this->request->getPost('konsultasi_id');
        $model = new KonsultasiModel();
        $data['status'] = 'close';
        $model->where('konsultasi_id', $id);
        $model->set($data);
        $model->update();
        // dd($id);
        return redirect()->to('admin/chat/' . $id);
    }
}
