<?php

namespace App\Http\Controllers;

class TentangController extends Controller
{
    /**
     * Menampilkan halaman Tentang.
     */
    public function index()
    {
        return view('tentang');
    }
}