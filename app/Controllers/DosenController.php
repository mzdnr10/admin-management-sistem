<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\ProgramModel;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

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

    public function editDosen($id_dosen)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak!');
        }

        $model = new DosenModel();
        $modelprogram = new ProgramModel();

        // Ambil data dosen berdasarkan ID dosen
        $dosen = $model->find($id_dosen);
        if (!$dosen) {
            // Jika data dosen tidak ditemukan, redirect dengan pesan error
            return redirect()->to('tabeldosen')->with('error', 'Dosen Tidak Ditemukan!');
        }

        // Ambil data program untuk dropdown
        $nama_program = $modelprogram->findAll();

        // Kirim data dosen dan program ke view
        $data = [
            'title' => "Edit Dosen",
            'id_dosen' => $dosen['id_dosen'],
            'nidn' => $dosen['nidn'],
            'nama_dosen' => $dosen['nama_dosen'],
            'perguruan' => $dosen['perguruan_tinggi'],
            'email' => $dosen['email_dosen'],
            'no_hp' => $dosen['no_telp'],
            'jabatan' => $dosen['jabatan_fungsional'],
            'nama_program' => $nama_program,
        ];
        // echo ('<pre>');
        // print_r ($data);
        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/temp/form/edit_dosen_form.php', $data);
    }


    public function doeditdosen()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $model = new DosenModel();
        $modelprogram = new ProgramModel();
        $id_dosen = $this->request->getPost('id_dosen');
        $id_program = $this->request->getPost('id_program');
        $programname = $this->request->getPost('nama_program');
        $tahun_program = $this->request->getPost('tahun_program');
        $nidn = $this->request->getPost('nidn');
        $nama_dosen = $this->request->getPost('nama_dosen');
        $perguruan_tinggi = $this->request->getPost('perguruan');
        $email_dosen = $this->request->getPost('email');
        $no_telp = $this->request->getPost('no_hp');
        $jabatan_fungsional = $this->request->getPost('jabatan');

        // Cek jika ID program adalah 'new', artinya kita perlu menambah program baru
        if ($id_program === 'new') {
            if (empty($programname)) {
                return redirect()->back()->with('error', 'Nama Program Tidak Boleh Kosong!');
            }

            // Cek apakah program sudah ada
            $cekprogram = $modelprogram->getidbyprogram($programname);
            if (!$cekprogram) {
                // Jika program belum ada, buat program baru
                $getid = $modelprogram->getidprogram(); // Ambil ID program terbaru
                $dataprogram = [
                    'id_program' => $getid,
                    'nama_program' => $programname,
                    'tahun_program' => $tahun_program
                ];
                $modelprogram->insert($dataprogram);
            } else {
                $getid = $cekprogram['id_program'];
            }

            // Update data dosen
            $data = [
                'id_program' => $getid,
                'nidn' => $nidn,
                'nama_dosen' => $nama_dosen,
                'perguruan_tinggi' => $perguruan_tinggi,
                'email_dosen' => $email_dosen,
                'no_telp' => $no_telp,
                'jabatan_fungsional' => $jabatan_fungsional
            ];
            $model->update($id_dosen, $data);

            return redirect()->to('tabeldosen')->with('success', 'Data Dosen Berhasil Diperbarui!');
        }

        // Update data dosen dengan id_program yang sudah ada
        $data = [
            'id_program' => $id_program,
            'nidn' => $nidn,
            'nama_dosen' => $nama_dosen,
            'perguruan_tinggi' => $perguruan_tinggi,
            'email_dosen' => $email_dosen,
            'no_telp' => $no_telp,
            'jabatan_fungsional' => $jabatan_fungsional
        ];

        // Update data dosen
        $model->update($id_dosen, $data);

        return redirect()->to('tabeldosen')->with('success', 'Data Dosen Berhasil Diperbarui!');
    }


    public function importForm()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses anda ditolak');
        }

        return view('admin/temp/form/import_dosen');
    }

    public function importexcel()
    {
        $dosenModel = new DosenModel();
        $programModel = new ProgramModel();

        // Cek apakah file sudah diunggah
        $file = $this->request->getFile('file_import');
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak valid.');
        }

        // Baca file Excel
        $reader = new Xlsx;
        $spreadsheet = $reader->load($file->getTempName());
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // Proses setiap baris (mulai dari baris kedua, karena baris pertama biasanya header)
        foreach ($sheetData as $index => $row) {
            if ($index == 1) continue; // Lewati header

            $nama_program = $row['B']; // Kolom nama program
            $nidn = $row['C'];
            $nama_dosen = $row['D'];
            $perguruan_tinggi = $row['E'];
            $email_dosen = $row['F'];
            $no_telp = $row['G'];
            $jabatan_fungsional = $row['H'];

            // Cek apakah program sudah ada
            $program = $programModel->where('nama_program', $nama_program)->first();

            if ($program) {
                $id_program = $program['id_program'];
            } else {
                // Jika tidak ada, buat program baru
                $newProgramData = [
                    'nama_program' => $nama_program,
                    'tahun_program' => date('Y-m-d'), // Default tahun
                ];
                $id_program = $programModel->insert($newProgramData);
            }

            // Siapkan data untuk tabel dosen
            $dosenData = [
                'id_program' => $id_program,
                'nidn' => $nidn,
                'nama_dosen' => $nama_dosen,
                'perguruan_tinggi' => $perguruan_tinggi,
                'email_dosen' => $email_dosen,
                'no_telp' => $no_telp,
                'jabatan_fungsional' => $jabatan_fungsional,
            ];

            // Simpan ke tabel dosen
            $dosenModel->insert($dosenData);
        }

        return redirect()->to('tabeldosen')->with('success', 'Data berhasil diimport!');
    }

    public function searchdosen()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses anda ditolak');
        }

        $data['title'] = "Search Dosen";

        $keyword = $this->request->getGet('keyword'); // Ambil kata kunci dari form
        $model = new DosenModel();

        if ($keyword) {
            // Pencarian data berdasarkan keyword
            $data['foreach'] = $model->searchdosen($keyword);
        } else {
            // Jika tidak ada keyword, tampilkan semua data
            $data['programs'] = $model->findAll();
        }

        $data['keyword'] = $keyword; // Simpan keyword untuk ditampilkan kembali
        
        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar', $data);
        echo view('admin/tabeldosen', $data); // Tampilkan tabel dengan hasil pencarian

        // echo ('<pre>');
        // print_r($data);

    }
}
