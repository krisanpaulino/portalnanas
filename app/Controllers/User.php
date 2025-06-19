<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetaniModel;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $user = $model->findAll();

        $data = [
            'title' => 'User',
            'user' => $user
        ];

        return view('penggunaadmin/index', $data);
    }
    public function store()
    {
        $file = $this->request->getFile('file');
        // dd($file);
        //Buat User
        $model = new UserModel();
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'user_password' => $this->request->getPost('user_password'),
            'password_confirmation' => $this->request->getPost('password_confirmation'),
            'user_type' => 'admin'
        ];
        // dd($data);
        if ($model->insert($data)) {
            $user_id = $model->getInsertID();

            $model = new UserModel();
            $data = $this->request->getPost();
            $data['user_id'] = $user_id;
            if (!empty($file)) {
                $filename = 'profile_' . $user_id . '.' . $file->getExtension();
                $path = './assets/img/profile';
                if ($file->move($path, $filename, true)) {
                    $data['foto'] = $filename;
                }
            }
            if ($model->update($user_id, $data)) {
                return redirect()->to(previous_url())
                    ->with('success', 'Data berhasil disimpan!');
            } else {
                $errors = $model->errors();
                //Hapus User
                $model = new UserModel();
                $model->where('user_id', $user_id);
                $model->delete($user_id);
                // dd($errors);
                return redirect()->to(previous_url())->with('danger', 'Data Gagal Disimpan. Cek Kembali Data Yang Dimasukkan!!')->with('errors', $errors)->withInput();
            }
        } else {
            // dd($model->errors());
            return redirect()->to(previous_url())->with('danger', 'Data Gagal Disimpan. Cek Kembali Data Yang Dimasukkan!!')->with('errors', $model->errors())->withInput();
        }
    }
    public function detail($user_id)
    {
        $model = new UserModel();
        $user = $model->find($user_id);
        $data = [
            'title' => 'Detail user',
            'user' => $user
        ];
        return view('penggunaadmin/detail', $data);
    }
    public function profil()
    {
        $petani = petani();
        $data = [
            'title' => 'Detail Petani',
            'petani' => $petani
        ];
        return view('petani/profil', $data);
    }
    public function update()
    {
        $data = $this->request->getPost();
        $model = new UserModel();
        $user = $model->find($data['user_id']);
        // dd($user);
        $file = $this->request->getFile('file');
        if (!empty($file) && $file->isValid()) {
            $filename = 'profile_' . $user->user_id . '.' . $file->getExtension();
            $path = './assets/img/profile';
            if ($file->move($path, $filename, true)) {
                $data['foto'] = $filename;
            }
            // dd('here');
        }
        $model->where('user_id', $data['user_id']);
        $model->set($data);
        if ($model->update()) {
            return redirect()->back()->with('success', 'Data Berhasil Disimpan!');
        }
        return redirect()->to(previous_url())->with('errors', $model->errors())->with('danger', 'Data gagal disimpan!');
    }
    public function delete()
    {
        $model = new PetaniModel();
        $petani_id = $this->request->getPost('petani_id');
        $petani = $model->find($petani_id);
        $user_id = $petani->user_id;
        $model->where('petani_id', $petani_id);
        $model->delete();

        $model = new UserModel();
        $model->where('user_id', $user_id);
        $model->delete();

        return redirect()->back()
            ->with('success', 'Data berhasil dihapus!');
    }
    function updatePassword()
    {
        // $user_id = user()->user_id;
        $current_password = $this->request->getPost('current_password');
        $model = new UserModel();
        $user = admin();
        //cek validasi password 
        if (!password_verify($current_password, $user->user_password)) {
            return redirect()->back()->with('danger', 'Password Salah');
        }
        $data = [
            'user_password' => $this->request->getPost('user_password'),
            'password_confirmation' => $this->request->getPost('password_confirmation')
        ];
        // dd($user);
        $model->where('user_id', session('user')->user_id);
        $model->set($data);
        if (!$model->update())
            // dd($model->errors());
            return redirect()->back()->with('errors', $model->errors())->with('danger', 'Konfirmasi Password tidak sama');

        return redirect()->back()
            ->with('success', "Berhasil diubah");
    }
    public function resetPassword()
    {
        $model = new UserModel();
        $user_id = $this->request->getPost('user_id');
        $user = $model->find($user_id);
        $data = [
            'user_id' => $user_id,
            'username' => $user->username,
            'user_password' => 'qwerty123',
            'password_confirmation' => 'qwerty123'
        ];
        // dd($data);
        $model->update($user_id, $data);
        return redirect()->back()
            ->with('success', 'Password berhasil direset!');
    }
}
