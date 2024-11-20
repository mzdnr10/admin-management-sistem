<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index(){

        if (session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('dashboard')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }
        $data['title'] = ('Administrator');
        echo view('admin/temp/l_header', $data);
        echo view('admin/login');
    }

    public function doLogin(){

        // Memuat input dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Menggunakan model untuk mencari user berdasarkan username
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();
        
        // echo '<pre>';
        //     print_r($user['password']);
        //     print_r($password);

        // Jika user ditemukan dan password benar
        $user = $userModel->validateUser($username, $password);

        if ($user) {
            // Set session
            session()->set([
                'username' => $user['username'],
                'isLoggedIn' => true
            ]);

            // Redirect ke halaman dashboard atau home
            return redirect()->to('Dashboard');
        } else {
            // Jika login gagal, kirimkan pesan error
            return redirect()->back()->with('error', 'username atau Password salah !');
        }
    }

    public function logout()
    {
        // Hapus semua session
        session()->destroy();
        return redirect()->to('/');
    }
}
