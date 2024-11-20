<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $table = 'program'; // Nama tabel dalam database
    protected $primaryKey = 'id_program'; // Primary key
    protected $allowedFields = ['id_program', 'nama_program', 'tahun_program']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getprogram()
    {
        return $this->orderBy('id_program', 'DESC')->findAll(); // Mengambil semua data kategori
    }

    public function getidprogram()
    {
        $builder = $this->db->table($this->table);
        $builder->selectMax('id_program');
        $query = $builder->get();
        $result = $query->getRow();
        $nextId = ($result->id_program) ? $result->id_program + 1 : 1;
        return $nextId;
    }

    public function getprogrambyid($id)
    {
        return $this->find($id);
    }

    public  function getnameprogram()
    {
        return $this->select('id_program, nama_program')->findAll();
    }

    public function getidbyprogram(string $namaProgram)
    {
        return $this->where('nama_program', $namaProgram)->first();
    }

    public function searchProgram($keyword)
    {
        return $this->like('nama_program', $keyword) // Cari berdasarkan nama_program
            ->orLike('tahun_program', $keyword) // Tambahkan kriteria lain (opsional)
            ->orderBy('id_program', 'DESC') // Urutkan data
            ->findAll();
    }
}
