<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        return view('addBook');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nazov' => 'required',
            'autori' => 'required',
            'cena_kupit' => 'required',
            'cena_pozicat' => 'required',
            'rok_vydania' => 'required',
            'fakulta' => 'required',
            'pocet_stran' => 'required',
            'popis_obsahu' => 'required'
        ]);

        $book = new Book();
        return $this->changeBooksData($request, $book);
    }

    public function update(Request $request, $bookId) {
        $request->validate([
            'nazov' => 'required',
            'autori' => 'required',
            'cena_kupit' => 'required',
            'cena_pozicat' => 'required',
            'rok_vydania' => 'required',
            'fakulta' => 'required',
            'pocet_stran' => 'required',
            'popis_obsahu' => 'required'
        ]);

        $book = Book::find($bookId);
        return $this->changeBooksData($request, $book);
    }

    public function changeBooksData(Request $request, $book): \Illuminate\Http\RedirectResponse
    {
        $book->nazov = $request->nazov;
        $book->autori = $request->autori;
        $book->cena_kupit = $request->cena_kupit;
        $book->cena_pozicat = $request->cena_pozicat;
        $book->rok_vydania = $request->rok_vydania;
        $book->fakulta = $request->fakulta;
        $book->pocet_stran = $request->pocet_stran;
        if ($request->has('pouzit_predvoleny')) {
            $defaultCoverPath = 'images/defaultBookThumbnail.jpg';
            $book->obal_knihy = $defaultCoverPath;
        } else {
            $request->validate(['obal_knihy' => 'required|image|max:2048']);
            $path = $request->file('obal_knihy')->store('book_covers', 'public');
            $book->obal_knihy = $path;
        }
        $book->popis_obsahu = $request->popis_obsahu;
        $book->save();
        return redirect()->route('addBook');
    }
}
