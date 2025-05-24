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
        $data = DetailKriteriaModel::with('kriteria')->get();
        return view('kriteria.admin.kriteria1.index', compact('data'));
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

    // Fungsi submit berdasarkan id_detail_kriteria
    public function submitKriteria(Request $request)
    {
        $request->validate([
            'penetapan'         => 'nullable|string',
            'pelaksanaan'       => 'nullable|string',
            'evaluasi'          => 'nullable|string',
            'pengendalian'      => 'nullable|string',
            'peningkatan'       => 'nullable|string',
            'file_penetapan'    => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'file_pelaksanaan'  => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'file_evaluasi'     => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'file_pengendalian' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'file_peningkatan'  => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $kriteria = (int) $request->input('id_kriteria');

        $id_penetapan = null;
        $id_pelaksanaan = null;
        $id_evaluasi = null;
        $id_pengendalian = null;
        $id_peningkatan = null;

        if ($request->penetapan || $request->hasFile('file_penetapan')) {
            $path = $request->file('file_penetapan')?->store('pendukung/penetapan');
            $penetapan = PenetapanModel::create([
                'id_kriteria' => $kriteria,
                'penetapan'   => $request->penetapan,
                'pendukung'   => $path,
            ]);
            $id_penetapan = $penetapan->id_penetapan;
        }

        if ($request->pelaksanaan || $request->hasFile('file_pelaksanaan')) {
            $path = $request->file('file_pelaksanaan')?->store('pendukung/pelaksanaan');
            $pelaksanaan = PelaksanaanModel::create([
                'id_kriteria' => $kriteria,
                'penetapan'   => $request->pelaksanaan,
                'pendukung'   => $path,
            ]);
            $id_pelaksanaan = $pelaksanaan->id_pelaksanaan;
        }

        if ($request->evaluasi || $request->hasFile('file_evaluasi')) {
            $path = $request->file('file_evaluasi')?->store('pendukung/evaluasi');
            $evaluasi = EvaluasiModel::create([
                'id_kriteria' => $kriteria,
                'penetapan'   => $request->evaluasi,
                'pendukung'   => $path,
            ]);
            $id_evaluasi = $evaluasi->id_evaluasi;
        }

        if ($request->pengendalian || $request->hasFile('file_pengendalian')) {
            $path = $request->file('file_pengendalian')?->store('pendukung/pengendalian');
            $pengendalian = PengendalianModel::create([
                'id_kriteria' => $kriteria,
                'penetapan'   => $request->pengendalian,
                'pendukung'   => $path,
            ]);
            $id_pengendalian = $pengendalian->id_pengendalian;
        }

        if ($request->peningkatan || $request->hasFile('file_peningkatan')) {
            $path = $request->file('file_peningkatan')?->store('pendukung/peningkatan');
            $peningkatan = PeningkatanModel::create([
                'id_kriteria' => $kriteria,
                'penetapan'   => $request->peningkatan,
                'pendukung'   => $path,
            ]);
            $id_peningkatan = $peningkatan->id_peningkatan;
        }

        // Simpan ke m_detail_kriteria
        DetailKriteriaModel::create([
            'id_user'         => auth()->user()->id_user,
            'id_penetapan'    => $id_penetapan,
            'id_pelaksanaan'  => $id_pelaksanaan,
            'id_evaluasi'     => $id_evaluasi,
            'id_pengendalian' => $id_pengendalian,
            'id_peningkatan'  => $id_peningkatan,
            'id_kriteria'     => $kriteria,
            'status_selesai'  => 'save',
        ]);

        return redirect()->route('index.admin.kriteria1')->with('success', 'Data berhasil disimpan.');
    }
}