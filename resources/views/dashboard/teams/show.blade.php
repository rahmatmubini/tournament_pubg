@extends('dashboard.teams.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="mt-7">
            <h1 class="text-center mb-9 text-5xl font-mono font-bold p-0">{{ $team->tournament->title }}</h1>
            
            <div class="flex flex-wrap mx-20">
                <div class="w-full px-4 lg:w-1/2">
                    <section class="shadow-lg mb-4 font-mono text-xl">

                        @if ($team->tournament->image)
                        <div class="d-flex justify-center pt-3">
                            <img src="{{ asset('storage/' . $team->tournament->image) }}" alt="{{ $team->tournament->game->name }}" class="h-72">
                        </div>
                        @else
                            <img src="https://source.unsplash.com/500x400?{{ $team->tournament->game->name }}" class="card-img-top h-72" alt="{{ $team->tournament->game->name }}">
                        @endif
        
                        <div class="p-7 my-auto pb-10 ">
                            <p>Pendaftaran Ditutup</p>
                            <p class="text-lg">{{ $team->tournament->registrationDate }}</p>
                            <p>Tournament Dimulai</p>
                            <p class="text-lg">{{ $team->tournament->matchDate }}</p>
                            <p class="mt-2">Team</p>
                            <p class="text-4xl">{{$slot . '/' . $team->tournament->slot }}</p>
                        </div>
                    </section>
                </div>
            <!-- card -->
                <section class="w-full px-4 lg:w-1/2">
                    <div class="shadow-lg text-lg">
                        <div class="bg-black text-white font-bold rounded-t px-4 py-2">
                            DETAIL TOURNAMENT
                        </div>
                        <div class="border border-t-0 border-black rounded-b bg-white px-4 py-3 text-black">
                            <p class="mb-4 text-xl text-blue-600"><a href="/tournaments?game={{ $team->tournament->game->slug }}">{{ $team->tournament->game->name }}</a></p>
                            <p class="card-text">Digelar Oleh : <a href="/tournaments?author={{ $team->tournament->author->username }}" class="text-blue-600">{{ $team->tournament->author->name }}</a></p>
                            <p class="card-text">Komunitas : Bigetron Esport</p>
                            <p class="card-text">Lokasi : {{ $team->tournament->location }}</p>
                            <p class="card-title">Hadiah : {{ $team->tournament->prize }}</p>
                        </div>
                    </div>
                    <div class="shadow-lg text-lg">
                        <div class="bg-black text-white font-bold rounded-t px-4 py-2 mt-10">
                            INFO
                        </div>
                        <div class="rounded-b bg-white px-4 py-3 text-black">
                            <form action="/dashboard/teams/{{ $team->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0 mb-3" onclick="return confirm('Are you sure?' )
                                ">Keluar Dari Turnamen</button>
                            </form>
                                        @if ($team->tournament->registrationDate >= date('Y-m-d'))
                                        <p class="text-3xl text-center text-green-500">Registration Period</p>
                                            @elseif($team->tournament->registrationDate < date('Y-m-d') && $team->tournament->matchDate > date('Y-m-d'))
                                                <p class="text-3xl text-center text-yellow-400">Registration Close</p>
                                            @elseif($team->tournament->matchDate <= date('Y-m-d') && $team->tournament->matchAndDate >= date('Y-m-d'))
                                                <p class="text-3xl text-center text-blue-500">Torunament in progress</p>
                                            @elseif($team->tournament->matchAndDate < date('Y-m-d'))
                                                <p class="text-3xl text-center text-red-600">This tournament has ended</p>
                                            @endif
                        </div>
                        <div class="flex justify-center">
                            @if($team->tournament->matchDate <= date('Y-m-d') && $team->tournament->matchAndDate >= date('Y-m-d'))
                                <a href="/dashboard/teams/{{ $team->slug }}/schedule" class="shadow-lg text-decoration-none btn btn-primary mb-3 w-1/2">Input Match Results</a>
                            @endif
                        </div>
                    </div>
                </section>
            

        
            <div class="w-3/4 px-4 lg:w-1/2 rounded text-lg">
                <div class="bg-black text-white font-bold rounded-t px-4 py-2">
                    RULE
                </div>
                <div class="border border-t-0 border-black rounded-b bg-white px-4 py-3 text-black">
                    <article class="my-3 fs-5">
                        {!! $team->tournament->body !!}
                    </article>                    
                </div>
            </div>
            <div class="w-1/4 px-4 lg:w-1/2 rounded text-lg">
                <div class="bg-black text-white font-bold rounded-t px-4 py-2">
                    RANGKING POINT
                </div>
                <div class="border border-t-0 border-black rounded-b bg-white px-4 py-3 text-black">
                        <div class="w-1/2">
                            <p>Point Eliminasi = {{ $p->kill }}</p>
                            @foreach ($hastags as $hastag)
                                <p>Point Placement {{ $loop->iteration }} = {{ $hastag->hastag }}</p>
                            @endforeach
                        </div>
                </div>
            </div>

            <a href="/tournaments" class="shadow-lg text-decoration-none btn btn-primary mt-3 w-1/3">Back to tournaments</a>
        </div>
        </div>
    </div>
</div>

@endsection