<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\ProgramModel;

class DosenController extends BaseController
{

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }



        $data['title'] = "Data Dosen";
        $dosen = new DosenModel;
        $data['foreach'] = $dosen->getprogrambydosen();

        // echo ('<pre>');
        // print_r($data);

        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/tabeldosen', $data);
    }

    public function adddosen()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }



        $id = new DosenModel();
        $modelprogram = new ProgramModel();
        $data['id_dosen'] = $id->getiddosen();
        $data['nama_program'] = $modelprogram->getnameprogram();

        $data['title'] = 'Tambah Program';
        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/temp/form/dosen_form', $data);
    }

    public function doadddosen()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $model = new DosenModel();
        $modelprogram = new ProgramModel();

        $id_program = $this->request->getPost('id_program');
        $id_dosen = $model->getiddosen();

        $getid = $modelprogram->getidprogram();
        $programname = $this->request->getPost('nama_program');
        $nama_program_baru = $this->request->getPost('nama_program'); // Ambil data program baru dari input
        $tahun_program = $this->request->getPost('tahun_program');




        if ($id_program === 'new') {

            if (empty($programname)) {
                return redirect()->back()->with('error', 'Nama Program Tidak Boleh Kosong!');
            }
            $cekprogram = $modelprogram->getidbyprogram($nama_program_baru);

            if ($cekprogram) {

                $data['id_dosen'] = $id_dosen;
                $data['id_program'] = $cekprogram['id_program'];
                $data['nidn'] = $this->request->getPost('nidn');
                $data['nama_dosen'] = $this->request->getPost('nama_dosen');
                $data['perguruan_tinggi'] = $this->request->getPost('perguruan');
                $data['email_dosen'] = $this->request->getPost('email');
                $data['no_telp'] = $this->request->getPost('no_hp');
                $data['jabatan_fungsional'] = $this->request->getPost('jabatan');

                $model->insert($data);

                return redirect('DosenController')->with('success', 'Data berhasil ditambahkan!');
            }

            $dataprogram = [
                'id_program' => $getid,
                'nama_program' => $nama_program_baru,
                'tahun_program' => $tahun_program
            ];
            $modelprogram->insert($dataprogram);

            $data['id_dosen'] = $id_dosen;
            $data['id_program'] = $getid;
            $data['nidn'] = $this->request->getPost('nidn');
            $data['nama_dosen'] = $this->request->getPost('nama_dosen');
            $data['perguruan_tinggi'] = $this->request->getPost('perguruan');
            $data['email_dosen'] = $this->request->getPost('email');
            $data['no_telp'] = $this->request->getPost('no_hp');
            $data['jabatan_fungsional'] = $this->request->getPost('jabatan');

            $model->insert($data);

            return redirect()->to('tabeldosen')->with('success', 'Data Berhasil Ditambahkan!');
        }

        $data = [
            'id_dosen' => $id_dosen,
            'id_program' => $this->request->getPost('id_program'),
            'nidn' => $this->request->getPost('nidn'),
            'nama_dosen' => $this->request->getPost('nama_dosen'),
            'perguruan_tinggi' => $this->request->getPost('perguruan'),
            'email_dosen' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_hp'),
            'jabatan_fungsional' => $this->request->getPost('jabatan')
        ];



        // echo '<pre>';
        // print_r($data);



        $model->insert($data);
        return redirect()->to('tabeldosen')->with('success', 'Data Berhasil Ditambahkan!');

    }

    public function hapusdosen($id_dosen)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses anda ditolak');
        }

        $model = new DosenModel();
        if (!$id_dosen) {
            return redirect()->to('tabeldosen')->with('error', 'Program tidak ditemukan');
        }
        $model->delete($id_dosen);
        return redirect()->to('tabeldosen')->with('success', 'Program Berhasil dihapus');
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
