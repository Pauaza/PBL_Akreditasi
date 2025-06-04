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
        // 1) Validasi request
        $request->validate([
            'status_validator' => 'required|in:acc,rev',
        ]);

        $id_kriteria = $request->id_kriteria;
        $user = Auth::user();
        $level = $user->id_level; // 2 = KPS, 3 = Kajur, 4 = KJM, 5 = Direktur

        // Ambil semua detail berdasarkan id_kriteria
        $details = DetailKriteriaModel::where('id_kriteria', $id_kriteria)->get();
        if ($details->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan untuk divalidasi.');
        }

        // Simpan komentar jika status == 'rev' dan komentar tidak kosong
        $komentarId = null;
        if ($request->status_validator === 'rev' && trim($request->komentar) !== '') {
            $komentar = KomentarModel::create([
                'komentar' => $request->komentar,
            ]);
            $komentarId = $komentar->id_komentar;
        }

        // 2) Jika user adalah KPS (2) atau Kajur (3) → kelompok level 1
        if (in_array($level, [2, 3])) {
            foreach ($details as $detail) {
                // Set status_kps dan status_kajur sesuai pilihan
                $detail->status_kps = $request->status_validator;
                $detail->status_kajur = $request->status_validator;

                // Jika ada komentar, simpan id_komentar
                if ($komentarId) {
                    $detail->id_komentar = $komentarId;
                }

                // Jika menolak, reset semua status level 2 (KJM & Direktur)
                if ($request->status_validator === 'rev') {
                    $detail->status_kjm = null;
                    $detail->status_direktur = null;
                }

                $detail->save();
            }

            // Jika 'acc', tidak perlu ubah status_kjm/direktur—tunggu proses selanjutnya
            return redirect()->route('dashboard_validator')
                ->with('success', 'Validasi KPS/Kajur berhasil diperbarui.');
        }

        // 3) Jika user adalah KJM (4) atau Direktur (5) → kelompok level 2
        if (in_array($level, [4, 4]) || in_array($level, [5, 5])) {
            // Pastikan KPS & Kajur sudah acc dulu
            $alreadyAccLevel1 = $details->every(
                fn($d) =>
                $d->status_kps === 'acc' && $d->status_kajur === 'acc'
            );
            if (!$alreadyAccLevel1) {
                return redirect()->back()->with('error', 'Proses level 1 (KPS/Kajur) harus selesai terlebih dahulu.');
            }

            foreach ($details as $detail) {
                // Set status_kjm dan status_direktur sesuai pilihan
                $detail->status_kjm = $request->status_validator;
                $detail->status_direktur = $request->status_validator;

                if ($komentarId) {
                    $detail->id_komentar = $komentarId;
                }

                // Jika menolak, reset semua status level 1 (KPS & Kajur)
                if ($request->status_validator === 'rev') {
                    $detail->status_kps = null;
                    $detail->status_kajur = null;
                }

                $detail->save();
            }

            return redirect()->route('dashboard_validator')
                ->with('success', 'Validasi KJM/Direktur berhasil diperbarui.');
        }

        // Level user tidak termasuk: kirim error
        return redirect()->back()->with('error', 'Level user tidak dikenali.');
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

        // Ambil semua detail berdasarkan id_kriteria tanpa filter status acc/rev
        $details = DetailKriteriaModel::with([
            'penetapan',
            'pelaksanaan',
            'evaluasi',
            'pengendalian',
            'peningkatan',
            'kriteria'
        ])->where('id_kriteria', $id_kriteria)->get();

        $pdf = PDF::loadView('kriteria.validator.kriteria.overview', compact('kriteria', 'details'));
        return $pdf->stream('laporan_kriteria_' . $id_kriteria . '.pdf');
    }
}
