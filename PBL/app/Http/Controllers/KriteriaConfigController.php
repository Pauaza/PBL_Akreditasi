<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KriteriaModel;
use Illuminate\Support\Facades\DB;

class KriteriaConfigController extends Controller
{
    public function index()
    {
        $kriterias = KriteriaModel::all();
        return view('superAdmin.kriteriaConfig.index', compact('kriterias'));
    }

    public function view($id)
    {
        $kriteria = KriteriaModel::find($id);
        return view('superAdmin.kriteriaConfig.view_ajax', compact('kriteria'));
    }

    public function edit($id)
    {
        $kriteria = KriteriaModel::find($id);
        return view('superAdmin.kriteriaConfig.edit_ajax', compact('kriteria'));
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_kriteria' => 'required|string|max:255',
        ]);

        // Ambil data berdasarkan ID
        $kriteria = KriteriaModel::findOrFail($id);

        // Update data
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->save();

        return redirect()->route('superAdmin.kriteria.index')->with('success', 'Data kriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cek apakah masih ada data anak di m_detail_kriteria
        $jumlahAnak = DB::table('m_detail_kriteria')->where('id_kriteria', $id)->count();

        if ($jumlahAnak > 0) {
            // Kalau masih ada data anak, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->route('superAdmin.kriteria.index')
                ->with('error', 'Data kriteria ini tidak bisa dihapus karena masih memiliki data detail kriteria terkait.');
        }

        // Jika tidak ada data anak, hapus data kriteria
        $kriteria = KriteriaModel::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('superAdmin.kriteria.index')->with('success', 'Data kriteria berhasil dihapus.');
    }
}