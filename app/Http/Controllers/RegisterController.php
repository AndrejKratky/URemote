<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,meno',
            'password' => 'required'
        ]);
        $user = new User();
        $user->meno = $request->username;
        $user->heslo = Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return redirect()->route('home');
    }
}
