<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BudidayaModel;
use App\Models\TrendhargaModel;
use DOMDocument;

class Trend extends BaseController
{
    public function index()
    {
        $model = new TrendhargaModel();
        $trend = $model->orderBy('trendharga_id', 'desc')->findAll();
        $data = [
            'title' => 'Data trend',
            'trend' => $trend
        ];
        return view('trend/index', $data);
    }
    public function store()
    {
        $data = $this->request->getPost();
        $model = new TrendhargaModel();

        if ($model->insert($data)) {
            return redirect()->to(session('user')->user_type . '/trend-harga')
                ->with('success', 'Data trend harga berhasil disimpan!!');
        }
        return redirect()->to(session('user')->user_type . '/trend-harga')
            ->with('danger', 'Gagal buat trend harga!!');
    }
    public function update()
    {
        $id = $this->request->getPost('trendharga_id');
        $data = $this->request->getPost();
        $model = new TrendhargaModel();
        $model->where('trendharga_id', $id);
        $model->set($data);
        if ($model->update($data)) {
            return redirect()->to(session('user')->user_type . '/trend-harga')
                ->with('success', 'Data trend harga berhasil disimpan!!');
        }
        return redirect()->to(session('user')->user_type . '/trend-harga')
            ->with('danger', 'Gagal buat trend harga!!')->with('errors', $model->errors());
    }

    public function delete()
    {
        $trendharga_id = $this->request->getPost('trendharga_id');
        $model = new TrendhargaModel();
        $model->where('trendharga_id', $trendharga_id);
        $model->delete();

        return redirect()->back()->with('success', 'Data trend harga berhasil dihapus');
    }
}
