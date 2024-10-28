<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index() {
        return view('login.login');
    }
    
    public function process(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Contoh Format Email abc@mail.com',
            'password.required' => 'Password tidak boleh kosong'
        ]);
        

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }


        return back()->withErrors([
            'email' => 'Authentikasi gagal'
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
