@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/profile.css")}}">
@endsection

@section('banner')
    <div class="container-fluid d-flex justify-content-center align-items-center mainHeaderBanner">
        <img src="{{asset("images/logo.png")}}" class="img-fluid logoWebu" alt="logo">
    </div>
@endsection

@section('content')
    <div class="container mt-4 mb-4">
        <h1>Vitaj, {{$user->meno}}!</h1>
        <div class="row">
            <div class="col-md-4">
                @if ($user->obrazok_profil != 'images/defaultProfilePicture.png')
                    <img src="{{ Storage::disk('public')->url($user->obrazok_profil) }}" alt="Profile Picture" class="obrProfil">
                @else
                    <img src="{{ asset('images/defaultProfilePicture.png') }}" alt="Profile Picture" class="obrProfil">
                @endif
            </div>
            <div class="col-md-8">
                <h3>Meno: {{$user->meno}}</h3>
                <h4>
                    Predplatné:
                    @if($user->stav_uctu == 'F')
                        <span class="badge text-bg-secondary">URemote Free</span>
                    @elseif($user->stav_uctu == 'U')
                        <span class="badge text-bg-primary">URemote Standard</span>
                    @elseif($user->stav_uctu == 'P')
                        <span class="badge text-bg-warning">URemote Premium</span>
                    @elseif($user->stav_uctu == 'S')
                        <span class="badge text-bg-success">URemote Student</span>
                    @elseif($user->stav_uctu == 'L')
                        <span class="badge text-bg-info">URemote Lecturer</span>
                    @endif
                </h4>
                <p><strong>Email:</strong> email</p>
                <form action="{{route('profile.update.picture')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="profilePicture" class="form-label">Zmeň profilový obrázok</label>
                        <input type="file" class="form-control" id="profilePicture" name="obrazok_profil">
                    </div>
                    <button type="submit" class="btn btn-primary">Nahraj obrázok</button>
                </form>
            </div>
        </div>

        <form action="{{ route('profile.update.name') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="meno" class="form-label"></label>
                <input type="text" class="form-control" id="meno" name="meno" placeholder="Zadajte Vaše nové používateľské meno...">
            </div>
            <button type="submit" class="btn btn-primary">Zmeň meno</button>
        </form>

        <form action="{{ route('profile.update.password') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="heslo" class="form-label"></label>
                <input type="password" class="form-control" id="heslo" name="heslo" placeholder="Zadajte Vaše nové heslo...">
            </div>
            <button type="submit" class="btn btn-primary">Aktualizuj heslo</button>
        </form>

        <form action="{{ route('profile.delete.user') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Odstráň účet</button>
        </form>
    </div>
@endsection
