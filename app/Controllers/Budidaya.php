<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BudidayaModel;
use DOMDocument;

class Budidaya extends BaseController
{
    public function index()
    {
        $model = new BudidayaModel();
        if (session('user')->user_type == 'admin')
            $budidaya = $model->getAll();
        else
            $budidaya = $model->getAll();
        $data = [
            'title' => 'Data budidaya',
            'budidaya' => $budidaya
        ];
        return view('budidaya/index', $data);
    }
    public function tambah()
    {
        $budidaya = new BudidayaModel();
        $data['title'] = 'Tambah budidaya';
        $data['form_title'] = 'Tambah budidaya';
        $data['budidaya'] = $budidaya;
        return view('budidaya/form', $data);
    }
    public function store()
    {
        $data = $this->request->getPost();
        $doc = new DOMDocument();
        @$doc->loadHTML($data['isi']);

        $tags = $doc->getElementsByTagName('img');
        $data['user_id'] = session('user')->user_id;
        if ($tags->count() > 0) {
            $url = $tags[0]->getAttribute('src');
            $pathinfo = pathinfo($url);
            $image = $pathinfo['filename'] . '.' . $pathinfo['extension'];
            $data['gambar'] = $image;
            $model = new BudidayaModel();
            if ($model->insert($data)) {
                return redirect()->to(session('user')->user_type . '/budidaya')
                    ->with('success', 'Data budidaya berhasil disimpan!!');
            }
            // dd($data);
            return redirect()->back()
                ->with('errors', $model->errors())
                ->with('danger', 'Periksa kembali data budidaya!')
                ->withInput();
        } else {
            return redirect()->back()
                ->with('danger', 'Detail tamaman harus ada gambar!')
                ->withInput();
        }
    }
    public function update()
    {
        $budidaya_id = $this->request->getPost('budidaya_id');
        $data = $this->request->getPost();
        $model = new BudidayaModel();
        $doc = new DOMDocument();
        @$doc->loadHTML($data['isi']);

        $tags = $doc->getElementsByTagName('img');

        if ($tags->count() > 0) {
            $url = $tags[0]->getAttribute('src');
            $pathinfo = pathinfo($url);
            $image = $pathinfo['filename'] . '.' . $pathinfo['extension'];
            $data['gambar'] = $image;
            if ($model->update($budidaya_id, $data)) {
                return redirect()->back()
                    ->with('success', 'Data budidaya berhasil disimpan!!');
            } else {
                return redirect()->back()
                    ->with('errors', $model->errors())
                    ->with('danger', 'Periksa kembali data budidaya!')
                    ->withInput();
            }
            // dd($image);
        } else {
            return redirect()->to('admin/budidaya')
                ->with('danger', 'Detail tamaman harus ada gambar!')
                ->withInput();
        }
    }
    public function edit($budidaya_id)
    {
        $model = new BudidayaModel();
        $budidaya = $model->find($budidaya_id);

        $data = [
            'title' => 'Detail budidaya',
            'budidaya' => $budidaya
        ];
        $data['form_title'] = 'Update budidaya';

        return view('budidaya/form', $data);
    }
    public function detail($budidaya_id)
    {
        $model = new BudidayaModel();
        $budidaya = $model->getSingle($budidaya_id);

        $data = [
            'title' => 'Detail budidaya',
            'budidaya' => $budidaya
        ];

        return view('budidaya/detail', $data);
    }
    public function delete()
    {
        $budidaya_id = $this->request->getPost('budidaya_id');
        $model = new BudidayaModel();
        $model->where('budidaya_id', $budidaya_id);
        $model->delete();

        return redirect()->back()->with('success', 'Data budidaya berhasil dihapus');
    }
    public function detailFront($budidaya_id)
    {
        $model = new BudidayaModel();
        $budidaya = $model->find($budidaya_id);

        $data = [
            'title' => 'Detail budidaya',
            'budidaya' => $budidaya,
        ];

        return view('isi', $data);
    }
}
