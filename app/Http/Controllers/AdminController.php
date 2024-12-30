<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('admin-login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $username = 'admin';
        $password = 'password123';

        // Validasi username dan password
        if ($request->username === $username && $request->password === $password) {
            session(['is_admin' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['error' => 'Username atau password salah!']);
    }

    // Menampilkan dashboard
    public function dashboard()
    {
        if (!session('is_admin')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Harap login terlebih dahulu!']);
        }
        return view('dashboard');
    }

    // Logout dan redirect ke halaman login
    public function logout()
    {
        session()->forget('is_admin');
        return redirect()->route('home');
    }
}

