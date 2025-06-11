<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetailKriteriaModel;
use Illuminate\Support\Facades\Hash;

class userConfigController extends Controller
{
    public function index()
    {
        $users = UserModel::with('level')->get();
        return view('superAdmin.userConfig.index', compact('users'));
    }

    public function view($id)
    {
        $user = UserModel::findOrFail($id);
        return view('superAdmin.userConfig.view_ajax', compact('user'));
    }

    public function edit($id)
    {
        $levels = LevelModel::all();
        $user = UserModel::findOrFail($id);
        return view('superAdmin.userConfig.edit_ajax', compact('user', 'levels'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'username' => 'required|string|max:100',
            'name' => 'required|string|max:100',
            'id_level' => 'required|exists:m_level,id_level',
            'password' => 'nullable|string|min:5',
        ]);

        // Ambil user
        $user = UserModel::findOrFail($id);

        // Update data
        $user->username = $request->username;
        $user->name = $request->name;
        $user->id_level = $request->id_level;

        // Hanya ubah password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan
        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('superAdmin.user.index')->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cek apakah masih ada data anak di m_detail_kriteria
        $jumlahAnak = DB::table('m_detail_kriteria')->where('id_user', $id)->count();

        if ($jumlahAnak > 0) {
            // Kalau masih ada data anak, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->route('superAdmin.user.index')
                ->with('error', 'Data user ini tidak bisa dihapus karena masih memiliki data detail kriteria terkait.');
        }

        // Jika tidak ada data anak, hapus data user
        $kriteria = UserModel::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('superAdmin.user.index')->with('success', 'Data user berhasil dihapus.');
    }

    public function create()
    {
        $levels = LevelModel::all();
        return view('superAdmin.userConfig.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:m_user,username|max:100',
            'name' => 'required|string|max:100',
            'id_level' => 'required|exists:m_level,id_level',
            'password' => 'required|string|min:5',
        ]);

        UserModel::create([
            'username' => $request->username,
            'name' => $request->name,
            'id_level' => $request->id_level,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('superAdmin.user.index')->with('success', 'User baru berhasil ditambahkan.');
    }

}