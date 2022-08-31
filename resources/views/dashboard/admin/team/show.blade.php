@extends('dashboard.admin.layouts.main')

@section('container')

<div class="container">
    <div class="row mt-3 mb-5 text-2xl text-center">
        <h1 class="text-center mb-10 mt-3 text-5xl font-mono font-bold">{{ $tournament->title }}</h1>

        <p class="text-3xl">Nama Team : {{ $team->name }}</p>
        <hr class="my-3">
        <p>Player 1 : {{ $team->player1 }}</p>
        <p>Id Player : {{ $team->idPlayer1 }}</p>
        <hr class="my-3">
        <p>Player 2 : {{ $team->player2 }}</p>
        <p>Id Player : {{ $team->idPlayer2 }}</p>
        <hr class="my-3">
        <p>Player 3 : {{ $team->player3 }}</p>
        <p>Id Player : {{ $team->idPlayer3 }}</p>
        <hr class="my-3">
        <p>Player 4 : {{ $team->player4 }}</p>
        <p>Id Player : {{ $team->idPlayer4 }}</p>
    </div>

    
</div>
@endsection