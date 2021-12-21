<?php

namespace App\Controllers;

class Peminjaman extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'E-Perpustakaan'
        ];
        return view('pages/home', $data);
    }
}
