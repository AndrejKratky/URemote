@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/home.css")}}">
@endsection

@section('banner')
    <div class="container-fluid d-flex justify-content-center align-items-center mainHeaderBanner">
        <img src="{{asset("images/logo.png")}}" class="img-fluid logoWebu" alt="logo">
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 mt-3">
                <ul class="nav flex-column list-group hlavnaNavigacia">
                    <li class="list-group-item">
                        <a class="nav-link" href="#novinky">Novinky</a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="#oNas">O Nás</a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="#spatnaVazba">Spätná Väzba</a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="#predplatne">Predplatné</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div id="novinky">
                    <h2>Novinky</h2>
                    @foreach($books as $book)
                        <div class="row mb-2">
                            <div class="col-lg-3 d-flex justify-content-center">

                                @if ($book->obal_knihy != 'images/defaultBookThumbnail.jpg')
                                    <img src="{{ Storage::disk('public')->url($book->obal_knihy) }}" alt="{{ $book->nazov }}">
                                @else
                                    <img src="{{ asset('images/defaultBookThumbnail.jpg') }}" alt="{{ $book->nazov }}">
                                @endif
                            </div>
                            <div class="col-lg-9">
                                <h4><a href="/bookInfo/{{ $book->id }}">{{ $book->nazov }}</a></h4>
                                <h5>{{ str_replace('_', ' ', $book->autori) }}</h5>
                                <p class="popisTituluNovinky">
                                    {{ $book->popis_obsahu }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="oNas">
                    <div class = "row mt-4">
                        <div class = "col-lg-8">
                            <h2>O Nás</h2>
                            <p>Víta Vás URemote! Sme platformou, ktorá bola založená za jediným cieľom, a to uľahčiť študentom prístup k akademickým titulom.</p>
                            <p>Zakladateľom tejto platformy je tím nadšených študentov, ktorí sami zažili výzvy spojené s hľadaním správnych učebných materiálov počas svojich študentských rokov. Rozhodli sme sa tieto výzvy premeniť na príležitosť a vytvoriť platformu, ktorá umožňuje študentom nie len si zakúpiť daný titulok, ale aj získať prístup ku všetkým akademickým titulom, a to všetko v elektronickej forme.</p>
                            <p>Naše poslanie je jednoduché: Ponúknuť jednoduchý, cenovo dostupný a spoľahlivý spôsob, ako získať kvalitné akademické materiály. Sme hrdí na to, že dokážeme priblížiť vzdelanie každému študentovi bez ohľadu na jeho finančnú situáciu.</p>
                            <p>V snahe neustále sa zlepšovať, vítame spätnú väzbu od našich používateľov. Ak máte akékoľvek otázky, pripomienky alebo návrhy, neváhajte nás kontaktovať. Veríme v silu vzdelania a spoločne môžeme formovať budúcnosť študentov na Slovensku.</p>
                        </div>
                        <div class = "col-lg-4 ps-0 mt-2">
                            <img src="{{asset("images/oNas.jpg")}}" alt="O Nás" id="oNasObr">
                        </div>
                    </div>

                </div>

                <div id="spatnaVazba">
                    <h2>Spätná väzba od používateľov</h2>
                    <div class="container mt-5">
                        @foreach($reviews as $review)
                            <div class="row mb-4">
                                <div class="col-lg-2 text-center">
                                    @if ($review->user->obrazok_profil != 'images/defaultProfilePicture.png')
                                        <img src="{{ Storage::disk('public')->url($review->user->obrazok_profil) }}" alt="User Avatar" class="img-fluid rounded-circle" style="width: 80px; height: 80px;">
                                    @else
                                        <img src="{{ asset('images/defaultProfilePicture.png') }}" alt="User Avatar" class="img-fluid rounded-circle" style="width: 80px; height: 80px;">
                                    @endif
                                    <h5 class="mt-2">{{ $review->user->meno }}</h5>
                                </div>
                                <div class="col-lg-10">
                                    <div class="mb-2">
                                        @php
                                            $filledStars = floor($review->rating);
                                        @endphp
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $filledStars)
                                                <i class="bi bi-star-fill"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <p>{{ $review->review_text }}</p>
                                </div>
                            </div>
                        @endforeach
                            @auth
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <a href="{{ route('write', ['what' => 'website']) }}" class="btn btn-primary">Napísať recenziu</a>
                                </div>
                            </div>
                            @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Subscription-->
    <div class="container mt-5" id="predplatne">
        <h2 class="mb-4 text-center">Predplatné</h2>

        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-3"></div>
            <div class="col-lg-3 mb-2 text-center">
                <span class="badge text-bg-warning" id="textStudentPlan"><i class="bi bi-stars"></i>Populárna voľba<i class="bi bi-stars"></i></span>
            </div>
            <div class="col-lg-3"></div>
        </div>

        <div class="row">
            <div class="col-xl-3 mb-4 planColumn">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>URemote Standard</h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <ul>
                            <li>Prístup ku všetkým akademickým titulom</li>
                            <li>Podporované formáty: pdf</li>
                        </ul>
                        <div class="mt-auto">
                            <h3 class="card-text text-center">5€ / mesiac</h3>
                            <form action="{{route('update.plan', 'standard')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success w-100">Zakúpiť predplatné</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 mb-4 planColumn">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>URemote Premium</h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <ul>
                            <li>Prístup ku všetkým akademickým titulom</li>
                            <li>Podporované formáty: pdf, MS Word(doc, docx), rft</li>
                            <li>Podpora offline čítania v našej mobilnej aplikácií</li>
                        </ul>
                        <div class="mt-auto">
                            <p class="card-text text-center" id="premiumText">8,50€/mesiac alebo 80€/rok</p>
                            <form action="{{route('update.plan', 'premium')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success w-100">Zakúpiť predplatné</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 mb-4 planColumn">
                <div class="card" id="studentPlan">
                    <div class="card-header text-center">
                        <h5>URemote Student</h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <ul>
                            <li>Prístup ku všetkým akademickým titulom</li>
                            <li>Podporované formáty: pdf, MS Word(doc, docx)</li>
                        </ul>
                        <div class="mt-auto">
                            <h3 class="card-text text-center">35€ / 1 akademický rok</h3>
                            <form action="{{route('update.plan', 'student')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success w-100">Zakúpiť predplatné</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 mb-4 planColumn">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>URemote Lecturer</h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <ul>
                            <li>Prístup ku všetkým akademickým titulom</li>
                            <li>Podporované formáty: pdf, MS Word(doc, docx), rft</li>
                            <li>Prístup ku všetkým akademickým knihám s možnosťou vytvárania vlastných zbierok/kurzov pre študentov</li>
                            <li>Možnosť zdieľania konkrétnych kapitol kníh so študentami</li>
                        </ul>
                        <div class="mt-auto">
                            <h3 class="card-text text-center">20€ / 1 akademický rok</h3>
                            <form action="{{route('update.plan', 'lecturer')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success w-100">Zakúpiť predplatné</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
