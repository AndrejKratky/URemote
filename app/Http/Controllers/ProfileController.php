<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index () {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updatePicture (Request $request) {
        $request->validate(['obrazok_profil' => 'required|image|max:2048']);
        $path = $request->file('obrazok_profil')->store('profile_pictures', 'public');
        $user = Auth::user();
        $user->obrazok_profil = $path;
        $user->save();
        return redirect()->route('profile');
    }

    public function updateName (Request $request) {
        $request->validate(['meno'=>'required|string|max:255|unique:users,meno']);
        $user = Auth::user();
        $user->meno = $request->meno;
        $user->save();
        return redirect()->route('profile');
    }

    public function updatePassword (Request $request) {
        $request->validate(['heslo'=>'required|string|min:5|confirmed']);
        $user = Auth::user();
        $user->heslo = Hash::make($request->heslo);
        $user->save();
        return redirect()->route('profile');
    }

    public function deleteUser (Request $request) {
        $user = Auth::user();

        if ($user->obrazok_profil != 'defaultProfilePicture.png') {
            Storage::disk('public')->delete($user->obrazok_profil);
        }

        $user->delete();
        Auth::logout();
        return redirect()->route('home');
    }
}
