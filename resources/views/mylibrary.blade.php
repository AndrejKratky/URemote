@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/library.css")}}">
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
                        <td>{{ $userBook->nazov }}</td>
                        <td>{{ $userBook->autori }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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

@endsection
