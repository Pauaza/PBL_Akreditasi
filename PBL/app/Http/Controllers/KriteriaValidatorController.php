<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarModel;
use App\Models\KriteriaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetailKriteriaModel;
use Illuminate\Support\Facades\Auth;

class KriteriaValidatorController extends Controller
{
    public function index($id_kriteria)
    {
        $user = Auth::user();
        $level = $user->id_level;

        $kriteria = KriteriaModel::findOrFail($id_kriteria);

        $query = DetailKriteriaModel::with([
            'penetapan',
            'pelaksanaan',
            'evaluasi',
            'pengendalian',
            'peningkatan',
            'kriteria'
        ])->where('id_kriteria', $id_kriteria);

        if ($level == 2 || $level == 3) {
            // KPS atau Kajur: tampilkan jika belum di-ACC oleh salah satu dari keduanya
            $query->where(function ($q) {
                $q->whereNull('status_kps')
                    ->orWhereNull('status_kajur');
            });
        } elseif ($level == 4 || $level == 5) {
            // KJM atau Direktur: tampilkan jika belum di-ACC oleh salah satu dari keduanya
            $query->where(function ($q) {
                $q->whereNull('status_kjm')
                    ->orWhereNull('status_direktur');
            });
        }


        $details = $query->get();

        $error = null;
        if ($details->isEmpty()) {
            $error = "Data belum tersedia atau belum disetujui untuk ditampilkan pada level Anda saat ini.";
        }

        return view("kriteria.validator.kriteria.index", compact('kriteria', 'details', 'error'));
    }

    public function validation(Request $request)
    {
        // Validasi input status_validator harus diisi dan hanya boleh 'acc' atau 'rev'
        $request->validate([
            'status_validator' => 'required|in:acc,rev',
        ]);

        // Ambil ID kriteria dari request
        $id_kriteria = $request->id_kriteria;

        // Ambil data user yang sedang login
        $user = Auth::user();
        $level = $user->id_level;

        // Ambil semua detail kriteria berdasarkan id_kriteria
        $details = DetailKriteriaModel::where('id_kriteria', $id_kriteria)->get();

        // Jika tidak ada data, kembalikan dengan pesan error
        if ($details->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan untuk divalidasi.');
        }

        // Jika statusnya 'rev' (revisi) dan komentar tidak kosong, simpan komentar
        $komentarId = null;
        if ($request->status_validator === 'rev' && !empty(trim($request->komentar))) {
            $komentar = KomentarModel::create([
                'komentar' => $request->komentar,
            ]);
            $komentarId = $komentar->id_komentar; // Simpan ID komentar yang baru dibuat
        }

        // Tentukan kolom status yang akan diisi berdasarkan level user
        $statusKolom = null;
        if ($level == 2) {
            $statusKolom = 'status_kps';
        } elseif ($level == 3) {
            $statusKolom = 'status_kajur';
        } elseif ($level == 4) {
            $statusKolom = 'status_kjm';
        } elseif ($level == 5) {
            $statusKolom = 'status_direktur';
        }

        // Jika level user tidak cocok, hentikan proses
        if (!$statusKolom) {
            return redirect()->back()->with('error', 'Level user tidak dikenali.');
        }

        // Update status validasi dan simpan komentar jika ada
        foreach ($details as $detail) {
            $detail->$statusKolom = $request->status_validator;

            // Jika ada komentar, simpan juga ID komentar ke data detail
            if ($komentarId) {
                $detail->id_komentar = $komentarId;
            }

            $detail->save(); // Simpan perubahan ke database
        }

        // Kembalikan ke halaman index dengan pesan sukses
        return redirect()->route('dashboard_validator')->with('success', 'Validation status updated successfully.');
    }


    public function generateOverview($id_kriteria)
    {
        $user = Auth::user();
        $level = $user->id_level;

        $kriteria = KriteriaModel::findOrFail($id_kriteria);

        $query = DetailKriteriaModel::with([
            'penetapan',
            'pelaksanaan',
            'evaluasi',
            'pengendalian',
            'peningkatan',
            'kriteria'
        ])->where('id_kriteria', $id_kriteria);

        if ($level == 2 || $level == 3) {
            // KPS atau Kajur: tampilkan jika belum di-ACC oleh salah satu dari keduanya
            $query->where(function ($q) {
                $q->whereNull('status_kps')
                    ->orWhereNull('status_kajur');
            });
        } elseif ($level == 4 || $level == 5) {
            // KJM atau Direktur: tampilkan jika belum di-ACC oleh salah satu dari keduanya
            $query->where(function ($q) {
                $q->whereNull('status_kjm')
                    ->orWhereNull('status_direktur');
            });
        }

        $details = $query->get();

        $pdf = PDF::loadView('kriteria.validator.kriteria.overview', compact('kriteria', 'details'));
        return $pdf->download('laporan_kriteria_' . $id_kriteria . '.pdf');
    }

    public function streamOverview($id_kriteria)
    {
        $user = Auth::user();
        $level = $user->id_level;

        $kriteria = KriteriaModel::findOrFail($id_kriteria);

        $query = DetailKriteriaModel::with([
            'penetapan',
            'pelaksanaan',
            'evaluasi',
            'pengendalian',
            'peningkatan',
            'kriteria'
        ])->where('id_kriteria', $id_kriteria);

        if ($level == 2 || $level == 3) {
            // KPS atau Kajur: tampilkan jika belum di-ACC oleh salah satu dari keduanya
            $query->where(function ($q) {
                $q->whereNull('status_kps')
                    ->orWhereNull('status_kajur');
            });
        } elseif ($level == 4 || $level == 5) {
            // KJM atau Direktur: tampilkan jika belum di-ACC oleh salah satu dari keduanya
            $query->where(function ($q) {
                $q->whereNull('status_kjm')
                    ->orWhereNull('status_direktur');
            });
        }


        $details = $query->get();

        $pdf = PDF::loadView('kriteria.validator.kriteria.overview', compact('kriteria', 'details'));
        return $pdf->stream('laporan_kriteria_' . $id_kriteria . '.pdf');
    }
}
