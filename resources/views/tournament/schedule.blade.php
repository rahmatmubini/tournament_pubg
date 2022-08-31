@extends('layouts.main-single')

@section('container')

<div class="container">
    <div class="row mb-5 mr-11">

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
            <h1 class="mb-3 text-5xl font-bold font-mono text-center">{{ $tournament->title }}</h1>

        <div class="grid grid-cols-5 gap-5 mt-3 mb-3">
            @foreach ($schedules as $schedule)
            <div class="font-mono shadow-lg">
                    <div class="bg-black text-white text-xl text-center p-1 rounded-t-lg">
                        <p>DAY {{ $schedule->day }} / MATCH {{ $schedule->match }}</p>
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
                    <div class="bg-black text-white p-1 text-xl text-center rounded-b">
                        <p>{{ $schedule->map }} : {{ $schedule->time }}</p>
                    </div>
                    <a href="/tournaments/{{ $tournament->slug }}/schedule/{{ $schedule->slug }}" class="btn btn-primary p-0 w-full bg-blue-500 text-sm">Hasil Pertandingan</a>
                    
            </div>
            @endforeach
        </div>

    </div>
</div>

{{-- ---Rahmat --}}
        {{-- @for ($i = 1; $i < 8; $i++)
            <div class="row">
                Day {{ $i }} 
                @foreach ($schedules as $schedule)
                    @if ($schedule->day === 'Day ' . $i)
                        <div class="p-3 w-52">
                                <!-- Titled Alert -->
                                <div role="alert" class="shadow-lg">
                                    <div class="bg-black text-white font-bold text-center px-4 py-2 mx-2 mt-2">
                                        {{ $schedule->match }}
                                    </div>
                                    <div class="px-2 py-2">
                                        <img src="https://source.unsplash.com/500x400" class="" alt="">
                                    </div>
                                    <div class="bg-black text-white font-bold text-center px-4 py-2 mx-2 mb-2">
                                        {{ $schedule->map }}
                                    </div>
                                </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endfor --}}

@endsection