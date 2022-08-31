@extends('dashboard.teams.layouts.main')

@section('container')

@foreach ($certi as $c)
@if ($c->juara)
<div class= "mx-28 mt-4">
    <div class="flex flex-wrap border-5 border-hijau bg-black h-[13cm]">
        <div class="w-full text-3xl">
            <p class="flex justify-center pt-16 text-4xl font-bold text-amber-300" >E-CERTIFICATE OF ACHIEVEMENT</p>
            <h1 class="text-base mt-2 text-center font-semibold text-hijau md:text-xl">Sertifikat ini diberikan kepada: 
        </div>
        <div class="w-md self-center px-4 mx-auto ">
            <img src="/storage/{{ $team->image }}" alt="{{ $team->name }}" class="mx-auto mb-3 w-[100px]">
            <p class="font-mono text-center text-amber-300 mt-1 text-4xl">{{ $team->name }}</p>
                <p class="font-medium text-center text-slate-400 text-xl mb-5 lg:text-xl">Juara {{ $c->juara }}</p>
            <p class="font-semibold text-base leading-relaxed text-center text-white">Turnamen <span class="text-hijau">{{ $team->tournament->title }}</span></p>
            <p class="font-semibold text-base mb-10 leading-relaxed text-center text-white">yang diselenggarakan pada <span class="text-hijau">{{ $team->tournament->matchDate }}</span>-<span class="text-hijau">{{ $team->tournament->matchAndDate }}</span>.</p>
        </div>
    </div>
    <form method="post" action="/dashboard/teams/{{ $team->slug }}/standing/certi/edit" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" class="form-control" id="team" name="team" required value="{{ $team->name }}">
        <input type="hidden" class="form-control" id="tournament" name="tournament" required value="{{ $team->tournament->title }}">
        <input type="hidden" class="form-control" id="juara" name="juara" required value="{{ $c->juara }}">
        <input type="hidden" class="form-control" id="user_id" name="user_id" required value="{{ auth()->user()->id }}">
        <input type="hidden" class="form-control" id="keterangan" name="keterangan" value="{{ $team->tournament->matchDate}} - {{ $team->tournament->matchAndDate }}">
        @if (!$c->user_id)
            <button type="submit" class="btn bg-sky-500 max-w-sm mt-2 float-right">Klaim</button>
        @endif
    </form>
</div>
@else
<div class="">
    <img center src="{{ asset('storage/' . $c->image) }}" alt="{{ $c->team }}" class="mt-2 w-[70%] mx-auto">

    <form method="post" action="/dashboard/teams/{{ $team->slug }}/standing/certi/edit" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" class="form-control" id="team" name="team" required value="{{ $team->name }}">
        <input type="hidden" class="form-control" id="tournament" name="tournament" required value="{{ $team->tournament->title }}">
        <input type="hidden" class="form-control" id="juara" name="juara" required value="{{ $c->juara }}">
        <input type="hidden" class="form-control" id="user_id" name="user_id" required value="{{ auth()->user()->id }}">
        <input type="hidden" class="form-control" id="keterangan" name="keterangan" value="{{ $team->tournament->matchDate}} - {{ $team->tournament->matchAndDate }}">
        @if (!$c->user_id)
            <button type="submit" class="mr-48 btn bg-sky-500 max-w-sm mt-2 float-right">Klaim</button>
        @endif
    </form>
</div>
@endif

@endforeach
@endsection