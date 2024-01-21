<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserBooks;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    public function index () {
        $books = Book::all();
        return view('library', compact('books'));
    }

    public function refresh (Request $request) {
        $bookData = $request->session()->get('filtered_books', []);
        $bookIds = collect($bookData)->pluck('id')->toArray();
        $books = Book::whereIn('id', $bookIds)->get();
        return view('library', compact('books'));
    }

    public function searchBooks(Request $request) {
        $search = $request->input('search');
        $books = DB::table('books')
            ->where('nazov', 'like','%'.$search.'%')
            ->orWhere('autori', 'like', '%'.$search.'%')
            ->get();
        return view('library', ['books' => $books]);
    }

    public function searchBooksFilters(Request $request) {
        $authors = $request->input('authors');
        $category = $request->input('category');
        $releaseYear = $request->input('releaseYear');
        $query = Book::query();
        if ($authors[0] !== null) {
            $query->orWhere(function($query) use ($authors) {
                foreach ($authors as $author) {
                    $query->orWhere('autori', 'like', '%' . $author . '%');
                }
            });
        }
        if ($category !== "empty") {
            $categoryId = DB::table('categories')->where('nazov_kategorie', $category)->value('id');
            if ($categoryId) {
                $query->where('kategoria_id', $categoryId);
            }
        }
        if ($releaseYear !== "empty") {
            $query->where('rok_vydania', $releaseYear);
        }
        $books = $query->get();
        $request->session()->put('filtered_books', $books->toArray());
        $redirectUrl = route('library.refresh');
        return response()->json(['redirect' => $redirectUrl]);
    }

    public function buyBook($userId, $bookId) {
        try {
            UserBooks::create([
                'pouzivatel_id' => $userId,
                'kniha_id' => $bookId,
                'stav' => 'K',
                'oblubena' => 0,
                'aktualna_strana' => 0
            ]);
            return response()->json(['message' => 'Kniha bola úspešne kúpená!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Knihu už máte kúpenú!'], 500);
        }
    }

    public function borrowBook($userId, $bookId) {
        try {
            $returnDate = Carbon::now()->addDays(30);
            UserBooks::create([
                'pouzivatel_id' => $userId,
                'kniha_id' => $bookId,
                'stav' => 'P',
                'pozicane_do' => $returnDate
            ]);
            return response()->json(['message' => 'Kniha bola úspešne požičaná!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Knihu už máte požičanú!'], 500);
        }
    }

    public function updateBook($bookId) {
        $book = Book::find($bookId);
        return view('addBook', ['book' => $book]);
    }

    public function deleteBook($bookId) {
        $book = Book::find($bookId);
        if ($book) {
            UserBooks::where('kniha_id', $bookId)->delete();
            $book->delete();
        }
        return redirect()->route('library');
    }
}
