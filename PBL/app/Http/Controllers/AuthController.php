<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            $username = Auth::user()->username;

            // Jika username berupa admin1 sampai admin9
            if (in_array($username, ['admin1', 'admin2', 'admin3', 'admin4', 'admin5', 'admin6', 'admin7', 'admin8', 'admin9'])) {
                return redirect('/dashboard_admin');
            }

            if ($username === 'superadmin') {
                return redirect()->route('superAdmin.dashboard');
            }

            // Jika username adalah salah satu validator
            if (in_array($username, ['kps', 'kajur', 'direktur', 'kjm'])) {
                return redirect('/dashboard_validator');
            }

            // Jika bukan keduanya, tolak akses
            return abort(403, 'Unauthorized');
        }

        return view('login.login');
    }

    public function postlogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        Log::info('Login attempt:', $credentials); // Debugging

        if (Auth::attempt($credentials)) {
            // Get the authenticated user
            $user = Auth::user();

            // Determine the redirect URL based on username
            $redirectUrl = $this->getRedirectUrl($user->username);

            Log::info('Login successful:', ['username' => $user->username, 'redirect' => $redirectUrl]); // Debugging

            return response()->json([
                'status' => true,
                'message' => 'Login Berhasil',
                'redirect' => url($redirectUrl)
            ], 200);
        }

        Log::warning('Login failed:', $credentials); // Debugging

        return response()->json([
            'status' => false,
            'message' => 'Username atau Password Salah'
        ], 401);
    }

    private function getRedirectUrl($username)
    {
        // Define admin usernames (admin1 to admin9)
        $adminUsernames = ['admin1', 'admin2', 'admin3', 'admin4', 'admin5', 'admin6', 'admin7', 'admin8', 'admin9'];

        // Check if the username is in the admin list
        if (in_array($username, $adminUsernames)) {
            return '/dashboard_admin';
        }

        if ($username === 'superadmin') {
            return '/superAdmin';
        }

        // Default redirect for other users (kps, kajur, direktur, kjm)
        return '/dashboard_validator';
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Keluar dari auth

        $request->session()->invalidate(); // Invalidate session lama
        $request->session()->regenerateToken(); // Buat CSRF token baru

        return redirect('/login'); // Arahkan ke halaman login
    }
}