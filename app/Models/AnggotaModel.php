<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table      = 'anggota';
    protected $primaryKey = 'anggota_id';
    protected $allowedFields = [
        'anggota_id',
        'anggota_nama',
        'anggota_username',
        'anggota_jenis_kelamin',
        'anggota_tempat_lahir',
        'anggota_tanggal_lahir',
        'anggota_alamat',
        'anggota_nomor_identitas',
        'anggota_jenis_kartu',
        'anggota_foto',
        'users_id'
    ];

    // public function saveAnggota($data)
    // {
    //     return $this->db->table($this->table)->insert($data); //->query builder
    // }

    public function getAnggota($anggota_id = "")
    {
        if ($anggota_id == "") {
            return $this->findAll();
        } else {
            return $this->where(['anggota_id' => $anggota_id])->first();
        }
    }
}
