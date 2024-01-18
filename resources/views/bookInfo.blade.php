@extends('layouts.app')
@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/bookInfo.css")}}">
@endsection
@section('banner')
    <div class="container-fluid mainHeaderBanner">
        <img src="{{asset("images/logoText.png")}}" class="img-fluid logoWebu" alt="logo">
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        @if(isset($book))
            <div class="row pt-3">
                <div class="col-md-4 text-center mb-5">
                    <img src="{{asset($book->obal_knihy)}}" alt="Book Cover" class="bookThumbnail">
                </div>

                <div class="col-md-8">
                    <div class="p-5 border rounded bookInfoContainer">
                        <h2>{{$book->nazov}}</h2>
                        <table class="table border border-light">
                            <tbody>
                            <tr>
                                <th scope="row" class="text-nowrap">Autor(i)</th>
                                <td class="text-nowrap">{{$book->autori}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-nowrap">Rok vydania</th>
                                <td class="text-nowrap">{{$book->rok_vydania}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-nowrap">Fakulta / útvar</th>
                                <td class="text-nowrap">{{$book->fakulta}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-nowrap">Počet strán</th>
                                <td class="text-nowrap">{{$book->pocet_stran}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <p>
                            {{$book->popis_obsahu}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="user-reviews p-5 mb-5">
                        <h3>Recenzie čitateľov</h3>
                    </div>
                </div>
            </div>
        @else
            <h2>Ľutujeme, ale knihu sa nepodarilo nájsť...</h2>
        @endif
    </div>

    <!-- TOP BUTTON -->
    <button id="backToTopBtn"><i class="bi bi-arrow-up-circle"></i></button>
@endsection
@section('scripts')
    <script src="{{asset("js/bookInfo.js")}}"></script>
@endsection
