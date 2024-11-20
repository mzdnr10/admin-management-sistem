<?php

namespace App\Controllers;

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
        if (!$id_program) {
            return redirect()->to('dataprogram')->with('error', 'Program tidak ditemukan');
        }
        $modelprogram->delete($id_program);
        return redirect()->to('dataprogram')->with('success', 'Program Berhasil dihapus');
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
}
