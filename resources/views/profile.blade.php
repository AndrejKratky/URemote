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
    <div class="container mt-4">
        <h1>Vitaj, {{Auth::user()->meno}}!</h1>
        <div class="row">
            <div class="col-md-4">
                @if ($user->obrazok_profil && $user->obrazok_profil != 'defaultProfilePicture.png')
                    <img src="{{ Storage::disk('public')->url($user->obrazok_profil) }}" alt="Profile Picture" class="obrProfil">
                @else
                    <img src="{{ asset('images/defaultProfilePicture.png') }}" alt="Profile Picture" class="obrProfil">
                @endif

            </div>
            <div class="col-md-8">
                <h3>Meno: {{Auth::user()->meno}}</h3>
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

        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Zmeň meno</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="New Name">
            </div>
            <button type="submit" class="btn btn-primary">Zmeň meno</button>
        </form>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="password" class="form-label">Zmeň heslo</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
            </div>
            <button type="submit" class="btn btn-primary">Aktualizuj heslo</button>
        </form>

        <form action="" method="POST">
            <button type="submit" class="btn btn-danger mt-3">Odstráň účet</button>
        </form>
    </div>
@endsection
