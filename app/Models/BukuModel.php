<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table      = 'buku';
    protected $primaryKey = 'id_buku';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'isbn', 'stok', 'halaman', 'kategori', 'sinopsis', 'gambar'];

    public function getBuku($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        // return
        //     $this->db->table('buku')
        //     ->join('kategori', 'buku.kategori=kategori.id_kategori')
        //     ->where("buku.slug='" . $slug . "'")
        //     ->get()->getResultArray();

        return $this->where(['slug' => $slug])->first();
    }

    public function getBukuDetail($id_buku)
    {
        return
            $this->db->table('buku')
            ->join('kategori', 'buku.kategori=kategori.id_kategori')
            ->where("buku.id_buku='" . $id_buku . "'")
            ->get()->getResultArray();
    }

    public function getBukuKategori()
    {
        return
            $this->db->table('buku')
            ->join('kategori', 'buku.kategori=kategori.id_kategori')
            ->get()->getResultArray();
    }

    public function search($keyword)
    {
        // $builder = $this->table('buku');
        // $builder->like('judul', $keyword);
        // return $builder;

        return $this->table('buku')->like('judul', $keyword)->orLike('penulis', $keyword);
    }
}
