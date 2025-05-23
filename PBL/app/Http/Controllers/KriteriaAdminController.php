<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelaksanaanModel;
use App\Models\PenetapanModel;
use App\Models\PengendalianModel;
use App\Models\EvaluasiModel;
use App\Models\PeningkatanModel;
use App\Models\DetailKriteriaModel;
use Illuminate\Support\Str;

class KriteriaAdminController extends Controller
{
    public function index()
    {
        return view('kriteria.admin.kriteria1.index');
    }

    public function create()
    {
        return view('kriteria.admin.kriteria1.create');
    }

    // PENETAPAN
    public function storePenetapan(Request $request)
    {
        $request->validate([
            'id_detail_kriteria' => 'required|integer|exists:m_detail_kriteria,id_detail_kriteria',
            'penetapan' => 'required|string',
            'link' => 'nullable|string',
            'pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $filePath = '';
        if ($request->hasFile('pendukung')) {
            $file = $request->file('pendukung');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('penetapan_kriteria1', $fileName, 'public');
        }

        PenetapanModel::create([
            'id_detail_kriteria' => $request->id_detail_kriteria,
            'penetapan' => $request->penetapan,
            'link' => $request->link,
            'pendukung' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data Penetapan berhasil disimpan!');
    }

    // PELAKSANAAN
    public function storePelaksanaan(Request $request)
    {
        $request->validate([
            'id_detail_kriteria' => 'required|integer|exists:m_detail_kriteria,id_detail_kriteria',
            'pelaksanaan' => 'required|string',
            'link' => 'nullable|string',
            'pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $filePath = '';
        if ($request->hasFile('pendukung')) {
            $file = $request->file('pendukung');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('pelaksanaan_kriteria1', $fileName, 'public');
        }

        PelaksanaanModel::create([
            'id_detail_kriteria' => $request->id_detail_kriteria,
            'pelaksanaan' => $request->pelaksanaan,
            'link' => $request->link,
            'pendukung' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data Pelaksanaan berhasil disimpan!');
    }

    // EVALUASI
    public function storeEvaluasi(Request $request)
    {
        $request->validate([
            'id_detail_kriteria' => 'required|integer|exists:m_detail_kriteria,id_detail_kriteria',
            'evaluasi' => 'required|string',
            'link' => 'nullable|string',
            'pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $filePath = '';
        if ($request->hasFile('pendukung')) {
            $file = $request->file('pendukung');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('evaluasi_kriteria1', $fileName, 'public');
        }

        EvaluasiModel::create([
            'id_detail_kriteria' => $request->id_detail_kriteria,
            'evaluasi' => $request->evaluasi,
            'link' => $request->link,
            'pendukung' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data Evaluasi berhasil disimpan!');
    }

    // PENGENDALIAN
    public function storePengendalian(Request $request)
    {
        $request->validate([
            'id_detail_kriteria' => 'required|integer|exists:m_detail_kriteria,id_detail_kriteria',
            'pengendalian' => 'required|string',
            'link' => 'nullable|string',
            'pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $filePath = '';
        if ($request->hasFile('pendukung')) {
            $file = $request->file('pendukung');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('pengendalian_kriteria1', $fileName, 'public');
        }

        PengendalianModel::create([
            'id_detail_kriteria' => $request->id_detail_kriteria,
            'pengendalian' => $request->pengendalian,
            'link' => $request->link,
            'pendukung' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data Pengendalian berhasil disimpan!');
    }

    // PENINGKATAN
    public function storePeningkatan(Request $request)
    {
        $request->validate([
            'id_detail_kriteria' => 'required|integer|exists:m_detail_kriteria,id_detail_kriteria',
            'peningkatan' => 'required|string',
            'link' => 'nullable|string',
            'pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $filePath = '';
        if ($request->hasFile('pendukung')) {
            $file = $request->file('pendukung');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('peningkatan_kriteria1', $fileName, 'public');
        }

        PeningkatanModel::create([
            'id_detail_kriteria' => $request->id_detail_kriteria,
            'peningkatan' => $request->peningkatan,
            'link' => $request->link,
            'pendukung' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data Peningkatan berhasil disimpan!');
    }

    // Fungsi submit/edit/save berdasarkan id_detail_kriteria
public function submitKriteria(Request $request)
{
    $action = $request->input('action'); // 'save' atau 'submit'
    $userId = auth()->user()->id ?? null;

    if (!$userId) {
        return redirect()->back()->with('error', 'User tidak ditemukan');
    }

    // Simpan/update status di m_detail_kriteria
    $detail = DetailKriteriaModel::firstOrNew([
        'id_kriteria' => 1,
        'id_user' => $userId,
    ]);

    $detail->status_selesai = ($action === 'submit') ? DetailKriteriaModel::STATUS_SUBMIT : DetailKriteriaModel::STATUS_SAVE;
    $detail->save();

    $idDetail = $detail->id_detail_kriteria;

    // Bagian 1: Penetapan
    $deskripsi1 = $request->input('description1');
    $link1 = $request->input('link1');
    $file1 = $request->file('pendukung1');

    if ($deskripsi1 || $link1 || $file1) {
        $filePath1 = null;
        if ($file1) {
            $fileName1 = time() . '_' . Str::random(10) . '.' . $file1->getClientOriginalExtension();
            $filePath1 = $file1->storeAs('penetapan_kriteria1', $fileName1, 'public');
            session()->flash('pendukung1', $filePath1); // Simpan path untuk preview
        }

        PenetapanModel::create([
            'id_detail_kriteria' => $idDetail,
            'penetapan' => $deskripsi1,
            'link' => $link1,
            'pendukung' => $filePath1,
        ]);
    }

    // Bagian 2: Pelaksanaan
    $deskripsi2 = $request->input('description2');
    $link2 = $request->input('link2');
    $file2 = $request->file('pendukung2');

    if ($deskripsi2 || $link2 || $file2) {
        $filePath2 = null;
        if ($file2) {
            $fileName2 = time() . '_' . Str::random(10) . '.' . $file2->getClientOriginalExtension();
            $filePath2 = $file2->storeAs('pelaksanaan_kriteria1', $fileName2, 'public');
            session()->flash('pendukung2', $filePath2); // Simpan path untuk preview
        }

        PelaksanaanModel::create([
            'id_detail_kriteria' => $idDetail,
            'pelaksanaan' => $deskripsi2,
            'link' => $link2,
            'pendukung' => $filePath2,
        ]);
    }

    // Bagian 3: Evaluasi
    $deskripsi3 = $request->input('description3');
    $link3 = $request->input('link3');
    $file3 = $request->file('pendukung3');

    if ($deskripsi3 || $link3 || $file3) {
        $filePath3 = null;
        if ($file3) {
            $fileName3 = time() . '_' . Str::random(10) . '.' . $file3->getClientOriginalExtension();
            $filePath3 = $file3->storeAs('evaluasi_kriteria1', $fileName3, 'public');
            session()->flash('pendukung3', $filePath3); // Simpan path untuk preview
        }

        EvaluasiModel::create([
            'id_detail_kriteria' => $idDetail,
            'evaluasi' => $deskripsi3,
            'link' => $link3,
            'pendukung' => $filePath3,
        ]);
    }

    // Bagian 4: Pengendalian
    $deskripsi4 = $request->input('description4');
    $link4 = $request->input('link4');
    $file4 = $request->file('pendukung4');

    if ($deskripsi4 || $link4 || $file4) {
        $filePath4 = null;
        if ($file4) {
            $fileName4 = time() . '_' . Str::random(10) . '.' . $file4->getClientOriginalExtension();
            $filePath4 = $file4->storeAs('pengendalian_kriteria1', $fileName4, 'public');
            session()->flash('pendukung4', $filePath4); // Simpan path untuk preview
        }

        PengendalianModel::create([
            'id_detail_kriteria' => $idDetail,
            'pengendalian' => $deskripsi4,
            'link' => $link4,
            'pendukung' => $filePath4,
        ]);
    }

    // Bagian 5: Peningkatan
    $deskripsi5 = $request->input('description5');
    $link5 = $request->input('link5');
    $file5 = $request->file('pendukung5');

    if ($deskripsi5 || $link5 || $file5) {
        $filePath5 = null;
        if ($file5) {
            $fileName5 = time() . '_' . Str::random(10) . '.' . $file5->getClientOriginalExtension();
            $filePath5 = $file5->storeAs('peningkatan_kriteria1', $fileName5, 'public');
            session()->flash('pendukung5', $filePath5); // Simpan path untuk preview
        }

        PeningkatanModel::create([
            'id_detail_kriteria' => $idDetail,
            'peningkatan' => $deskripsi5,
            'link' => $link5,
            'pendukung' => $filePath5,
        ]);
    }

    return redirect()->back()->with('success', "Data berhasil di-{$action}!");
}

}
