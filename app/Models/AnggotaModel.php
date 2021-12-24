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

    public function getAnggota($anggota_id = "")
    {
        if ($anggota_id == "") {
            return $this->findAll();
        } else {
            return $this->where(['anggota_id' => $anggota_id])->first();
        }
    }

    public function getAnggotaById($users_id)
    {
        return $this->db->table('anggota')->where(['users_id' => $users_id])->get()->getResultArray();
    }

    public function getAnggotaByIdAnggota($anggota_id)
    {
        return $this->db->table('anggota')->where(['anggota_id' => $anggota_id])->get()->getResultArray()[0];
    }

    public function createAnggotaProfil($user_id)
    {
        $data = [
            'anggota_id' => '',
            'anggota_nama' => 'Null',
            'users_id' => $user_id
        ];
        return $this->db->table('anggota')->insert($data);
    }

    public function updateAnggotaProfil($anggota_id, $data)
    {
        return $this->db->table('anggota')->where(['anggota_id' => $anggota_id])->update($data);
    }
}
