<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use \Myth\Auth\Models\UserModel;

class Anggota extends BaseController
{

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
        $this->userModel = new UserModel();
    }

    public function listAnggota()
    {
        $data = [
            'anggota' =>  $this->anggotaModel->getBukuKategori(),
            'judul' => 'Daftar Buku Perpustakaan'
        ];

        return view('anggota/listbuku', $data);
    }

    public function detailAnggota($anggota_id)
    {
        $anggota = $this->anggotaModel->getBukuDetail($anggota_id);
        $data = [
            'anggota' =>  $anggota[0],
            'judul' => 'Daftar Buku Perpustakaan'
        ];

        //jika anggota tidak ada
        if (empty($data['anggota'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul anggota ' . $anggota_id . ' tidak ditemukan');
        };

        return view('anggota/detailbuku', $data);
    }

    public function tambahAnggota()
    {
        session();
        $data = [
            'judul' => 'Form Tambah Data Anggota',
            'validation' => \Config\Services::validation()
        ];

        return view('anggota/tambahanggota', $data);
    }

    public function simpanAnggota()
    {
        //validasi input
        if (!$this->validate([
            'anggota_nama' => [
                'rules' => 'required|is_unique[anggota.anggota_nama]',
                'errors' => [
                    'required' => '{field} nama anggota harus diisi',
                    'is_unique' => '{field} nama anggota sudah terdaftar'
                ]
            ],
            'anggota_foto' => [
                'rules' => 'max_size[anggota_foto, 1024]|is_image[anggota_foto]|mime_in[anggota_foto,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran anggota_foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukanlah gambar',
                    'mime_in' => 'Format gambar tidak sesuai'

                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/anggota/tambahanggota')->withInput();
        }

        // $slug = url_title($this->request->getVar('anggota_nama'), '-', true);

        $fileFoto = $this->request->getFile('anggota_foto');

        //apabila tidak ada anggota_foto yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            //generate anggota_nama sampul random
            $namaFoto = $fileFoto->getRandomName();
            //pindahkan anggota_foto ke folder img
            $fileFoto->move('img', $namaFoto);
        }

        $this->anggotaModel->save(
            [
                'anggota_nama' => $this->request->getVar('anggota_nama'),
                // 'slug' => $slug,
                'anggota_username' => $this->request->getVar('anggota_username'),
                'anggota_jenis_kelamin' => $this->request->getVar('anggota_jenis_kelamin'),
                'anggota_tempat_lahir' => $this->request->getVar('anggota_tempat_lahir'),
                'anggota_tanggal_lahir' => $this->request->getVar('anggota_tanggal_lahir'),
                'anggota_alamat' => $this->request->getVar('anggota_alamat'),
                'anggota_nomor_identitas' => $this->request->getVar('anggota_nomor_identitas'),
                'anggota_jenis_kartu' => $this->request->getVar('anggota_jenis_kartu'),
                'anggota_foto' => $namaFoto,
                'users_id' => $this->request->getVar('users_id')
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil dimasukkan.');

        return redirect()->to('/pages');
    }
}
