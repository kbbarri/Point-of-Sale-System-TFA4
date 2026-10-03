<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // Show the login page
    public function login()
    {
        return view('login');
    }

    // Check the submitted username and password
    public function attemptLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        // Check if username/password fields are empty
        if (!$this->validate($rules)) {
            return view('login', [
                'validation' => $this->validator
            ]);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        // Find the user by username
        $user = $userModel
            ->where('username', $username)
            ->first();

        // Check username and hashed password
        if (!$user || !password_verify($password, $user['password'])) {
            return view('login', [
                'error' => 'Invalid username or password.'
            ]);
        }

        // Regenerate session ID after successful login
        session()->regenerate();

        // Store login information in the session
        session()->set([
            'isLoggedIn' => true,
            'userId'     => $user['id'],
            'username'   => $user['username'],
            'fullName'   => $user['full_name']
        ]);

        // Go to Customers after successful login
        return redirect()->to('/customers');
    }

    // Log the user out
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}