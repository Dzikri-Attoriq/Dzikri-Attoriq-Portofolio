<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $data['title'] = 'Login Page';
        return view('login/login', $data);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email Wajib Di Isi.',
            'password.required' => 'Password Wajib Di Isi.',
        ]);
        if (Auth::guard('admin')->attempt($credentials)) {
            if(Auth::guard('admin')->user()->role == '1') {
                $request->session()->regenerate();
                return redirect('/dashboard-admin');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('login');
            }
        }
        if (Auth::guard('web')->attempt($credentials)) {
            if(Auth::user()->role == '2') {
                $request->session()->regenerate();
                return redirect('/dashboard-user');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('login');
            }
        }
        return back()->with('gagalLogin', 'Email/Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
