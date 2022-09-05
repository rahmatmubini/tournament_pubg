<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rahmatpedia</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white">
    @include('layouts.header')

<div class="container mt-4">
    @yield('container')
</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>