<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PakarModel;
use App\Models\PetaniModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->has('user')) {
            return redirect()->to(session()->get('user')->user_type);
        }
        return view('login');
    }

    public function login()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $model->getLoginData($username);
        // dd($user->user_password);
        if ($user == null) {
            return redirect()->to(previous_url())
                ->with('danger', 'Username tidak ditemukan!');
        }

        if (!password_verify($password, $user->user_password)) {
            return redirect()->to(previous_url())
                ->with('danger', 'Password Salah!');
        }


        switch ($user->user_type) {
            case 'admin':
                $data = [
                    'user' => $user,
                    'admin_logged_in' => 1,
                ];
                session()->set($data);
                return redirect()->to('admin');
                break;
            case 'pengguna':
                $model = new UserModel();

                $data = [
                    'user' => $user,
                    'pengguna_logged_in' => 1,
                    'pengguna' => $model->where('user_id', $user->user_id)->first(),
                ];
                session()->set($data);
                return redirect()->to('/');
                break;
            default:
                return redirect()->to('/');
                break;
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth');
    }

    public function signup()
    {
        $data['title'] = 'Registrasi Petani';
        return view('signup', $data);
    }
    function registrasi()
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
            'user_type' => 'pengguna'
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
}
