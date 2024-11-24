<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {

        if (session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('dashboard')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }
        $data['title'] = ('Administrator');
        echo view('admin/temp/l_header', $data);
        echo view('admin/login');
    }

    public function doLogin()
    {
        $request = $this->request;

        // Ambil input dari form login
        $username = $request->getPost('username');
        $password = $request->getPost('password');

        // Validasi input (pastikan username dan password tidak kosong)
        if (empty($username) || empty($password)) {
            return redirect()->back()->with('error', 'Username dan password harus diisi!');
        }

        // Inisialisasi model user
        $userModel = new UserModel();

        // Cek keberadaan user dan validasi password
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set data sesi
            $this->setUserSession($user);

            // Redirect ke halaman dashboard
            return redirect()->to('dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal, kirimkan pesan error
        return redirect()->back()->with('error', 'Username atau password salah!');
    }

    private function setUserSession(array $user)
    {
        session()->set([
            'username' => $user['username'],
            'isLoggedIn' => true,
            'role_id' => $user['role_id'],
        ]);
    }


    public function logout()
    {
        // Hapus semua session
        session()->destroy();
        return redirect()->to('/');
    }
}
