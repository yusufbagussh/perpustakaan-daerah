<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'admin_id';
    protected $allowedFields = [
        'admin_id',
        'admin_nama',
        'admin_foto',
        'users_id'
    ];

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