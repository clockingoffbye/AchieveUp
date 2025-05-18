<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        // dd($request->all());
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password], true)) {
            $user = Auth::user();
            // dd($user->role);
            if($user->role == 'admin'){
                // echo 'admin'; 
                // die();
                return redirect()->intended('/dashboard');
            } else if($user->role == 'mahasiswa'){
                return redirect()->intended('/dashboard');
                // echo 'mahasiswa';
                // die();
            } else if($user->role == 'dosen'){
                return redirect()->intended('/dashboard');
                // echo 'dosen';
                // die();
            } else {
                return redirect()->back()->with('error', 'Role tidak ditemukan');
            }
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
