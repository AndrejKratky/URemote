@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/addBook.css")}}">
@endsection

@section('banner')
    <div class="container-fluid mainHeaderBanner">
        <img src="{{asset("images/logoText.png")}}" class="img-fluid logoWebu" alt="logo">
    </div>
@endsection

@section('content')
    <div class="container mt-4 mb-4">
        <h2>Pridaj nový titulok</h2>
        <form id="addBookForm" action="{{route('addBook.insert')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="bookName" class="form-label">Názov titulku</label>
                <input type="text" class="form-control" id="bookName" name="nazov">
            </div>

            <div class="mb-3">
                <label for="bookAuthors" class="form-label">Autor(i) (formát: Meno_Priezvisko,Meno_Priezvisko, ...)</label>
                <input type="text" class="form-control" id="bookAuthors" name="autori">
            </div>

            <div class="mb-3">
                <label for="bookPrice" class="form-label">Cena kúpy (formát: číslo ALEBO číslo.číslo)</label>
                <input type="text" class="form-control" id="bookPrice" name="cena_kupit">
            </div>

            <div class="mb-3">
                <label for="bookPriceBorrow" class="form-label">Cena vypožičania (formát: číslo ALEBO číslo.číslo)</label>
                <input type="text" class="form-control" id="bookPriceBorrow" name="cena_pozicat">
            </div>

            <div class="mb-3">
                <label for="bookYear" class="form-label">Rok vydania</label>
                <select class="form-control" id="bookYear" name="rok_vydania"></select>
            </div>

            <div class="mb-3">
                <label for="bookFaculty" class="form-label">Fakulta</label>
                <input type="text" class="form-control" id="bookFaculty" name="fakulta">
            </div>

            <div class="mb-3">
                <label for="bookPages" class="form-label">Pocet stran</label>
                <input type="text" class="form-control" id="bookPages" name="pocet_stran">
            </div>

            <div class="mb-2">
                <label for="bookCover" class="form-label">Obal knihy (cesta k súboru)</label>
                <input type="file" class="form-control" id="bookCover" name="obal_knihy" accept="image/png, image/jpeg">
            </div>

            <div class="mb-3 ms-3">
                <input type="checkbox" id="defaultCover" name="pouzit_predvoleny">
                <label for="defaultCover">Použiť predvolený obrázok</label>
            </div>

            <div class="mb-3">
                <label for="bookDescription" class="form-label">Popis obsahu titulku</label>
                <textarea class="form-control" id="bookDescription" name="popis_obsahu"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Pridaj do databázy</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{asset("js/addBook.js")}}"></script>
@endsection
