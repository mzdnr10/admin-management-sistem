<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table = 'user'; // Nama tabel di database
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'email_user', 'username', 'password', 'role_id']; // Kolom yang diizinkan untuk diakses

    public function validateUser($username, $password)
    {
        // Cari user berdasarkan username dan password tanpa hash
        return $this->where('username', $username)
            ->where('password', $password) // Bandingkan password secara langsung
            ->first(); // Ambil user pertama yang ditemukan
    }

    public function getiduser()
    {
        $builder = $this->db->table($this->table);
        $builder->selectMax('id_user');
        $query = $builder->get();
        $result = $query->getRow();
        $nextId = ($result->id_user) ? $result->id_user + 1 : 1;
        return $nextId;
    }

    public function getadmin()
    {
        return $this->findAll();
    }

}
