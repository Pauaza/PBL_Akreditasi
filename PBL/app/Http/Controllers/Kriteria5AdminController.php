<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelaksanaanModel;
use App\Models\PenetapanModel;
use App\Models\PengendalianModel;
use App\Models\EvaluasiModel;
use App\Models\PeningkatanModel;
use App\Models\DetailKriteriaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Kriteria5AdminController extends Controller
{
    public function index()
    {
        $data = DetailKriteriaModel::with('kriteria')->where('id_kriteria', 5)->get();
        return view('kriteria.admin.kriteria5.index', compact('data'));
    }

    public function create()
    {
        return view('kriteria.admin.kriteria5.create');
    }

    public function edit(string $id)
    {
        $kriteria = DetailKriteriaModel::with('penetapan', 'pelaksanaan', 'evaluasi', 'pengendalian', 'peningkatan', 'komentar')->findOrFail($id);
        return view('kriteria.admin.kriteria5.edit', [
            'kriteria' => $kriteria
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'penetapan' => 'nullable|string',
            'pelaksanaan' => 'nullable|string',
            'evaluasi' => 'nullable|string',
            'pengendalian' => 'nullable|string',
            'peningkatan' => 'nullable|string',
            'file_penetapan' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_pelaksanaan' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_evaluasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_pengendalian' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_peningkatan' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $kriteria = DetailKriteriaModel::findOrFail($id);
        $id_kriteria = (int) $request->input('id_kriteria');
        $isUpdated = false;

        // Update Penetapan
        if ($request->penetapan || $request->hasFile('file_penetapan')) {
            $penetapan = PenetapanModel::where('id_penetapan', $kriteria->id_penetapan)->first();
            if ($penetapan) {
                $penetapan->penetapan = $request->penetapan ?? $penetapan->penetapan;
                if ($request->hasFile('file_penetapan')) {
                    $path = $request->file('file_penetapan')->store('pendukung/penetapan');
                    $penetapan->pendukung = $path;
                }
                $penetapan->save();
                $isUpdated = true;
            } else {
                $path = $request->file('file_penetapan')?->store('pendukung/penetapan');
                $penetapan = PenetapanModel::create([
                    'id_kriteria' => $id_kriteria,
                    'penetapan' => $request->penetapan,
                    'pendukung' => $path,
                ]);
                $kriteria->id_penetapan = $penetapan->id_penetapan;
                $isUpdated = true;
            }
        }

        // Update Pelaksanaan
        if ($request->pelaksanaan || $request->hasFile('file_pelaksanaan')) {
            $pelaksanaan = PelaksanaanModel::where('id_pelaksanaan', $kriteria->id_pelaksanaan)->first();
            if ($pelaksanaan) {
                $pelaksanaan->penetapan = $request->pelaksanaan ?? $pelaksanaan->penetapan;
                if ($request->hasFile('file_pelaksanaan')) {
                    $path = $request->file('file_pelaksanaan')->store('pendukung/pelaksanaan');
                    $pelaksanaan->pendukung = $path;
                }
                $pelaksanaan->save();
                $isUpdated = true;
            } else {
                $path = $request->file('file_pelaksanaan')?->store('pendukung/pelaksanaan');
                $pelaksanaan = PelaksanaanModel::create([
                    'id_kriteria' => $id_kriteria,
                    'penetapan' => $request->pelaksanaan,
                    'pendukung' => $path,
                ]);
                $kriteria->id_pelaksanaan = $pelaksanaan->id_pelaksanaan;
                $isUpdated = true;
            }
        }

        // Update Evaluasi
        if ($request->evaluasi || $request->hasFile('file_evaluasi')) {
            $evaluasi = EvaluasiModel::where('id_evaluasi', $kriteria->id_evaluasi)->first();
            if ($evaluasi) {
                $evaluasi->penetapan = $request->evaluasi ?? $evaluasi->penetapan;
                if ($request->hasFile('file_evaluasi')) {
                    $path = $request->file('file_evaluasi')->store('pendukung/evaluasi');
                    $evaluasi->pendukung = $path;
                }
                $evaluasi->save();
                $isUpdated = true;
            } else {
                $path = $request->file('file_evaluasi')?->store('pendukung/evaluasi');
                $evaluasi = EvaluasiModel::create([
                    'id_kriteria' => $id_kriteria,
                    'penetapan' => $request->evaluasi,
                    'pendukung' => $path,
                ]);
                $kriteria->id_evaluasi = $evaluasi->id_evaluasi;
                $isUpdated = true;
            }
        }

        // Update Pengendalian
        if ($request->pengendalian || $request->hasFile('file_pengendalian')) {
            $pengendalian = PengendalianModel::where('id_pengendalian', $kriteria->id_pengendalian)->first();
            if ($pengendalian) {
                $pengendalian->penetapan = $request->pengendalian ?? $pengendalian->penetapan;
                if ($request->hasFile('file_pengendalian')) {
                    $path = $request->file('file_pengendalian')->store('pendukung/pengendalian');
                    $pengendalian->pendukung = $path;
                }
                $pengendalian->save();
                $isUpdated = true;
            } else {
                $path = $request->file('file_pengendalian')?->store('pendukung/pengendalian');
                $pengendalian = PengendalianModel::create([
                    'id_kriteria' => $id_kriteria,
                    'penetapan' => $request->pengendalian,
                    'pendukung' => $path,
                ]);
                $kriteria->id_pengendalian = $pengendalian->id_pengendalian;
                $isUpdated = true;
            }
        }

        // Update Peningkatan
        if ($request->peningkatan || $request->hasFile('file_peningkatan')) {
            $peningkatan = PeningkatanModel::where('id_peningkatan', $kriteria->id_peningkatan)->first();
            if ($peningkatan) {
                $peningkatan->penetapan = $request->peningkatan ?? $peningkatan->penetapan;
                if ($request->hasFile('file_peningkatan')) {
                    $path = $request->file('file_peningkatan')->store('pendukung/peningkatan');
                    $peningkatan->pendukung = $path;
                }
                $peningkatan->save();
                $isUpdated = true;
            } else {
                $path = $request->file('file_peningkatan')?->store('pendukung/peningkatan');
                $peningkatan = PeningkatanModel::create([
                    'id_kriteria' => $id_kriteria,
                    'penetapan' => $request->peningkatan,
                    'pendukung' => $path,
                ]);
                $kriteria->id_peningkatan = $peningkatan->id_peningkatan;
                $isUpdated = true;
            }
        }
       if ($isUpdated) {
            $kriteria->updated_at = now();
            $kriteria->save();
            Log::info('Updated DetailKriteria', [
                'id_detail_kriteria' => $kriteria->id_detail_kriteria,
                'created_at' => $kriteria->created_at,
                'updated_at' => $kriteria->updated_at,
                'is_updated' => $isUpdated
            ]);
        }

        return redirect()->route('index.admin.kriteria5')->with('success', 'Data berhasil diperbarui.');
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
            $fileName = time() . '_' . Str::random(50) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('penetapan_kriteria5', $fileName, 'public');
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
            $fileName = time() . '_' . Str::random(50) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('pelaksanaan_kriteria5', $fileName, 'public');
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
            $fileName = time() . '_' . Str::random(50) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('evaluasi_kriteria5', $fileName, 'public');
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
            $fileName = time() . '_' . Str::random(50) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('pengendalian_kriteria5', $fileName, 'public');
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
            $fileName = time() . '_' . Str::random(50) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('peningkatan_kriteria5', $fileName, 'public');
        }

        PeningkatanModel::create([
            'id_detail_kriteria' => $request->id_detail_kriteria,
            'penetapan' => $request->peningkatan,
            'link' => $request->link,
            'pendukung' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data Peningkatan berhasil disimpan!');
    }

    // Fungsi submit berdasarkan id_detail_kriteria
    public function submitKriteria(Request $request)
    {
        $request->validate([
            'penetapan' => 'nullable|string',
            'link_penetapan' => 'nullable|url',
            'pelaksanaan' => 'nullable|string',
            'link_pelaksanaan' => 'nullable|url',
            'evaluasi' => 'nullable|string',
            'link_evaluasi' => 'nullable|url',
            'pengendalian' => 'nullable|string',
            'link_pengendalian' => 'nullable|url',
            'peningkatan' => 'nullable|string',
            'link_peningkatan' => 'nullable|url',
            'file_penetapan' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'file_pelaksanaan' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'file_evaluasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'file_pengendalian' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'file_peningkatan' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $kriteria = (int) $request->input('id_kriteria');
        $action = $request->input('form_action', 'submit'); // Default ke 'submit' jika tidak ada

        $id_penetapan = null;
        $id_pelaksanaan = null;
        $id_evaluasi = null;
        $id_pengendalian = null;
        $id_peningkatan = null;

        if ($request->penetapan || $request->hasFile('file_penetapan') || $request->link_penetapan) {
            $path = $request->file('file_penetapan')?->store('pendukung/penetapan', 'public');
            $penetapan = PenetapanModel::create([
                'id_kriteria' => $kriteria,
                'penetapan' => $request->penetapan,
                'pendukung' => $path,
                'link' => $request->link_penetapan,
            ]);
            $id_penetapan = $penetapan->id_penetapan;
        }

        if ($request->pelaksanaan || $request->hasFile('file_pelaksanaan') || $request->link_pelaksanaan) {
            $path = $request->file('file_pelaksanaan')?->store('pendukung/pelaksanaan', 'public');
            $pelaksanaan = PelaksanaanModel::create([
                'id_kriteria' => $kriteria,
                'penetapan' => $request->pelaksanaan,
                'pendukung' => $path,
                'link' => $request->link_pelaksanaan,
            ]);
            $id_pelaksanaan = $pelaksanaan->id_pelaksanaan;
        }

        if ($request->evaluasi || $request->hasFile('file_evaluasi') || $request->link_evaluasi) {
            $path = $request->file('file_evaluasi')?->store('pendukung/evaluasi', 'public');
            $evaluasi = EvaluasiModel::create([
                'id_kriteria' => $kriteria,
                'penetapan' => $request->evaluasi,
                'pendukung' => $path,
                'link' => $request->link_evaluasi,
            ]);
            $id_evaluasi = $evaluasi->id_evaluasi;
        }

        if ($request->pengendalian || $request->hasFile('file_pengendalian') || $request->link_pengendalian) {
            $path = $request->file('file_pengendalian')?->store('pendukung/pengendalian', 'public');
            $pengendalian = PengendalianModel::create([
                'id_kriteria' => $kriteria,
                'penetapan' => $request->pengendalian,
                'pendukung' => $path,
                'link' => $request->link_pengendalian,
            ]);
            $id_pengendalian = $pengendalian->id_pengendalian;
        }

        if ($request->peningkatan || $request->hasFile('file_peningkatan') || $request->link_peningkatan) {
            $path = $request->file('file_peningkatan')?->store('pendukung/peningkatan', 'public');
            $peningkatan = PeningkatanModel::create([
                'id_kriteria' => $kriteria,
                'penetapan' => $request->peningkatan,
                'pendukung' => $path,
                'link' => $request->link_peningkatan,
            ]);
            $id_peningkatan = $peningkatan->id_peningkatan;
        }

        $detailKriteria = DetailKriteriaModel::create([
            'id_user' => auth()->user()->id_user,
            'id_penetapan' => $id_penetapan,
            'id_pelaksanaan' => $id_pelaksanaan,
            'id_evaluasi' => $id_evaluasi,
            'id_pengendalian' => $id_pengendalian,
            'id_peningkatan' => $id_peningkatan,
            'id_kriteria' => $kriteria,
            'status_selesai' => $action === 'draft' ? 'save' : 'submit',
        ]);

        return redirect()->route('index.admin.kriteria5')->with('success', 'Data berhasil disimpan sebagai ' . ($action === 'draft' ? 'draf' : 'submit') . '.');
    }

    public function show($id)
    {
        $kriteria = DetailKriteriaModel::with('penetapan', 'pelaksanaan', 'evaluasi', 'pengendalian', 'peningkatan', 'komentar')->find($id);

        return view('kriteria.admin.kriteria5.view', compact('kriteria'));
    }

    public function print($id)
    {
        $item = DetailKriteriaModel::with('kriteria')->findOrFail($id);
        $pdf = Pdf::loadView('kriteria.admin.kriteria5.printPdf', compact('item'));

        return $pdf->download('Laporan_Kriteria5_' . $item->id_detail_kriteria . '.pdf');
    }

    public function destroy($id)
    {
        $kriteria = DetailKriteriaModel::find($id);
        $kriteria->delete();

        return redirect()->route('index.admin.kriteria5')->with('success', 'Data berhasil dihapus.');
    }
}