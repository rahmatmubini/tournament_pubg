@extends('dashboard.admin.layouts.main')

@section('container')

<div class="container">
    <div class="row mt-3 mb-5 font-mono mr-16">
        
        <h1 class="mb-3 text-5xl font-bold font-mono text-center">{{ $tournament->title }}</h1>
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show w-1/2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show w-1/2" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
            <div class="pb-6">
                <a href="/dashboard/tournaments/{{ $tournament->slug }}/schedules/create" class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">TAMBAH SCHEDULE</a>
            </div>

            <div class="grid grid-cols-5 gap-5 mt-3 mb-3">
                @foreach ($schedules as $schedule)
                <div>
                    <div class="font-mono shadow-lg">
                        <div class="bg-black text-white text-xl text-center rounded-t-lg">
                            <p>DAY {{ $schedule->day }}/MATCH {{ $schedule->match }}</p>
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
                        <div class="bg-black text-white text-xl text-center rounded-b-lg">
                            <a class="bg-hijau rounded-xl" href="/dashboard/tournaments/{{ $schedule->tournament->slug }}/schedules/{{ $schedule->slug }}">Match Results</a>
                            <a class="bg-yellow-500 rounded-xl" href="/dashboard/tournaments/{{ $schedule->tournament->slug }}/schedules/{{ $schedule->slug }}/edit">Room Id Pass</a>
                            <form action="/dashboard/tournaments/{{ $schedule->tournament->slug }}/schedules/{{ $schedule->slug }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="bg-red-600 rounded-xl" onclick="return confirm('Are you sure?' )">Hapus Schedule</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</div>
@endsection