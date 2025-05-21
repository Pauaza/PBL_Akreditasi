<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) { // jika sudah login, maka redirect ke halaman home             
            return redirect('/dashboard_validator');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Get the authenticated user
            $user = Auth::user();

            // Determine the redirect URL based on username
            $redirectUrl = $this->getRedirectUrl($user->username);

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url($redirectUrl)
                ]);
            } else {
                return redirect()->intended($redirectUrl);
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

    private function getRedirectUrl($username)
    {
        // Define admin usernames (admin1 to admin9)
        $adminUsernames = ['admin1', 'admin2', 'admin3', 'admin4', 'admin5', 'admin6', 'admin7', 'admin8', 'admin9'];

        // Check if the username is in the admin list
        if (in_array($username, $adminUsernames)) {
            return '/dashboard_admin';
        }

        // Default redirect for other users (kps, kajur, direktur, kjm)
        return '/dashboard_validator';
    }

    public function logout(Request $request)
    {
        Auth::logout(); // keluar dari auth

        $request->session()->invalidate(); // invalidate session lama
        $request->session()->regenerateToken(); // buat CSRF token baru

        return redirect('/login'); // arahkan ke halaman login
    }
}