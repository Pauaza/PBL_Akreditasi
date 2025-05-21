<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenatapanModel;
use Illuminate\Support\Str;
use App\Models\PenetapanModel;

class KriteriaAdminController extends Controller
{
    public function index()
    {
        return view('kriteria.kriteria_admin');
    }

    public function storePenetapan(Request $request)
    {
        // Validasi input
        $request->validate([
            'penetapan' => 'required|string',
            'link' => 'nullable|string',
            'pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        // Handle file upload
        $filePath = '';
        if ($request->hasFile('pendukung')) {
            $file = $request->file('pendukung');
            $fileName = time() . '_' . Str::random(255) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs( 'penetapan_kriteria1', $fileName, 'public');
        }

        // Simpan ke DB
        PenetapanModel::create([
            'penetapan' => $request->penetapan,
            'link' => $request->link,
            'pendukung' => $filePath,
            'id_kriteria' => 1
        ]);


        return redirect()->back()->with('success', 'Data Penetapan berhasil disimpan!');
    }

}
