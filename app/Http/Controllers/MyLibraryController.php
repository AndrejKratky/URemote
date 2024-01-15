<?php

namespace App\Http\Controllers;

use App\Models\UserBooks;
use Illuminate\Support\Facades\Auth;

class MyLibraryController extends Controller
{
    public function index() {
        $user = Auth::user();
        //$userBooks = UserBooks::where('pouzivatel_id', $user->id)->get();
        $userBooks = $user->userBooks()->with('userBooks')->get();
        return view('mylibrary', ['userBooks' => $userBooks]);
    }
}