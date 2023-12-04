<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>URemote</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset("images/ikonaWebu.png")}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset("css/login.css")}}">
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
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Domov</a>
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
                <li class = "nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Moja Knižnica</a>
                </li>
                <li class = "nav-item">
                    <a class="nav-link active" aria-current="page" href="prihlasovanie.html">Prihlásenie</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--Content-->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-6 loginContent">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4 loginText">Prihlásenie</h2>
                    <form action = "{{route('login.action')}}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="username">Prihlasovacie meno:</label>
                            <input type="text" id="meno" name="meno" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Heslo:</label>
                            <input type="password" id="heslo" name="heslo" class="form-control" required>
                        </div>

                        <div class="row d-none d-sm-flex">
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col d-flex justify-content-center text-nowrap">
                                Nemáte účet?
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-light">Prihlásenie</button>
                            </div>
                            <div class="col-12 col-sm-4 d-flex justify-content-center">
                                <a href="index.html" id="zabudnuteHesloHyperLink" class="text-nowrap">Zabudli ste heslo?</a>
                            </div>
                            <div class="col-12 col-sm-4 d-flex justify-content-center">
                                <!--<button type="submit" class="btn btn-light">Registrácia</button>-->
                                <a href="{{route('register')}}" class="btn btn-light">Registrácia</a>
                            </div>
                        </div>
                    </form>
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
