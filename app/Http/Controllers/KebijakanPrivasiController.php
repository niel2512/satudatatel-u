<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KebijakanPrivasiController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        // Data kontak — mudah diubah tanpa menyentuh view
        $kontak = [
            'email'   => 'info@telkomuniversity.ac.id',
            'telepon' => '(022) 7566456',
            'alamat'  => 'Jl. Djuanda (Ir. H. Djuanda St.), Kota Bandung, Jawa Barat Indonesia 40257, Bandung, Indonesia',
        ];

        $lastUpdated = 'Maret 2026';

        return view('kebijakan-privasi.index', compact('kontak', 'lastUpdated'));
    }
}
