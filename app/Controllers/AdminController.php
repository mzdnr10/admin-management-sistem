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

    public function profile()
    {

        $data['title'] = "Profile";
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $model = new UserModel();
        $username = session()->get('username');

        $user = $model->where('username', $username)->first();

        // Jika user ditemukan, kirimkan ke view
        if ($user) {

            echo view('admin/temp/l_header', $data);
            echo view('admin/temp/sidebar');
            echo view('admin/temp/topbar');
            echo view('admin/profile', $user);
        } else {
            // Jika user tidak ditemukan, kirimkan pesan error
            return redirect()->to('dashboard')->with('error', 'Profil pengguna tidak ditemukan.');
        }
    }

    public function doeditprofile()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }
        $username = session()->get('username');


        $model = new UserModel();
        $user = $model->where('username', $username)->first();
        $username = $this->request->getPost('username');
        $email_user = $this->request->getPost('email_user');

        $data = [
            'email_user' => $email_user,
            'username' => $username
        ];

        session()->set('username', $data['username']);

        $model->update($user['id_user'], $data);
        return redirect()->back()->with('success', 'Profile berhasil diperbarui!');
    }

    public function doubahpassword($id_user)
    {
        // Periksa apakah user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses ditolak. Anda harus login terlebih dahulu.');
        }

        $model = new UserModel();

        // Ambil data dari form
        $old_password = $this->request->getPost('old_password');
        $new_password = $this->request->getPost('new_password');
        $conf_password = $this->request->getPost('conf_password');

        // Validasi: cek apakah password lama benar
        $user = $model->find($id_user); // Ambil data user berdasarkan id_user
        if (!$user || !password_verify($old_password, $user['password'])) {
            return redirect()->back()->with('error', 'Password lama salah!');
        }

        // Validasi: cek apakah password baru dan konfirmasi cocok
        if ($new_password !== $conf_password) {
            return redirect()->back()->with('error', 'Password baru dan konfirmasi tidak cocok!');
        }

        // Hash password baru
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password di database
        $model->update($id_user, ['password' => $hashed_password]);

        // Redirect dengan pesan sukses
        return redirect()->to('profile')->with('success', 'Password berhasil diubah!');
    }
}
