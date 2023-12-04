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
}
