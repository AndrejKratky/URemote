<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookInfoController extends Controller
{
    public function index($bookId) {
        $book = Book::find($bookId);
        return view('bookInfo', ['book' => $book]);
    }
}
