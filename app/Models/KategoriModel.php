<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['id_kategori', 'nama_kategori'];

    public function getKategori($id_kategori = "")
    {
        if ($id_kategori == "") {
            return $this->findAll();
        } else {
            return $this->where(['id_kategori' => $id_kategori])->first();
        }
    }
}
