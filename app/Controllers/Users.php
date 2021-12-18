<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\UsersModel;

class Users extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->kategoriModel = new KategoriModel();
        $this->usersModel = new UsersModel();
    }

    public function index()
    {

        $currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        //$buku = $this->bukuModel->findAll();

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $users = $this->usersModel->search($keyword);
        } else {
            $users = $this->usersModel;
        }

        $data = [
            'judul' => 'Daftar Buku Perpustakaan',
            //'users' =>   $users->paginate(3, 'users'),
            'users' =>   $this->usersModel->getBukuKategori(),
            //'users' => $this->$users,
            'pager' => $this->usersModel->pager,
            'currentPage' => $currentPage

        ];

        return view('users/listbuku', $data);
    }

    public function detail($slug)
    {
        // $buku = $this->bukuModel->getBuku($slug);
        // $data['buku'] = $buku[0];
        // $data['judul'] = "Detail Buku";
        $data = [
            'judul' => 'Detail Buku',
            'buku' =>   $this->bukuModel->getBuku($slug)
        ];

        //jika buku tidak ada
        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul buku ' . $slug . ' tidak ditemukan');
        };

        return view('buku/detailbuku', $data);
    }

    public function tambah()
    {
        session();
        $kategori = $this->kategoriModel->getKategori();
        $data = [
            'judul' => 'Form Tambah Data Buku',
            'validation' => \Config\Services::validation(),
            'kategori' => $kategori
        ];

        return view('buku/tambahbuku', $data);
    }

    public function simpan()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah terdaftar'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar, 1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukanlah gambar',
                    'mime_in' => 'Format gambar tidak sesuai'

                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/buku/tambah')->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $fileGambar = $this->request->getFile('gambar');

        //apabila tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.png';
        } else {
            //generate nama sampul random
            $namaGambar = $fileGambar->getRandomName();
            //pindahkan gambar ke folder img
            $fileGambar->move('img', $namaGambar);
        }

        $this->bukuModel->save(
            [
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getVar('penulis'),
                'penerbit' => $this->request->getVar('penerbit'),
                'isbn' => $this->request->getVar('isbn'),
                'stok' => $this->request->getVar('stok'),
                'halaman' => $this->request->getVar('halaman'),
                'kategori' => $this->request->getVar('kategori'),
                'sinopsis' => $this->request->getVar('sinopsis'),
                'gambar' => $namaGambar
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil dimasukkan.');

        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        //jika ingin sekaligus menghapus gambar pada direktori

        //cari gamber berdasarkan id
        $buku = $this->bukuModel->find($id);

        //cek jika gambarnya default
        if ($buku['gambar'] != 'default.png') {
            //hapus gambar
            unlink('img/' . $buku['gambar']);
        }

        $this->bukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/buku');
    }

    public function ubah($slug)
    {
        session();
        // $kategori = $this->kategoriModel->getKategori();
        // $data = [
        //     'judul' => 'Form Ubah Data Buku',
        //     'validation' => \Config\Services::validation(),
        //     'buku' => $this->bukuModel->getBuku($slug),
        //     'kategori' => $kategori
        // ];
        $buku = $this->bukuModel->getBuku($slug);
        $kategori = $this->kategoriModel->getKategori();

        $data = [
            'buku' => $buku,
            'kategori' => $kategori,
            'validation' => \Config\Services::validation(),
            'judul' => "Form Ubah Data Buku"
        ];


        return view('buku/ubahbuku', $data);
    }

    public function update($id_buku)
    {
        $bukuLama = $this->bukuModel->getBuku($this->request->getVar('slug'));
        if ($bukuLama['judul'] ==  $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[buku.judul]';
        }
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah terdaftar'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar, 1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukanlah gambar',
                    'mime_in' => 'Format gambar tidak sesuai'

                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/buku/ubah/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
            return redirect()->to('/buku/ubah/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        //apabila tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            //generate nama sampul random
            $namaGambar = $fileGambar->getRandomName();
            //pindahkan gambar ke folder img
            $fileGambar->move('img', $namaGambar);
            //hapus file yg lama
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save(
            [
                'id_buku' => $id_buku,
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getVar('penulis'),
                'penerbit' => $this->request->getVar('penerbit'),
                'isbn' => $this->request->getVar('isbn'),
                'stok' => $this->request->getVar('stok'),
                'halaman' => $this->request->getVar('halaman'),
                'kategori' => $this->request->getVar('kategori'),
                'sinopsis' => $this->request->getVar('sinopsis'),
                'gambar' => $namaGambar
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/buku');
    }
}
