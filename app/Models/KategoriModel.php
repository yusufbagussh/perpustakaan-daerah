<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'kategori_id';
    protected $allowedFields = ['kategori_id', 'kategori_nama'];

    public function getKategori($id_kategori = "")
    {
        if ($id_kategori == "") {
            return $this->findAll();
        } else {
            return $this->where(['kategori_id' => $id_kategori])->first();
        }
    }
}
