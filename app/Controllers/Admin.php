<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['title'] = 'Admin';
        $data['users'] = $model->findAdmins();
        return view('admin/index', $data);
    }


    public function edit($user_id)
    {
        $model = new UserModel();
        $data['title'] = 'Edit Admin';
        $data['admin'] = $model->find($user_id);
        return view('admin/edit', $data);
    }

    public function delete()
    {
        $model = new UserModel();
        $user_id = $this->request->getPost('user_id');
        $model->delete($user_id);
        return redirect()->to('admin/user');
    }
    public function store()
    {
        $data = $this->request->getPost();
        $data['user_type'] = 'admin';
        $data['user_active'] = 1;
        $model = new UserModel();
        if ($model->insert($data)) {
            return redirect()->to('admin/user');
        } else {
            // dd($model->errors()['password_confirmation']);
            return redirect()->back()
                ->with('errors', $model->errors())
                ->withInput();
        }
    }
}
