<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->bukuModel = new BukuModel();
        $this->kategoriModel = new KategoriModel();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Daftar Admin Perpustakaan',
            'admin' => $this->adminModel->findAll()
        ];

        return view('admin/listadmin', $data);
    }

    public function profil()
    {
        $data = [
            'judul' => 'Daftar Admin Perpustakaan',
            'admin' => $this->adminModel->getAdminById(user_id()),
        ];

        return view('admin/profil', $data);
    }

    public function tambahAdmin()
    {
        session();
        $data = [
            'judul' => 'Form Tambah Admin',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/tambahadmin', $data);
    }

    public function simpanAdmin()
    {
        //validasi input
        if (!$this->validate([
            'admin_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} admin harus diisi'
                ]
            ],
            'admin_foto' => [
                'rules' => 'max_size[admin_foto, 1024]|is_image[admin_foto]|mime_in[admin_foto,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukanlah foto',
                    'mime_in' => 'Format foto tidak sesuai'

                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/admin/tambahadmin')->withInput();
        }

        $fileFoto = $this->request->getFile('admin_foto');

        //apabila tidak ada admin_foto yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            //generate nama sampul random
            $namaFoto = $fileFoto->getRandomName();
            //pindahkan admin_foto ke folder img/profile
            $fileFoto->move('img/profile', $namaFoto);
        }

        $this->adminModel->save(
            [
                'admin_nama' => $this->request->getVar('admin_nama'),
                'users_id' => $this->request->getVar('users_id'),
                'admin_foto' => $namaFoto
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil dimasukkan.');

        return redirect()->to('/admin');
    }

    public function hapusAdmin($admin_id)
    {
        //jika ingin sekaligus menghapus admin_foto pada direktori

        //cari gamber berdasarkan admin_id
        $admin = $this->adminModel->find($admin_id);

        //cek jika gambarnya default
        if ($admin['admin_foto'] != 'default.png') {
            //hapus admin_foto
            unlink('img/profile/' . $admin['admin_foto']);
        }

        $this->adminModel->delete($admin_id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin');
    }

    public function ubahAdmin($admin_id)
    {
        session();
        $admin = $this->adminModel->getAdmin($admin_id);


        $data = [
            'admin' => $admin,
            'validation' => \Config\Services::validation(),
            'judul' => "Form Ubah Data Admin"
        ];


        return view('admin/ubahadmin', $data);
    }

    public function updateAdmin($admin_id)
    {
        //validasi input
        if (!$this->validate([
            'admin_nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} admin harus diisi'
                ]
            ],
            'admin_foto' => [
                'rules' => 'max_size[admin_foto, 1024]|is_image[admin_foto]|mime_in[admin_foto,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukanlah foto',
                    'mime_in' => 'Format foto tidak sesuai'

                ]
            ]
        ])) {
            return redirect()->to('/admin/ubahadmin/' . $this->request->getVar('admin_id'))->withInput();
        }

        $fileFoto = $this->request->getFile('admin_foto');

        //apabila tidak ada admin_foto yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            //generate nama sampul random
            $namaFoto = $fileFoto->getRandomName();
            //pindahkan admin_foto ke folder img/profile
            $fileFoto->move('img/profile', $namaFoto);
            //hapus file yg lama
            unlink('img/profile/' . $this->request->getVar('fotoLama'));
        }

        $this->adminModel->save(
            [
                'admin_id' => $admin_id,
                'admin_nama' => $this->request->getVar('admin_nama'),
                'users_id' => $this->request->getVar('users_id'),
                'admin_foto' => $namaFoto
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin');
    }
}
