<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        $validatedData = $request->validate([
            'meno' => 'required',
            'heslo' => 'required'
        ]);

        $credentials = [
            'meno' => $validatedData['meno'],
            'password' => $validatedData['heslo']
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('home');
        }

        return back()->withErrors([
            'loginError' => 'Zadali ste neplatné prihlasovacie údaje.'
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home');
    }
}
