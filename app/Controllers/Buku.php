<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->kategoriModel = new KategoriModel();
    }


    public function index()
    {

        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        //$buku = $this->bukuModel->findAll();

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->bukuModel->search($keyword);
        } else {
            $orang = $this->bukuModel;
        }

        $data = [
            'judul' => 'Daftar Buku Perpustakaan',
            //'buku' =>   $orang->paginate(3, 'buku'),
            'buku' =>   $this->bukuModel->getBukuKategori(),
            //'buku' => $this->$orang,
            'pager' => $this->bukuModel->pager,
            'currentPage' => $currentPage

        ];

        return view('buku/listbuku', $data);
    }

    public function detail($buku_slug)
    {
        // $buku = $this->bukuModel->getBuku($buku_slug);
        // $data['buku'] = $buku[0];
        // $data['judul'] = "Detail Buku";
        // $buku = $this->bukuModel->getBukuDetail()
        $data = [
            'judul' => 'Detail Buku',
            'buku'  =>  $this->bukuModel->getBukuDetail($buku_slug),
        ];

        //jika buku tidak ada
        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul buku ' . $buku_slug . ' tidak ditemukan');
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
            'buku_judul' => [
                'rules' => 'required|is_unique[buku.buku_judul]',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    // 'is_unique' => '{field} buku sudah terdaftar'
                ]
            ],
            'buku_gambar' => [
                'rules' => 'max_size[buku_gambar, 1024]|is_image[buku_gambar]|mime_in[buku_gambar,image/jpg,image/png,image/jpeg]',
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

        $buku_slug = url_title($this->request->getVar('buku_judul'), '-', true);

        $fileGambar = $this->request->getFile('buku_gambar');

        //apabila tidak ada buku_gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.png';
        } else {
            //generate nama sampul random
            $namaGambar = $fileGambar->getRandomName();
            //pindahkan buku_gambar ke folder img/buku
            $fileGambar->move('img/buku', $namaGambar);
        }

        $this->bukuModel->save(
            [
                'buku_judul' => $this->request->getVar('buku_judul'),
                'buku_slug' => $buku_slug,
                'buku_penulis' => $this->request->getVar('buku_penulis'),
                'buku_penerbit' => $this->request->getVar('buku_penerbit'),
                'buku_isbn' => $this->request->getVar('buku_isbn'),
                'buku_stok' => $this->request->getVar('buku_stok'),
                'buku_halaman' => $this->request->getVar('buku_halaman'),
                'buku_kategori_id' => $this->request->getVar('buku_kategori'),
                'buku_sinopsis' => $this->request->getVar('buku_sinopsis'),
                'buku_gambar' => $namaGambar
            ]
        );

        session()->setFlashdata('tambah', 'Data berhasil dimasukkan.');

        return redirect()->to('/buku');
    }

    public function delete($buku_id)
    {
        //jika ingin sekaligus menghapus gambar pada direktori

        //cari gamber berdasarkan buku_id
        $buku = $this->bukuModel->find($buku_id);

        //cek jika gambarnya default
        if ($buku['buku_gambar'] != 'default.png') {
            //hapus buku_gambar
            unlink('img/buku/' . $buku['buku_gambar']);
        }

        $this->bukuModel->delete($buku_id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');
        return redirect()->to('/buku');
    }

    public function ubah($buku_slug)
    {
        session();
        // $kategori = $this->kategoriModel->getKategori();
        // $data = [
        //     'judul' => 'Form Ubah Data Buku',
        //     'validation' => \Config\Services::validation(),
        //     'buku' => $this->bukuModel->getBuku($buku_slug),
        //     'kategori' => $kategori
        // ];
        $buku = $this->bukuModel->getBuku($buku_slug);
        $kategori = $this->kategoriModel->getKategori();

        $data = [
            'buku' => $buku,
            'kategori' => $kategori,
            'validation' => \Config\Services::validation(),
            'judul' => "Form Ubah Data Buku"
        ];


        return view('buku/ubahbuku', $data);
    }

    public function update($buku_id)
    {
        $bukuLama = $this->bukuModel->getBuku($this->request->getVar('buku_slug'));
        if ($bukuLama['buku_judul'] ==  $this->request->getVar('buku_judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[buku.buku_judul]';
        }
        //validasi input
        if (!$this->validate([
            'buku_judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    // 'is_unique' => '{field} buku sudah terdaftar'
                ]
            ],
            'buku_gambar' => [
                'rules' => 'max_size[buku_gambar, 1024]|is_image[buku_gambar]|mime_in[buku_gambar,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran buku_gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukanlah buku_gambar',
                    'mime_in' => 'Format buku_gambar tidak sesuai'

                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/buku/ubah/' . $this->request->getVar('buku_slug'))->withInput()->with('validation', $validation);
            return redirect()->to('/buku/ubah/' . $this->request->getVar('buku_slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('buku_gambar');

        //apabila tidak ada buku_gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            //generate nama sampul random
            $namaGambar = $fileGambar->getRandomName();
            //pindahkan buku_gambar ke folder img
            $fileGambar->move('img/buku', $namaGambar);
            //hapus file yg lama
            unlink('img/buku/' . $this->request->getVar('gambarLama'));
        }

        $buku_slug = url_title($this->request->getVar('buku_judul'), '-', true);
        $this->bukuModel->save(
            [
                'buku_id' => $buku_id,
                'buku_judul' => $this->request->getVar('buku_judul'),
                'buku_slug' => $buku_slug,
                'buku_penulis' => $this->request->getVar('buku_penulis'),
                'buku_penerbit' => $this->request->getVar('buku_penerbit'),
                'buku_isbn' => $this->request->getVar('buku_isbn'),
                'buku_stok' => $this->request->getVar('stok'),
                'buku_halaman' => $this->request->getVar('buku_halaman'),
                'buku_kategori_id' => $this->request->getVar('buku_kategori'),
                'buku_sinopsis' => $this->request->getVar('buku_sinopsis'),
                'buku_gambar' => $namaGambar
            ]
        );

        session()->setFlashdata('tambah', 'Data berhasil diubah.');

        return redirect()->to('/buku');
    }

    public function listbukuanggota()
    {
        $data = [
            'judul' => 'Daftar Buku Perpustakaan',
            'buku' =>   $this->bukuModel->getBukuKategori(),
        ];

        return view('buku/listbukuanggota', $data);
    }

    public function detailbukuanggota($buku_slug)
    {
        $data = [
            'judul' => 'Detail Buku',
            'buku'  =>  $this->bukuModel->getBukuDetail($buku_slug),
        ];

        //jika buku tidak ada
        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul buku ' . $buku_slug . ' tidak ditemukan');
        };

        return view('buku/detailbukuanggota', $data);
    }
}
