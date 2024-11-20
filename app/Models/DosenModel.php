<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Comment;

class DosenModel extends Model
{
    protected $table = 'dosen'; // Nama tabel dalam database
    protected $primaryKey = 'id_dosen'; // Primary key
    protected $allowedFields = ['id_dosen', 'id_program', 'nidn', 'nama_dosen', 'perguruan_tinggi', 'email_dosen', 'no_telp', 'jabatan_fungsional']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getdosen()
    {
        return $this->findAll(); // Mengambil semua data kategori
    }

    public function getiddosen()
    {

        $builder = $this->db->table($this->table);
        $builder->selectMax('id_dosen');
        $query = $builder->get();
        $result = $query->getRow();
        $nextId = ($result->id_dosen) ? $result->id_dosen + 1 : 1;
        return $nextId;
    }

    public function getdosenbyid($id)
    {
        return $this->find($id);
    }

    public function getprogrambydosen()
    {

        $builder = $this->db->table($this->table);
        $builder->select('dosen.*, program.nama_program');
        $builder->join('program', 'program.id_program = dosen.id_program');
        $builder->orderBy('dosen.id_dosen', 'DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function searchdosen($keyword)
    {
        return $this->select('dosen.*, program.nama_program') // Pilih kolom dari tabel dosen dan nama_program
            ->join('program', 'dosen.id_program = program.id_program', 'left') // Join tabel program dengan tabel dosen
            ->groupStart() // Mulai grup kondisi pencarian
            ->like('nidn', $keyword)
            ->orLike('nama_program', $keyword)
            ->orLike('nama_dosen', $keyword)
            ->orLike('perguruan_tinggi', $keyword)
            ->orLike('email_dosen', $keyword)
            ->orLike('no_telp', $keyword)
            ->orLike('jabatan_fungsional', $keyword)
            ->groupEnd() // Akhiri grup kondisi pencarian
            ->orderBy('dosen.id_program', 'DESC') // Urutkan data berdasarkan id_program
            ->findAll(); // Ambil semua hasil
    }
}
