<?php

namespace App\Controllers;

use App\Models\DokumenModel;

class DashController extends BaseController
{

    public function index()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth');
        }

        $data['title'] = "Dashboard";
        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/dashboard');

        // echo '<pre>';
        // print_r($data);

    }

    public function tabeldosen()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }


        $data['title'] = "Tabel";
        $data['foreach'] = [];


        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/tabeldosen');
    }


    public function dokumen()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $data['title'] = "Dokumen";

        $model = new DokumenModel();
        $data['foreach'] = $model->getdokumen();


        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/dokumen', $data);
        // echo ('<pre>');
        // print_r($data);
    }

    public function adddokumen()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }
        $data['title'] = "Dokumen";

        $model = new DokumenModel();
        $data['id_dokumen'] = $model->getiddokumen();

        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/temp/form/dokumen_form', $data);
    }

    public function doadddokumen()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }
        $model = new DokumenModel();

        // Mendapatkan data dari form
        $id_dokumen = $this->request->getPost('id_dokumen');
        $namaDokumen = $this->request->getPost('nama_dokumen');
        $kategoriDokumen = $this->request->getPost('kategori_dokumen');
        $fileDokumen = $this->request->getFile('file_dokumen');
        $tanggalUpload = date('Y-m-d'); // Tanggal hari ini
        $tanggalUpdate = date('Y-m-d'); // Tanggal hari ini

        // Pindahkan file ke folder dokumen
        if ($fileDokumen->isValid() && !$fileDokumen->hasMoved()) {
            $fileName = $fileDokumen->getName();
            $fileDokumen->move(WRITEPATH . '../file/', $fileName);
        }

        // Data yang akan disimpan
        $data = [
            'id_dokumen' => $id_dokumen,
            'nama_dokumen' => $namaDokumen,
            'kategori_dokumen' => $kategoriDokumen,
            'file' => $fileName,
            'tanggal_upload' => $tanggalUpload,
            'tanggal_update' => $tanggalUpdate
        ];

        // echo ('<pre>');
        // print_r($data);
        // Simpan ke database
        $model->insert($data);

        // Redirect ke halaman dokumen dengan pesan sukses
        return redirect()->to('dokumen')->with('success', 'Dokumen berhasil ditambahkan');
    }

    public function hapusdokumen($id_dokumen)
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $model = new DokumenModel();
        // Ambil data dokumen berdasarkan id
        $dokumen = $model->find($id_dokumen);

        if ($dokumen) {
            // Hapus file dokumen dari server
            $filePath = WRITEPATH . '../file/' . $dokumen['file'];

            // Cek apakah file ada di direktori
            if (file_exists($filePath)) {
                // Hapus file dari direktori
                unlink($filePath);
            }

            // Hapus data dokumen dari database
            $model->delete($id_dokumen);

            // Redirect ke halaman dokumen dengan pesan sukses
            return redirect()->to('/dokumen')->with('success', 'Dokumen berhasil dihapus');
        } else {
            return redirect()->to('/dokumen')->with('error', 'Dokumen tidak ditemukan');
        }
    }

    public function editdokumen($id_dokumen)
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }
        $data['title'] = "Dokumen";

        $model = new DokumenModel();
        $data['dokumen'] = $model->find($id_dokumen);

        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/temp/form/edit_dokumen_form', $data);
    }

    public function doeditdokumen($id_dokumen)
    {
        // Validasi ID
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }
        $model = new DokumenModel();

        // Cari data dokumen berdasarkan ID
        $document = $model->find($id_dokumen);

        if (!$document) {
            return redirect()->back()->with('error', 'Dokumen tidak ditemukan.');
        }

        // Validasi input dari form
        $namaDokumen = $this->request->getPost('nama_dokumen');
        $kategoriDokumen = $this->request->getPost('kategori_dokumen');
        $fileDokumen = $this->request->getFile('file_dokumen');

        // Validasi nama dokumen dan kategori dokumen
        if (empty($namaDokumen) || empty($kategoriDokumen)) {
            return redirect()->back()->with('error', 'Nama dokumen dan kategori dokumen wajib diisi.');
        }

        // Update data dokumen
        $data = [
            'nama_dokumen' => $namaDokumen,
            'kategori_dokumen' => $kategoriDokumen,
            'tanggal_update' => date('Y-m-d H:i:s') // Tanggal update otomatis
        ];

        // print_r($data);

        // Jika ada file baru diunggah
        if ($fileDokumen->isValid() && !$fileDokumen->hasMoved()) {
            // Hapus file lama jika ada
            $oldFile = WRITEPATH . '../file/' . $document['file'];
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }

            // Upload file baru
            $newFileName = $fileDokumen->getName();
            $fileDokumen->move(WRITEPATH . '../file/', $newFileName);
            $data['file'] = $newFileName; // Simpan nama file baru ke database
        }

        // Simpan perubahan ke database
        $model->update($id_dokumen, $data);

        return redirect()->to('/dokumen')->with('success', 'Dokumen berhasil diperbarui.');
    }
}
