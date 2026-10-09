<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        return view('users/index', ['title' => 'User Accounts', 'users' => (new UserModel())->orderBy('id', 'DESC')->findAll()]);
    }

    public function new(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $model = new UserModel();
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost(['username', 'full_name', 'email']);
            $rules = $model->getValidationRules();
            $rules['username'] .= '|is_unique[users.username]';
            if ($this->validateData($data, $rules)) {
                $data['created_at'] = date('Y-m-d H:i:s');
                $model->insert($data);
                return redirect()->to('/users')->with('message', 'User added successfully.');
            }
        }
        return view('users/form', ['title' => 'New User', 'user' => null, 'errors' => $this->validator?->getErrors() ?? []]);
    }

    public function edit(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $model = new UserModel();
        $user = $model->find($id);
        if (!$user) return redirect()->to('/users')->with('error', 'User not found.');
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost(['username', 'full_name', 'email']);
            $rules = $model->getValidationRules();
            $rules['username'] .= '|is_unique[users.username,id,' . $id . ']';
            if ($this->validateData($data, $rules)) {
                $file = $this->request->getFile('avatar');
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    if (!in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png'], true) || $file->getSizeByUnit('mb') > 2) {
                        return view('users/form', ['title' => 'Edit User', 'user' => array_merge($user, $data), 'errors' => ['avatar' => 'Avatar must be a JPG or PNG image no larger than 2MB.']]);
                    }
                    $filename = $file->getRandomName();
                    $destination = FCPATH . 'uploads';
                    if (!is_dir($destination)) mkdir($destination, 0775, true);
                    service('image')->withFile($file->getTempName())->resize(320, 320, true, 'height')->save($destination . DIRECTORY_SEPARATOR . $filename);
                    $data['avatar'] = $filename;
                }
                $model->update($id, $data);
                return redirect()->to('/users')->with('message', 'User updated successfully.');
            }
        }
        return view('users/form', ['title' => 'Edit User', 'user' => $user, 'errors' => $this->validator?->getErrors() ?? []]);
    }
}
