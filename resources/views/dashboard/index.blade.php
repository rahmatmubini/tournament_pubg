@extends('dashboard.layouts.main')

@section('container')
<div class="pt-5">
    <a class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out" href="/profile">MY PROFILE</a>
    <a class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out" href="/certificate">MY CERTIFICATE</a>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <h1 class="h2 font-bold">Selamat Datang, {{ auth()->user()->name }}</h1>
</div>
@endsection