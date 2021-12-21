<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'E-Perpustakaan'
        ];
        return view('pages/home', $data);

        //return view('home');
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
