<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\UserBooks;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LibraryController extends Controller
{
    public function index () {
        $books = Book::all();
        return view('library', compact('books'));
    }

    public function buyBook($userId, $bookId) {
        try {
            UserBooks::create([
                'pouzivatel_id' => $userId,
                'kniha_id' => $bookId,
                'status' => 'K'
            ]);
            return response()->json(['message' => 'Book bought successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error buying the book'], 500);
        }
    }

    public function borrowBook($userId, $bookId) {
        try {
            $returnDate = Carbon::now()->addDays(30);
            UserBooks::create([
                'pouzivatel_id' => $userId,
                'kniha_id' => $bookId,
                'status' => 'P',
                'pozicane_do' => $returnDate
            ]);
            return response()->json(['message' => 'Book borrowed successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error borrowing the book'], 500);
        }
    }
}
