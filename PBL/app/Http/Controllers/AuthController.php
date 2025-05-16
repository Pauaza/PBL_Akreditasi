<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) { // jika sudah login, maka redirect ke halaman home             
            return redirect('/dashboard');
        }
        return view('auth.login');
    }
    public function postlogin(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Login Berhasil',
                'redirect' => url('/dashboard')
            ]);
        } else {
            return redirect()->intended('/dashboard');
        }
    }

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json([
            'status' => false,
            'message' => 'Login Gagal'
        ]);
    } else {
        return redirect()->back()->withErrors(['login' => 'Username atau password salah']);
    }
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}