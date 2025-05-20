<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function show($id)
    {
        $pdfs = [
            1 => 'https://media.neliti.com/media/publications/249244-none-837c3dfb.pdf',
            // tambahkan sesuai kebutuhan
        ];

        $pdfUrl = $pdfs[$id] ?? '#';
        return view('kriteria', compact('id', 'pdfUrl'));
    }
}
