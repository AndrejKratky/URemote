@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/library.css")}}">
@endsection

@section('custom_head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('banner')
    <div class="container-fluid mainHeaderBanner">
        <img src="{{ asset('images/logoText.png') }}" class="img-fluid logoWebu" alt="logo">
    </div>
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Moja Knižnica</h2>
        @if(count($userBooks) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Názov</th>
                    <th>Autor(i)</th>
                    <th>Stav</th>
                    <th>Požičané do</th>
                    <th>Aktuálna strana</th>
                    <th>Čítaj</th>
                    <th>Stiahni</th>
                    <th>Obľúbené</th>
                </tr>
                </thead>
                <tbody>
                @foreach($userBooks as $userBook)
                    <tr>
                        <td>{{ $userBook->book->nazov }}</td>
                        <td>{{ $userBook->book->autori }}</td>
                        <td>{{ $userBook->stav }}</td>
                        <td>{{ $userBook->pozicane_do }}</td>
                        <td>{{ $userBook->aktualna_strana }} z {{ $userBook->book->pocet_stran }}</td>
                        <td>
                            <a class="d-flex justify-content-center" href="#">
                                <i class="bi bi-book"></i>
                            </a>
                        </td>
                        <td>
                            <a class="d-flex justify-content-center" href="#">
                                <i class="bi bi-download"></i>
                            </a>
                        </td>
                        <td>
                            <a class="d-flex justify-content-center favouriteLink" data-user-book-id="{{ $userBook->book->id }}">
                                @if($userBook->oblubena)
                                    <i class="bi bi-heart-fill"></i>
                                @else
                                    <i class="bi bi-heart"></i>
                                @endif
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Prazdna kniznica</p>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="{{asset("js/myLibrary.js")}}"></script>
@endsection
