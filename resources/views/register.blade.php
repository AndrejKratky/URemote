@extends('layouts.app')
@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/register.css")}}">
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
                        <h2 class="text-center mb-3 loginText">Registrácia</h2>

                        <div id="errorOutput" style="color: red; margin: 0; background-color: #ffcccc; border-radius: 5px; text-align: center; display: none;"></div>

                        @if ($errors->any())
                            <div id="loginError">
                                @foreach ($errors->all() as $error)
                                    <p style="color: red; margin: 0; background-color: #ffcccc; border-radius: 5px; text-align: center">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form id="registerForm" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="row form-group mb-3">
                                <label for="username" class="col-sm-4 col-form-label">Prihlasovacie meno:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="username" name="username" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group mb-3">
                                <label for="password" class="col-sm-4 col-form-label">Heslo:</label>
                                <div class="col-sm-8">
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group mb-3">
                                <label for="email" class="col-sm-4 col-form-label">Email (nepovinné):</label>
                                <div class="col-sm-8">
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-light">Registrácia</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset("js/register.js")}}"></script>
@endsection
