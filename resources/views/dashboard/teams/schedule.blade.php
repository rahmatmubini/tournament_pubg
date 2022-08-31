@extends('dashboard.teams.layouts.main')

@section('container')

<div class="container">
    <div class="row mb-5">
        <div class="mt-4">
            <h1 class="mb-4 text-5xl font-bold font-mono text-center">{{ $team->tournament->title }}</h1>
            
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2 w-1/2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="grid grid-cols-5 gap-5 mt-3 mb-3 mr-16">
                @foreach ($schedules as $schedule)
                <div>
                    <div class="font-mono shadow-lg">
                            <div class="bg-black text-white text-xl text-center rounded-t-lg">
                                <p>DAY{{ $schedule->day }} / MATCH{{ $schedule->match }}</p>
                                <p>{{ $schedule->map }}:{{ $schedule->time }}</p>
                            </div>
                            <div class="bg-white text-black">
                                @if ($schedule->map == 'ERANGEL')
                                <img src="/img/erangel.jpg" alt="{{ $schedule->map }}">
                            @elseif ($schedule->map == 'MIRAMAR')
                                <img src="/img/miramar.jpg" alt="{{ $schedule->map }}">
                            @elseif ($schedule->map == 'LIVIK')
                                <img src="/img/livik.jpg" alt="{{ $schedule->map }}">
                            @elseif ($schedule->map == 'SANHOK')
                                <img src="/img/sanhok.jpg" alt="{{ $schedule->map }}">
                            @endif
                            </div>
                            <div class="bg-black text-white text-xl text-center rounded-b">
                                @if ($schedule->idRoom)
                                    <p>Id : {{ $schedule->idRoom }}</p>
                                    <p>Pass : {{ $schedule->passRoom }}</p>
                                @endif
                            </div>
                    </div>
                    <div class="font-mono shadow-lg mt-3">
                        <div class="text-white text-center rounded-lg">
                            <a href="/dashboard/teams/{{ $team->slug }}/schedule/{{ $schedule->slug }}" class="btn btn-primary p-0 w-full bg-blue-500 text-sm">Hasil Pertandingan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
</div>

@endsection