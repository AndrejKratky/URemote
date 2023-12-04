@extends('layouts.app')
@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/library.css")}}">
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
                    <div class="card mb-1">
                        <div class="row g-0">
                            <div class="col-lg-1 d-none d-lg-flex align-items-center justify-content-center">
                                <img src="images/bookThumbnails/kniha1.jpg" alt="Book Cover" class="img-fluid" data-bs-toggle="modal" data-bs-target="#kniha1">
                            </div>
                            <div class="modal fade" id="kniha1" tabindex="-1" role="dialog" aria-labelledby="kniha1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="images/bookThumbnails/kniha1.jpg" class="img-fluid d-block mx-auto" alt="Book Cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col-lg-8">
                                <div class="card-body">
                                    <h5 class="card-title">Civilná ochrana a riešenie krízových javov</h5>
                                    <h6>Jozef Kubás, Mária Polorecká, Patrik Mitrenga</h6>
                                    <a href="podrobnostiKnihy.html" class="text-nowrap">Zobraz podrobnosti</a>
                                </div>
                            </div>
                            <div class="col-4 col-lg-3 d-flex flex-column justify-content-center">
                                <button class="btn btn-success" type="submit"><i class="bi bi-cart"></i> Kúpiť</button>
                                <button class="btn btn-success" type="submit"><i class="bi bi-calendar"></i> Vypožičať</button>
                                <button class="btn btn-success" type="submit"><i class="bi bi-book"></i> Čítať</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-1">
                        <div class="row g-0">
                            <div class="col-lg-1 d-none d-lg-flex align-items-center justify-content-center">
                                <img src="images/bookThumbnails/kniha2.jpg" alt="Book Cover" class="img-fluid" data-bs-toggle="modal" data-bs-target="#kniha2">
                            </div>
                            <div class="modal fade" id="kniha2" tabindex="-1" role="dialog" aria-labelledby="kniha2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="images/bookThumbnails/kniha2.jpg" class="img-fluid d-block mx-auto" alt="Book Cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col-lg-8">
                                <div class="card-body">
                                    <h5 class="card-title">Micro:bit krok za krokem: praktický úvod do programování a elektroniky</h5>
                                    <h6>Martin Malý</h6>
                                    <a href="podrobnostiKnihy.html" class="text-nowrap">Zobraz podrobnosti</a>
                                </div>
                            </div>
                            <div class="col-4 col-lg-3 d-flex flex-column justify-content-center">
                                <button class="btn btn-success" type="submit"><i class="bi bi-cart"></i> Kúpiť</button>
                                <button class="btn btn-success" type="submit"><i class="bi bi-calendar"></i> Vypožičať</button>
                                <button class="btn btn-success" type="submit"><i class="bi bi-book"></i> Čítať</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-1">
                        <div class="row g-0">
                            <div class="d-none col-lg-1 d-lg-flex align-items-center justify-content-center">
                                <img src="images/bookThumbnails/kniha3.jpg" alt="Book Cover" class="img-fluid" data-bs-toggle="modal" data-bs-target="#kniha3">
                            </div>
                            <div class="modal fade" id="kniha3" tabindex="-1" role="dialog" aria-labelledby="kniha3" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="images/bookThumbnails/kniha3.jpg" class="img-fluid d-block mx-auto" alt="Book Cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col-lg-8">
                                <div class="card-body">
                                    <h5 class="card-title">Klimatická krize a zelená dohoda</h5>
                                    <h6>Noam Chomsky, Robert Pollin, C. J. Polychroniou</h6>
                                    <a href="podrobnostiKnihy.html" class="text-nowrap">Zobraz podrobnosti</a>
                                </div>
                            </div>
                            <div class="col-4 col-lg-3 d-flex flex-column justify-content-center">
                                <button class="btn btn-success" type="submit"><i class="bi bi-cart"></i> Kúpiť</button>
                                <button class="btn btn-success" type="submit"><i class="bi bi-calendar"></i> Vypožičať</button>
                                <button class="btn btn-success" type="submit"><i class="bi bi-book"></i> Čítať</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-1">
                        <div class="row g-0">
                            <div class="d-none col-lg-1 d-lg-flex align-items-center justify-content-center">
                                <img src="images/bookThumbnails/kniha4.jpg" alt="Book Cover" class="img-fluid" data-bs-toggle="modal" data-bs-target="#kniha4">
                            </div>
                            <div class="modal fade" id="kniha4" tabindex="-1" role="dialog" aria-labelledby="kniha4" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="images/bookThumbnails/kniha4.jpg" class="img-fluid d-block mx-auto" alt="Book Cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col-lg-8">
                                <div class="card-body">
                                    <h5 class="card-title">Podnikanie v doprave</h5>
                                    <h6>Bibiána Buková, Eva Brumerčíková</h6>
                                    <a href="podrobnostiKnihy.html" class="text-nowrap">Zobraz podrobnosti</a>
                                </div>
                            </div>
                            <div class="col-4 col-lg-3 d-flex flex-column justify-content-center">
                                <button class="btn btn-success" type="submit"><i class="bi bi-cart"></i> Kúpiť</button>
                                <button class="btn btn-success" type="submit"><i class="bi bi-calendar"></i> Vypožičať</button>
                                <button class="btn btn-success" type="submit"><i class="bi bi-book"></i> Čítať</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset("js/library.js")}}"></script>
@endsection
