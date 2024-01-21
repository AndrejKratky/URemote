<?php

namespace App\Http\Controllers;

use App\Models\UserBooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyLibraryController extends Controller
{
    public function index() {
        $user = Auth::user();
        $userBooks = $user->books()->with('book')->get();
        return view('mylibrary', ['userBooks' => $userBooks]);
    }

    public function updateBookFavourite(Request $request, $bookId) {
        $user = Auth::user();
        $userBook = UserBooks::where([
            'kniha_id' => $bookId,
            'pouzivatel_id' => $user->id,
        ])->first();
        if ($userBook) {
            $userBook->oblubena = !$userBook->oblubena;
            $userBook->save();
            return response()->json(['success' => true, 'oblubena' => $userBook->oblubena]);
        }
        return response()->json(['success' => false, 'message' => 'User book not found.']);
    }
}
