@extends('layouts.app')
@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/library.css")}}">
@endsection
@section('custom_head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('banner')
    <div class="container-fluid mainHeaderBanner">
        <img src="{{asset("images/logoText.png")}}" class="img-fluid logoWebu" alt="logo">
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-md-3">
                <form id="filterForm">
                    <div class="mb-3">
                        <div id="autorContainer">
                            <label for="autor" class="form-label">Autor(i)</label>
                            <input type="text" class="form-control mb-2" id="autor" name="author[]" placeholder="Zadajte meno autora...">
                        </div>
                        <button type="button" class="btn btn-light mb-3" onclick="addAuthor()">Pridaj autora</button>
                        <button type="button" class="btn btn-light mb-3" onclick="removeAuthor()">Odstáň autora</button>
                    </div>

                    <div class="mb-3">
                        <label for="ciastkovaKniznica" class="form-label">Čiastková knižnica</label>
                        <select class="form-control" id="ciastkovaKniznica">
                            <option>Katedra matematiky</option>
                            <option>Katedra aplikovanej matematiky</option>
                            <option>Ústav informačných a komunikačných technológií</option>
                            <option>Katedra matematických metód</option>
                            <option>Katedra kvantit. metód a hosp. informatiky</option>
                            <option>Autorizované a tréningové centrum</option>
                            <option>Katedra geotechniky</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="rokVydania" class="form-label">Rok vydania</label>
                        <select class="form-control" id="rokVydania"></select>
                    </div>
                    <button type="submit" class="btn btn-light">Aplikuj filtre</button>
                </form>

                @if (Auth::check() && Auth::user()->meno == 'admin')
                    <a href="{{route('addBook')}}" class="btn btn-light" style="margin-top: 20px">Pridaj titulok</a>
                @endif
            </div>

            <div class="col-md-9">
                <h5 id="prehladajKniznicuLabel">Prehľadaj knižnicu</h5>
                <form id="searchForm" class="mb-4">
                    <div>
                        <label>
                            <input type="text" class="form-control" placeholder="Zadaj kľúčové slová...">
                        </label>
                        <button class="btn btn-light" type="submit">Hľadaj</button>
                    </div>
                </form>

                <div class="scrollable me-3">
                    @foreach($books as $book)
                        <div class="card mb-1">
                            <div class="row g-0">
                                <div class="col-lg-1 d-none d-lg-flex align-items-center justify-content-center">
                                    <img src="{{$book->obal_knihy}}" alt="Book Cover" class="img-fluid" data-bs-toggle="modal" data-bs-target="#kniha{{ $book->id }}">
                                </div>
                                <div class="modal fade" id="kniha{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="kniha{{ $book->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <img src="{{$book->obal_knihy}}" class="img-fluid d-block mx-auto" alt="Book Cover">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$book->nazov}}</h5>
                                        <h6>{{ str_replace('_', ' ', $book->autori) }}</h6>
                                        <a href="podrobnostiKnihy.html" class="text-nowrap">Zobraz podrobnosti</a>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-3 d-flex flex-column justify-content-center">
                                    <button class="btn btn-success btn-buy" type="submit" data-book-id="{{ $book->id }}"><i class="bi bi-cart"></i> Kúpiť</button>
                                    <button class="btn btn-success btn-borrow" type="submit" data-book-id="{{ $book->id }}"><i class="bi bi-calendar"></i> Vypožičať</button>
                                    <button class="btn btn-success btn-read" type="submit" data-book-id="{{ $book->id }}"><i class="bi bi-book"></i> Čítať</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const isAuthenticated = {{Auth::check() ? 'true' : 'false'}};
        const userId = {{ Auth::check() ? Auth::user()->id : 'null' }};
    </script>
    <script src="{{asset("js/library.js")}}"></script>
@endsection
