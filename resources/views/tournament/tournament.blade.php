@extends('layouts.main-single')

@section('container')
<div class="container font-mono">
    <div class="row mb-5">

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="">
            <h1 class="text-center mb-9 text-5xl font-mono font-bold p-0">{{ $tournament->title }}</h1>
            
            <div class="row">
                <div class="max-w-2xl mr-5">
                    <section class="shadow-lg mb-4 font-mono text-xl">

                        @if ($tournament->image)
                        <div class="d-flex justify-center pt-3">
                            <img src="{{ asset('storage/' . $tournament->image) }}" alt="{{ $tournament->game->name }}" class="h-72">
                        </div>
                        @else
                            <img src="https://source.unsplash.com/500x400?{{ $tournament->game->name }}" class="card-img-top h-72" alt="{{ $tournament->game->name }}">
                        @endif
        
                        <div class="p-7 my-auto pb-10 ">
                            <p>Pendaftaran Ditutup</p>
                            <p class="text-lg">{{ $tournament->registrationDate }}</p>
                            <p>Tournament Dimulai</p>
                            <p class="text-lg">{{ $tournament->matchDate }}</p>
                            <p class="mt-2">Team</p>
                            <p class="text-4xl">{{$slot . '/' . $tournament->slot }}</p>
                        </div>
                    </section>
                </div>
            <!-- card -->
                <section class="max-w-lg font-mono p-0">
                    <div class="shadow-lg text-lg">
                        <div class="bg-black text-white font-bold rounded-t px-4 py-2">
                            DETAIL TOURNAMENT
                        </div>
                        <div class="border border-t-0 border-black rounded-b bg-white px-4 py-3 text-black">
                            <p class="mb-4 text-xl text-blue-600"><a href="/tournaments?game={{ $tournament->game->slug }}">{{ $tournament->game->name }}</a></p>
                            <p class="card-text">Digelar Oleh : <a href="/tournaments?author={{ $tournament->author->username }}" class="text-blue-600">{{ $tournament->author->name }}</a></p>
                            <p class="card-text">Komunitas : Bigetron Esport</p>
                            <p class="card-text">Lokasi : {{ $tournament->location }}</p>
                            <p class="card-title">Hadiah : {{ $tournament->prize }}</p>
                        </div>
                    </div>
                    <div class="shadow-lg text-lg">
                        <div class="bg-black text-white font-bold rounded-t px-4 py-2 mt-10">
                            INFO
                        </div>
                        <div class="border border-t-0 border-black rounded-b bg-white px-4 py-3 text-black">
                                        @if ($tournament->registrationDate >= date('Y-m-d'))
                                                <a href="/tournaments/{{ $tournament->slug }}/register" class="w-100 btn btn-lg btn-primary bg-sky-500 text-2xl">Registration
                                                </a>
                                            @elseif($tournament->registrationDate < date('Y-m-d') && $tournament->matchDate > date('Y-m-d'))
                                                <p class="text-3xl mt-4 text-center text-yellow-400">Registration Close</p>
                                            @elseif($tournament->matchDate <= date('Y-m-d') && $tournament->matchAndDate >= date('Y-m-d'))
                                                <p class="text-3xl mt-4 text-center text-blue-500">Torunament in progress</p>
                                            @elseif($tournament->matchAndDate < date('Y-m-d'))
                                                <p class="text-3xl mt-4 text-center text-red-600">This tournament has ended</p>
                                            @endif
                                            @if(session()->has('success'))
                                        
                                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                        </div>
                    </div>
                </section>
            </div>

        </div>

        <div class="w-3/4 px-4 lg:w-1/2 rounded text-lg">
            <div class="bg-black text-white font-bold rounded-t px-4 py-2">
                RULE
            </div>
            <div class="border border-t-0 border-black rounded-b bg-white px-4 py-3 text-black">
                <article class="my-3 fs-5">
                    {!! $tournament->body !!}
                </article>                    
            </div>
        </div>
        <div class="w-1/4 px-4 lg:w-1/2 rounded text-lg">
            <div class="bg-black text-white font-bold rounded-t px-4 py-2">
                RANKING POINT
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
@endsection