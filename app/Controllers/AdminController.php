<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth');
        }

        if (!session()->get('role_id') == 0) {
            return redirect()->to('auth');
        }

        $data['title'] = "Administrator";
        $model = new UserModel();
        $data['foreach'] = $model->getadmin();

        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/administrator', $data);
        // echo ('<pre>');
        // print_r($data);
    }

    public function adduser()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth');
        }

        if (!session()->get('role_id') == 0) {
            return redirect()->to('auth');
        }

        $data['title'] = "Tambah User";

        $model = new UserModel;
        $data['id_user'] = $model->getiduser();

        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/temp/form/user_form', $data);
    }

    public function doadduser()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth');
        }

        if (!session()->get('role_id') == 0) {
            return redirect()->to('auth');
        }

        $model = new UserModel;

        $pw = $this->request->getPost('password');
        $pwhash = password_hash($pw, PASSWORD_DEFAULT);


        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'email_user' => $this->request->getPost('email_user'),
            'username' => $this->request->getPost('username'),
            'password' => $pwhash,
            'role_id' => $this->request->getPost('role_id')
        ];
        // echo ('<pre>');
        // print_r($data);
        $model->insert($data);
        return redirect()->to('administrator')->with('success', 'User Berhasil Ditambahkan!');
    }

    public function hapususer($id_user)
    {
        // Cek apakah pengguna sudah login
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses ditolak. Silakan login terlebih dahulu.');
        }

        // Cek apakah pengguna memiliki izin untuk menghapus user (misalnya role_id harus 0)
        if (session()->get('role_id') != 0) {
            return redirect()->to('dashboard')->with('error', 'Akses ditolak. Anda tidak memiliki izin.');
        }

        // Inisialisasi model
        $model = new UserModel();

        // Cek apakah ID user yang akan dihapus ada di database
        $user = $model->find($id_user);
        if (!$user) {
            return redirect()->to('administrator')->with('error', 'User tidak ditemukan.');
        }

        // Hapus user
        $model->delete($id_user);

        // Redirect ke halaman administrator dengan pesan sukses
        return redirect()->to('administrator')->with('success', 'User berhasil dihapus!');
    }
}