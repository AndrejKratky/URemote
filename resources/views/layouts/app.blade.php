<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>URemote</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset("images/ikonaWebu.png")}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @yield('custom_css')
    @yield('custom_head')
</head>
<body>
    <!-- BANNER -->
    @yield('banner')
    <!-- NAVBAR -->
    @include('layouts.navbar')
    <!-- CONTENT -->
    @yield('content')
    <!-- FOOTER -->
    @include('layouts.footer')
    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{asset("js/app.js")}}"></script>
    @yield('scripts')
</body>
</html>
