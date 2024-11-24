<?php

namespace App\Controllers;

class DashController extends BaseController
{

    public function index(){

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

    public function tabeldosen(){
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }


        $data['title'] = "Tabel";
        $data['foreach'] = [

        ];
        
        
        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/tabeldosen');
        
    }

    
    public function suratmasuk(){
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $data['title'] = "Surat Masuk";

        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/suratmasuk');
    }
    public function suratkeluar(){
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $data['title'] = "Surat Keluar";

        echo view('admin/temp/l_header', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/suratkeluar');
    }



}