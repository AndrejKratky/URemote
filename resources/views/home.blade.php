<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>URemote</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../public/images/ikonaWebu.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
</head>
<body>
<!--BANNER-->
<div class="container-fluid d-flex justify-content-center align-items-center mainHeaderBanner">
    <img src="{{asset("images/logo.png")}}" class="img-fluid logoWebu" alt="logo">
</div>

<!--NAV-->
<nav class="navbar navbar-expand-lg mainNav">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="prehladavacKnih.html">Prehľadaj Knižnicu</a>
                </li>
            </ul>

            <ul class="navbar-nav me-0 mb-2 mb-lg-0">
                <li>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 hladajTitulokLabel" type="search" placeholder="Zadaj názov hľadaného titulku..." aria-label="Search">
                        <button type="button" class="btn btn-outline-light">Hľadaj</button>
                    </form>
                </li>

                <!-- LOGIN CHECK -->
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->meno }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Moja Knižnica</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Odhlásiť sa
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Prihlásenie</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!--Content-->
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
                <div class="row mb-2">
                    <div class="col-lg-3 d-flex justify-content-center">
                        <img src="{{asset("images/bookThumbnails/kniha1.jpg")}}" alt="Civilná ochrana a riešenie krízových javov">
                    </div>
                    <div class="col-lg-9">
                        <h4>Civilná ochrana a riešenie krízových javov</h4>
                        <h5>Jozef Kubás, Mária Polorecká, Patrik Mitrenga</h5>
                        <p class="popisTituluNovinky">
                            Problematika civilnej ochrany a krízových javov je veľmi aktuálna, avšak venuje sa jej málo knižných publikácií a je pomerne málo propagovaná medzi širokou verejnosťou. Aj to bol dôvod vzniku vysokoškolskej učebnice, ktorá zjednocuje a prehľadne prezentuje civilnú ochranu v kontexte krízového manažmentu, ako aj samotné postupy na riešenie krízových javov. V učebnici sú logicky a metodicky usporiadané informácie o civilnej ochrane, krízovom manažmente a integrovanom záchrannom systéme v prostredí Slovenskej republiky. Následne približuje problematiku environmentálnych a prírodných krízových javov a poskytuje základné informácie o možnostiach ich riešenia. Približuje tiež špecifikácie vzniknutých situácií a očakávané zvláštnosti, ktoré sa môžu vyskytnúť pri riešení udalosti.
                        </p>
                        <a href="#" class="btn btn-primary">Kúpiť</a>
                        <a href="#" class="btn btn-primary">Vypožičať</a>
                        <a href="#" class="btn btn-primary">Čítať</a>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-lg-3 d-flex justify-content-center">
                        <img src="{{asset("images/bookThumbnails/kniha2.jpg")}}" alt="Civilná ochrana a riešenie krízových javov">
                    </div>
                    <div class="col-lg-9">
                        <h4>Micro:bit krok za krokem: praktický úvod do programování a elektroniky</h4>
                        <h5>Martin Malý</h5>
                        <p class="popisTituluNovinky">
                            Kniha „Micro:bit krok za krokom“ je určená ako pre úplných začiatočníkov, ktorí sa ešte len s Micro:bitom a programovaním zoznamujú, tak aj pre pokročilejších užívateľov, ktorí už majú skúsenosti s elektronikou a programovaním. Súčasťou knihy sú aj príklady, námety na pokusy a hry, alebo aj stručné „ťaháky“ a metodické listy, takže kniha nájde využitie nielen doma, ale aj pri výučbe v školách. V knihe sú popísané aj najpoužívanejšie kity a rozširujúce moduly, ktoré sú v Českej republike dostupné. Autor pre začiatočnícky výklad využíva prevažne programovanie pomocou začiatočníckeho blokového editora MakeCode. Kniha ale obsahuje aj referenčnú príručku pre programovanie v JavaScripte či Pythone a venuje sa aj pokročilejším témam, ako je interný front správ v operačnom systéme Micro:bitu alebo tvorba vlastných rozšírení (teda knižníc). Kniha tak predstavuje prvý slovenský ucelený materiál o výukovej platforme Micro:bit, vhodný ako pre začiatočníkov, tak pre pokročilých.
                        </p>
                        <a href="#" class="btn btn-primary">Kúpiť</a>
                        <a href="#" class="btn btn-primary">Vypožičať</a>
                        <a href="#" class="btn btn-primary">Čítať</a>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-lg-3 d-flex justify-content-center">
                        <img src="{{asset("images/bookThumbnails/kniha3.jpg")}}" alt="Civilná ochrana a riešenie krízových javov">
                    </div>
                    <div class="col-lg-9">
                        <h4>Klimatická krize a zelená dohoda</h4>
                        <h5>Noam Chomsky, Robert Pollin, C. J. Polychroniou</h5>
                        <p class="popisTituluNovinky">
                            Noam Chomsky, filozof, lingvista, spoločenský kritik a aktivista, a Robert Pollin v tejto knihe mapujú katastrofické dôsledky nekontrolovanej zmeny klímy a predstavujú plán zmeny. Ľudstvo musí prestať spaľovať fosílne palivá a urobiť tak spôsobom, ktorý zlepší životnú úroveň obyvateľov. To je cieľom zelenej dohody a, ako autori objasňujú, je to úplne uskutočniteľné. Chomsky s Pollinom argumentujú proti obavám, ktoré vyplývajú z prechodu na zelenú ekonomiku, a vysvetľujú, ako tieto falošné obavy podporujú popieranie klímy. Táto kniha ukazuje, ako možno politicky aj ekonomicky prekonať klimatickú krízu.
                        </p>
                        <a href="#" class="btn btn-primary">Kúpiť</a>
                        <a href="#" class="btn btn-primary">Vypožičať</a>
                        <a href="#" class="btn btn-primary">Čítať</a>
                    </div>
                </div>
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
                    <div class="row mb-4">
                        <div class="col-lg-2 text-center">
                            <img src="{{asset("images/reviewsProfilePictures/recenziaObr1.png")}}" alt="User Avatar" class="img-fluid rounded-circle" style="width: 80px; height: 80px;">
                            <h5 class="mt-2">Janko Hraško</h5>
                        </div>
                        <div class="col-lg-10">
                            <div class="mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p>Ocenil som jednoduchosť a rýchlosť pri výbere a požičaní kníh na tejto stránke. Vďaka mesačnému predplatnému mám prístup k mnohým učebnicám za skvelú cenu. Určite budem odporúčať ostatným študentom!</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-2 text-center">
                            <img src="{{asset("images/reviewsProfilePictures/recenziaObr2.png")}}" alt="User Avatar" class="img-fluid rounded-circle" style="width: 80px; height: 80px;">
                            <h5 class="mt-2">Zuzka Nováková</h5>
                        </div>
                        <div class="col-lg-10">
                            <div class="mb-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <p>Stránka ponúka skvelý výber akademických kníh a predplatné je cenovo dostupné. Avšak rozhranie by mohlo byť trochu intuitívnejšie, občas som mala problém nájsť, čo som hľadala. Bolo by skvelé, keby ste to v budúcnosti vylepšili.</p>
                        </div>
                    </div>
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
                        <a href="#" class="btn btn-success w-100">Zakúpiť predplatné</a>
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
                        <a href="#" class="btn btn-success w-100">Zakúpiť predplatné</a>
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
                        <a href="#" class="btn btn-success w-100">Zakúpiť predplatné</a>
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
                        <a href="#" class="btn btn-success w-100">Zakúpiť predplatné</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--FOOTER-->
<div class="container-fluid footer">
    <div class="row footerItem">
        <div class="col">
            Kontakt
        </div>
        <div class="col footerItem text-nowrap">
            Technická Pomoc
        </div>
    </div>
</div>
</body>
</html>
