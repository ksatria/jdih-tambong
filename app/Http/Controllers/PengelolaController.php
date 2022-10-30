<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pengelola;

class PengelolaController extends Controller
{
    function prosesLogin(Request $request)
    {
        $credentials = $request->validate([
            'usernamejdih' => ['required'],
            'passwordjdih' => ['required'],
            'rememberjdih' => ['nullable']
        ]);

        $username = $credentials['usernamejdih'];
        $password = $credentials['passwordjdih'];
        $remember = isset($credentials['rememberjdih']);

        if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
            $request->session()->regenerate();

            return redirect('dashboard');
        }

        return back()
            ->withErrors(['login' => 'Username atau password salah. Silakan coba lagi.'])
            ->withInput();
    }

    function login()
    {
        if (Auth::viaRemember())
            return "Sudah login via remember";
        else
            return view('admin.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    function dashboard()
    {
        return view('admin.dashboard');
    }
}
