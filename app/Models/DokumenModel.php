<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $table = 'dokumen'; // Nama tabel dalam database
    protected $primaryKey = 'id_dokumen'; // Primary key
    protected $allowedFields = ['id_dokumen', 'nama_dokumen', 'kategori_dokumen', 'file', 'tanggal_upload', 'tanggal_update']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getdokumen()
    {
        return $this->findAll(); // Mengambil semua data kategori
    }

    public function getiddokumen()
    {

        $builder = $this->db->table($this->table);
        $builder->selectMax('id_dokumen');
        $query = $builder->get();
        $result = $query->getRow();
        $nextId = ($result->id_dokumen) ? $result->id_dokumen + 1 : 1;
        return $nextId;
    }

    
}
