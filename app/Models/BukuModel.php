<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table      = 'buku';
    protected $primaryKey = 'buku_id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'buku_id',
        'buku_slug',
        'buku_judul',
        'buku_penulis',
        'buku_penerbit',
        'buku_kategori_id',
        'buku_isbn',
        'buku_stok',
        'buku_halaman',
        'buku_gambar',
        'buku_sinopsis',
        'buku_created_at',
        'buku_updated_at'
    ];

    public function getBuku($buku_slug = false)
    {
        if ($buku_slug == false) {
            return $this->findAll();
        }

        // return
        //     $this->db->table('buku')
        //     ->join('kategori', 'buku.kategori=kategori.id_kategori')
        //     ->where("buku.buku_slug='" . $buku_slug . "'")
        //     ->get()->getResultArray();

        return $this->where(['buku_slug' => $buku_slug])->first();
    }

    public function getBukuDetail($buku_id)
    {
        return
            $this->db->table('buku')
            ->join('kategori', 'buku.buku_kategori_id=kategori.kategori_id')
            ->where("buku.buku_id='" . $buku_id . "'")
            ->get()->getResultArray();
    }

    public function getBukuKategori()
    {
        return
            $this->db->table('buku')
            ->join('kategori', 'buku.buku_kategori_id=kategori.kategori_id')
            ->get()->getResultArray();
    }

    public function search($keyword)
    {
        // $builder = $this->table('buku');
        // $builder->like('judul', $keyword);
        // return $builder;

        return $this->table('buku')->like('buku_judul', $keyword)->orLike('buku_penulis', $keyword);
    }
}
