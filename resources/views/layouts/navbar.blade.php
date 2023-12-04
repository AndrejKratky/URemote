<nav class="navbar navbar-expand-lg mainNav">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('library') }}">Prehľadaj Knižnicu</a>
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
                            <li><a class="dropdown-item" href="{{route('profile')}}">Môj Profil</a></li>
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
