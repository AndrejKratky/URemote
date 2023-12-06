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
            'password' => 'required',
            'email' => 'nullable|email|unique:users,email'
        ]);
        $user = new User();
        $user->meno = $request->username;
        $user->heslo = Hash::make($request->password);
        $user->obrazok_profil = 'images/defaultProfilePicture.png';

        if ($request->has('email') && $request->email != '') {
            $user->email = $request->email;
        }

        $user->save();
        Auth::login($user);
        return redirect()->route('home');
    }
}
