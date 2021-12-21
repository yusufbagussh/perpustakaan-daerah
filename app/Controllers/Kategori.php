<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\AnggotaModel;
use \Myth\Auth\Models\UserModel;

class Kategori extends BaseController
{

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->anggotaModel = new AnggotaModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'kategori' =>  $this->kategoriModel->findAll(),
            'judul' => 'Daftar Kategori Buku'
        ];

        return view('kategori/listkategori', $data);
    }

    public function tambahkategori()
    {
        session();
        $data = [
            'judul' => 'Form Tambah Kategori',
            'validation' => \Config\Services::validation()
        ];

        return view('kategori/tambahkategori', $data);
    }

    public function simpankategori()
    {
        //validasi input
        if (!$this->validate([
            'kategori_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} admin harus diisi'
                ]
            ],
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/kategori/tambahkategori')->withInput();
        }

        $this->kategoriModel->save(
            [
                'kategori_nama' => $this->request->getVar('kategori_nama')
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil dimasukkan.');

        return redirect()->to('/kategori');
    }

    public function hapusKategori($kategori_id)
    {
        $this->kategoriModel->delete($kategori_id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/kategori');
    }

    public function ubahKategori($kategori_id)
    {
        session();

        $kategori = $this->kategoriModel->getKategori($kategori_id);
        //$kategori = $this->kategoriModel->getKategori();
        if (empty($kategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Anggota Tidak ditemukan !');
        }
        $data = [
            'kategori' => $kategori,
            'validation' => \Config\Services::validation(),
            'judul' => "Form Ubah Data Kategori"
        ];


        return view('kategori/ubahkategori', $data);
    }

    public function updateKategori($kategori_id)
    {
        if (!$this->validate([
            'kategori_id' => [
                'rules' => 'required|is_unique[kategori.kategori_id]',
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
            return redirect()->to('/kategori/ubahkategori/' . $this->request->getVar('kategori_id'))->withInput();
        }

        //$slug = url_title($this->request->getVar('anggota_nama'), '-', true);
        $this->kategoriModel->save(
            [
                'kategori_id' => $kategori_id,
                'nama_kategori' => $this->request->getVar('nama_kategori')
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/kategori');
    }
}
