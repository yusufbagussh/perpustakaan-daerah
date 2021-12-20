<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\AnggotaModel;
use \Myth\Auth\Models\UserModel;

class Anggota extends BaseController
{

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->anggotaModel = new AnggotaModel();
        $this->userModel = new UserModel();
    }

    public function listKategori()
    {
        $data = [
            'kategori' =>  $this->kategoriModel->findAll(),
            'judul' => 'Daftar Kategori Buku'
        ];

        return view('kategori/listkategori', $data);
    }

    public function tambahKategori()
    {
        session();
        $data = [
            'judul' => 'Form Tambah Kategori',
            'validation' => \Config\Services::validation()
        ];

        return view('kategori/tambahkategori', $data);
    }

    public function simpanKategori()
    {
        //validasi input
        if (!$this->validate([
            'id_kategori' => [
                'rules' => 'required|is_unique[kategori.id_kategori]',
                'errors' => [
                    'required' => '{field} id kategori harus diisi',
                    'is_unique' => '{field} id kategori sudah terdaftar'
                ]
            ],
            'nama_kategori' => [
                'rules' => 'required|is_unique[kategori.nama_kategori]',
                'errors' => [
                    'required' => '{field} nama kategori harus diisi'
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/kategori/tambahkategori')->withInput();
        }

        $this->kategoriModel->save(
            [
                'id_kategori' => $this->request->getVar('id_kategori'),
                'nama_kategori' => $this->request->getVar('nama_kategori')
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil dimasukkan.');

        return redirect()->to('/kategori');
    }

    public function ubahKategori($id_kategori)
    {
        session();

        $kategori = $this->kategoriModel->find($id_kategori);
        //$kategori = $this->kategoriModel->getKategori();
        if (empty($kategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Anggota Tidak ditemukan !');
        }
        $data = [
            'anggota' => $kategori,
            //'kategori' => $kategori,
            'validation' => \Config\Services::validation(),
            'judul' => "Form Ubah Data Kategori"
        ];


        return view('kategori/ubahkategori', $data);
    }

    public function updateKategori($id_kategori)
    {
        if (!$this->validate([
            'id_kategori' => [
                'rules' => 'required|is_unique[kategori.id_kategori]',
                'errors' => [
                    'required' => '{field} id kategori harus diisi',
                    'is_unique' => '{field} id kategori sudah terdaftar'
                ]
            ],
            'nama_kategori' => [
                'rules' => 'required|is_unique[kategori.nama_kategori]',
                'errors' => [
                    'required' => '{field} nama kategori harus diisi'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/anggota/ubah/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
            return redirect()->to('/kategori/ubahkategori/' . $this->request->getVar('id_kategori'))->withInput();
        }

        //$slug = url_title($this->request->getVar('anggota_nama'), '-', true);
        $this->kategoriModel->save(
            [
                'id_kategori' => $id_kategori,
                'nama_kategori' => $this->request->getVar('nama_kategori')
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/kategori');
    }
}
