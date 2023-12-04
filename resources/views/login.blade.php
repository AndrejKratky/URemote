@extends('layouts.app')
@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/login.css")}}">
@endsection
@section('banner')
    <div class="container-fluid d-flex justify-content-center align-items-center mainHeaderBanner">
        <img src="{{asset("images/logo.png")}}" class="img-fluid logoWebu" alt="logo">
    </div>
@endsection
@section('content')
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
@endsection
