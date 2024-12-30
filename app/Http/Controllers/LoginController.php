<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Hardcoded username dan password admin
        $adminUsername = 'admin';
        $adminPassword = 'password123';

        // Cek username dan password
        if ($credentials['username'] === $adminUsername && $credentials['password'] === $adminPassword) {
            // Set session untuk login
            $request->session()->put('is_admin', true);

            // Arahkan ke dashboard
            return redirect()->route('dashboard');
        }

        // Jika gagal, kembali dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin'); // Hapus session
        return redirect()->route('home'); // Arahkan ke halaman login
    }

}
