<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GaleriModel;
use DOMDocument;

class Galeri extends BaseController
{
    public function index()
    {
        $model = new GaleriModel();
        if (session('user')->user_type == 'admin')
            $galeri = $model->getAll();
        else
            $galeri = $model->getAll();
        $data = [
            'title' => 'Data galeri',
            'galeri' => $galeri
        ];
        return view('galeri/index', $data);
    }
    public function tambah()
    {
        $galeri = new GaleriModel();
        $data['title'] = 'Tambah galeri';
        $data['form_title'] = 'Tambah galeri';
        $data['galeri'] = $galeri;
        return view('galeri/form', $data);
    }
    public function store()
    {
        $model = new GaleriModel();
        $data = $this->request->getPost();
        $file = $this->request->getFile('file');
        if ($model->insert($data)) {
            $galeri_id = $model->getInsertID();

            if (!empty($file)) {
                $filename = 'galeri_' . $galeri_id . '.' . $file->getExtension();
                $path = './assets/img/galeri';
                if ($file->move($path, $filename, true)) {
                    $upd['gambar'] = $filename;
                }
            }
            $model->where('galeri_id', $galeri_id);
            $model->set($upd);
            if ($model->update()) {
                return redirect()->to(previous_url())
                    ->with('success', 'Data berhasil disimpan!');
            } else {
                $errors = $model->errors();
                //Hapus User
                $model->where('galeri_id', $galeri_id);
                $model->delete($galeri_id);
                // dd($errors);
                return redirect()->to(previous_url())->with('danger', 'Data Gagal Disimpan. Cek Kembali Data Yang Dimasukkan!!')->with('errors', $errors)->withInput();
            }
        } else {
            // dd($model->errors());
            return redirect()->to(previous_url())->with('danger', 'Data Gagal Disimpan. Cek Kembali Data Yang Dimasukkan!!')->with('errors', $model->errors())->withInput();
        }
    }
    public function update()
    {
        $model = new GaleriModel();
        $data = $this->request->getPost();
        $galeri_id = $this->request->getPost('galeri_id');
        $file = $this->request->getFile('file');
        if (!empty($file) && $file->isValid()) {
            $filename = 'galeri_' . $galeri_id . '.' . $file->getExtension();
            $path = './assets/img/galeri';
            if ($file->move($path, $filename, true)) {
                $data['gambar'] = $filename;
            }
        }
        $model->where('galeri_id', $galeri_id);
        $model->set($data);
        if ($model->update()) {
            // dd($model->errors());
            return redirect()->to(previous_url())
                ->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->to(previous_url())->with('danger', 'Data Gagal Disimpan. Cek Kembali Data Yang Dimasukkan!!')->with('errors', $model->errors())->withInput();
        }
    }
    public function delete()
    {
        $model = new GaleriModel();
        $galeri_id = $this->request->getPost('galeri_id');
        // $galeri = $model->find($galeri_id);
        // $user_id = $galeri->user_id;
        $model->where('galeri_id', $galeri_id);
        $model->delete();
        return redirect()->back()
            ->with('success', 'Data berhasil dihapus!');
    }
}
