<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data['users'] = $userModel->findAll();

        return view('users', $data);
    }

    public function new()
    {
        return view('user_new');
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required',
            'password'  => 'required|min_length[8]'
        ];

        if (!$this->validate($rules)) {
            return view('user_new', [
                'validation' => $this->validator
            ]);
        }

        $userModel = new UserModel();

        $userModel->insert([
            'username'   => $this->request->getPost('username'),
            'password'   => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/users')
            ->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'User not found.'
            );
        }

        return view('user_edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'User not found.'
            );
        }

        $rules = [
            'username' => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required'
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] =
                'uploaded[avatar]'
                . '|is_image[avatar]'
                . '|mime_in[avatar,image/jpg,image/jpeg,image/png]'
                . '|max_size[avatar,2048]';
        }

        if (!$this->validate($rules)) {
            return view('user_edit', [
                'user'       => $user,
                'validation' => $this->validator
            ]);
        }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            $newName = $avatar->getRandomName();

            $uploadPath = FCPATH . 'uploads/avatars';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            $tempPath = $avatar->getTempName();

            service('image')
                ->withFile($tempPath)
                ->fit(300, 300, 'center')
                ->save($uploadPath . DIRECTORY_SEPARATOR . $newName);

            $data['avatar'] = $newName;
        }

        $userModel->update($id, $data);

        return redirect()->to('/users')
            ->with('success', 'User updated successfully.');
    }
}