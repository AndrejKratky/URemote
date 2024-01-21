@extends('layouts.app')
@section('custom_head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('custom_css')
    <link rel="stylesheet" href="{{asset("css/review.css")}}">
@endsection
@section('banner')
    <div class="container-fluid d-flex justify-content-center align-items-center mainHeaderBanner">
        <img src="{{asset("images/logo.png")}}" class="img-fluid logoWebu" alt="logo">
    </div>
@endsection
@section('content')
    <div class="container mt-5 content">
        <h3>Napíšte svoju recenziu</h3>
        <div class="form-group">
            <div class="star-container" data-rating="0">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <div id="warningContainer"></div>
            <label for="reviewText"></label>
            <textarea class="form-control" id="reviewText" rows="5"></textarea>
            @if ($what === 'website')
                <form method="POST" action="{{ route('write.website') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-primary btnSend">Odoslať recenziu</button>
                </form>
            @else
                <a href="{{ route('write.book', ['what' => $what]) }}" class="btn btn-primary mt-3 btnSend">Odoslať recenziu</a>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/94de649954.js" crossorigin="anonymous"></script>
    <script src="{{asset("js/review.js")}}"></script>
@endsection
