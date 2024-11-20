<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\ProgramModel;

class ProgramController extends BaseController
{

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $data['title'] = "Data Program";
        $program = new ProgramModel;
        $data['foreach'] = $program->getprogram();


        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/dataprogram', $data);
    }

    public function addprogram()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }



        $idprogram = new ProgramModel();
        $data['id_program'] = $idprogram->getidprogram();

        $data['title'] = 'Tambah Program';
        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/temp/form/program_form', $data);

        // echo '<pre>';
        //     print_r($data);

    }

    public function doaddprogram()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $modelprogram = new ProgramModel();

        $data['id_program'] = $this->request->getPost('id_program');
        $data['nama_program'] = $this->request->getPost('nama_program');
        $data['tahun_program'] = $this->request->getPost('tahun_program');
        $modelprogram->insert($data);
        return redirect()->to('dataprogram')->with('success', 'Data Berhasil Ditambahkan!');
        // echo ('<pre>');
        // print_r($data);

    }

    public function hapusprogram($id_program)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses anda ditolak');
        }

        $modelprogram = new ProgramModel();
        $modeldosen = new DosenModel();  // Pastikan Anda sudah memiliki model untuk Dosen

        // Validasi apakah ID program ada
        if (!$id_program || !$modelprogram->find($id_program)) {
            return redirect()->to('dataprogram')->with('error', 'Program tidak ditemukan');
        }

        // Pengecekan apakah ada dosen yang masih menggunakan program ini
        $dosenTerhubung = $modeldosen->where('id_program', $id_program)->first();
        if ($dosenTerhubung) {
            // Jika ada dosen yang menggunakan program ini, kembalikan pesan error
            return redirect()->to('dataprogram')->with('error', 'Program tidak dapat dihapus karena masih digunakan oleh dosen.');
        }

        try {
            // Coba hapus program
            $modelprogram->delete($id_program);
            return redirect()->to('dataprogram')->with('success', 'Program berhasil dihapus');
        } catch (\Exception $e) {
            // Tangani error lain yang mungkin terjadi
            return redirect()->to('dataprogram')->with('error', 'Terjadi kesalahan saat menghapus program.');
        }
    }


    public function editprogram($id_program)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses anda ditolak');
        }

        $modelprogram = new ProgramModel();
        $data = $modelprogram->getprogrambyid($id_program);
        // print_r($data);
        $data['title'] = 'Edit Program';
        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/temp/form/edit_program_form', $data);
    }

    public function doeditprogram($id_program)
    {

        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses anda ditolak');
        }

        $modelprogram = new ProgramModel();

        $data['id_program'] = $this->request->getPost('id_program');
        $data['nama_program'] = $this->request->getPost('nama_program');
        $data['tahun_program'] = $this->request->getPost('tahun_program');

        $modelprogram->update($id_program, $data);
        return redirect()->to('dataprogram')->with('success', 'Program Berhasil Diedit');
    }

    public function searchprogram()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses anda ditolak');
        }

        $data['title'] = "Search Program";

        $keyword = $this->request->getGet('keyword'); // Ambil kata kunci dari form
        $model = new ProgramModel();

        if ($keyword) {
            // Pencarian data berdasarkan keyword
            $data['foreach'] = $model->searchProgram($keyword);
        } else {
            // Jika tidak ada keyword, tampilkan semua data
            $data['programs'] = $model->findAll();
        }

        $data['keyword'] = $keyword; // Simpan keyword untuk ditampilkan kembali
        
        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar', $data);
        echo view('admin/dataprogram', $data); // Tampilkan tabel dengan hasil pencarian

    }
}
