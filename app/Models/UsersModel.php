<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'member';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'username', 'email', 'nama', 'nik', 'jenis_kelamin', 'sekolah', 'kelas', 'tempat_lahir', 'tanggal_lahir', 'foto'];


    public function getBuku($id_buku = "")
    {
        if ($id_buku == "") {
            return $this->findAll();
        } else {
            return $this->where(['id_buku' => $id_buku])->first();
        }
    }
    public function saveBuku($data)
    {
        return $this->db->table($this->table)->insert($data);;
    }

    public function getBukuKategori()
    {
        return
            $this->db->table('buku')
            ->join('kategori', 'buku.kategori=kategori.id_kategori')
            ->get()->getResultArray();
    }

    public function getBukuKategoriDetail($id_buku)
    {
        return
            $this->db->table('buku')
            ->join('kategori', 'buku.kategori=kategori.id_kategori')
            ->where("buku.id_buku='" . $id_buku . "'")
            ->get()->getResultArray();
    }
}//end class