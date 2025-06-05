<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KriteriaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FinalisasiDocumentController extends Controller
{
    /**
     * Streaming PDF untuk ditampilkan di viewer melalui AJAX
     */
    public function streamAllKriteria(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            Log::error('Pengguna tidak terautentikasi saat streaming PDF');
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ], 401);
        }

        $kriteriaList = KriteriaModel::with(['details' => function ($query) {
            $query->where(function ($q) {
                $q->where('status_kjm', 'acc')->orWhere('status_direktur', 'acc');
            })->with([
                'penetapan',
                'pelaksanaan',
                'evaluasi',
                'pengendalian',
                'peningkatan',
                'user'
            ]);
        }])->whereIn('id_kriteria', range(1, 9))->get();

        Log::info('Jumlah kriteria: ' . $kriteriaList->count());

        if ($kriteriaList->every(function ($kriteria) {
            return $kriteria->details->isEmpty();
        })) {
            Log::warning('Tidak ada data kriteria yang telah disetujui');
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data kriteria yang telah disetujui oleh KJM atau Direktur.'
            ], 404);
        }

        try {
            $pdf = Pdf::loadView('kriteria.admin.pdf', compact('kriteriaList'));
            $pdfOutput = $pdf->output();
            Log::info('PDF size: ' . strlen($pdfOutput) . ' bytes'); // Tambahkan log
            $pdfBase64 = base64_encode($pdfOutput);
            Log::info('Base64 length: ' . strlen($pdfBase64)); // Tambahkan log

            return response()->json([
                'success' => true,
                'pdfBase64' => $pdfBase64
            ]);
        } catch (\Exception $e) {
            Log::error('Error generating PDF: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghasilkan PDF: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Download PDF
     */
    public function downloadAllKriteria()
    {
        $user = Auth::user();

        if (!$user) {
            Log::error('Pengguna tidak terautentikasi saat download PDF');
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil semua kriteria (1-9) dengan detail yang telah di-ACC oleh KJM dan Direktur
        $kriteriaList = KriteriaModel::with(['details' => function ($query) {
            $query->where('status_kjm', 'acc')
                ->where('status_direktur', 'acc')
                ->with([
                    'penetapan',
                    'pelaksanaan',
                    'evaluasi',
                    'pengendalian',
                    'peningkatan',
                    'user'
                ]);
        }])->whereIn('id_kriteria', range(1, 9))->get();

        Log::info('Jumlah kriteria: ' . $kriteriaList->count());

        if ($kriteriaList->every(function ($kriteria) {
            return $kriteria->details->isEmpty();
        })) {
            Log::warning('Tidak ada data kriteria yang telah disetujui');
            return redirect()->back()->with('error', 'Tidak ada data kriteria yang telah disetujui oleh KJM dan Direktur.');
        }

        try {
            $pdf = Pdf::loadView('kriteria.admin.pdf', compact('kriteriaList'));
            return $pdf->download('laporan_semua_kriteria_disetujui.pdf');
        } catch (\Exception $e) {
            Log::error('Error generating PDF: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghasilkan PDF: ' . $e->getMessage());
        }
    }
}
