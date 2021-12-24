<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Pages extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'auth']);
        $this->anggotaModel = new AnggotaModel();
    }
    public function index()
    {
        if (in_groups('member')) {
            if (empty($this->anggotaModel->getAnggotaById(user_id()))) {
                session();
                $data = [
                    'judul' => 'E-Perpustakaan',
                    'validation' => \Config\Services::validation()
                ];
                return view('anggota/Registrasi', $data);
            }
            $data = [
                'judul' => 'E-Perpustakaan',
            ];
            return view('pages/home', $data);
        } else if (in_groups('admin')) { {
                return redirect()->to('/admin');
            }
        } else if (in_groups('superadmin')) {
            return redirect()->to('/admin');
        }
    }

    public function about()
    {
        $data = [
            'judul' => 'About Me'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'judul' => 'Contact Me',
            'staff' => [
                [
                    'nama' => 'Yusuf Bagus Sungging Herlambang',
                    'nim'  => 'V3420077',
                    'instansi' => 'Universitas Sebelas Surakarta'
                ],
                [
                    'nama' => 'Sinta Athaya Ramadhani',
                    'nim'  => 'V3420071',
                    'instansi' => 'Universitas Sebelas Surakarta'
                ],
                [
                    'nama' => 'Saka Pangestu Putra',
                    'nim'  => 'V3420080',
                    'instansi' => 'Universitas Sebelas Surakarta'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
