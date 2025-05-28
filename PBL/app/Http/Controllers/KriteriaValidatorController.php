<?php

namespace App\Http\Controllers;

use App\Models\DetailKriteriaModel;
use App\Models\KriteriaModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KriteriaValidatorController extends Controller
{
    public function index()
    {
        $id_kriteria = 1;
        $kriteria = KriteriaModel::findOrFail($id_kriteria);
        $details = DetailKriteriaModel::with(['penetapan', 'pelaksanaan', 'evaluasi', 'pengendalian', 'peningkatan', 'kriteria'])
            ->where('id_kriteria', $id_kriteria)
            ->get();

        return view('kriteria.validator.kriteria1.index', compact('kriteria', 'details'));
    }

    public function generateOverview()
    {
        $id_kriteria = 1;
        $kriteria = KriteriaModel::findOrFail($id_kriteria);
        $details = DetailKriteriaModel::with(['penetapan', 'pelaksanaan', 'evaluasi', 'pengendalian', 'peningkatan', 'kriteria'])
            ->where('id_kriteria', $id_kriteria)
            ->get();

        $pdf = PDF::loadView('kriteria.validator.kriteria1.overview', compact('kriteria', 'details'));
        return $pdf->download('laporan_kriteria_' . $id_kriteria . '.pdf');
    }

    public function streamOverview()
    {
        $id_kriteria = 1;
        $kriteria = KriteriaModel::findOrFail($id_kriteria);
        $details = DetailKriteriaModel::with(['penetapan', 'pelaksanaan', 'evaluasi', 'pengendalian', 'peningkatan', 'komentar', 'kriteria'])
            ->where('id_kriteria', $id_kriteria)
            ->get();

        $pdf = PDF::loadView('kriteria.validator.kriteria1.overview', compact('kriteria', 'details'));
        return $pdf->stream('laporan_kriteria_' . $id_kriteria . '.pdf');
    }
}
