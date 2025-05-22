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
        return view('kriteria.admin.kriteria1');
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

        // Simpan tiap bagian ke tabel masing-masing
        $sectionModels = [
            1 => ['model' => PenetapanModel::class, 'field' => 'penetapan'],
            2 => ['model' => PelaksanaanModel::class, 'field' => 'pelaksanaan'],
            3 => ['model' => EvaluasiModel::class, 'field' => 'evaluasi'],
            4 => ['model' => PengendalianModel::class, 'field' => 'pengendalian'],
            5 => ['model' => PeningkatanModel::class, 'field' => 'peningkatan'],
        ];

        foreach ($sectionModels as $i => $section) {
            $modelClass = $section['model'];
            $fieldName = $section['field'];

            $deskripsi = $request->input("description{$i}");
            $link = $request->input("link{$i}");
            $file = $request->file("pendukung{$i}");

            // Kalau gak ada data apapun, skip
            if (!$deskripsi && !$link && !$file) {
                continue;
            }

            $filePath = null;
            if ($file) {
                $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs("{$fieldName}_kriteria1", $fileName, 'public');
            }

            $modelClass::create([
                'id_detail_kriteria' => $idDetail,
                $fieldName => $deskripsi,
                'link' => $link,
                'pendukung' => $filePath,
            ]);
        }

        return redirect()->back()->with('success', "Data berhasil di-{$action}!");
    }

}
