@extends('dashboard.admin.layouts.main')

@section('container')
    <! Card Detail Tournament !>
    <h1 class="text-center mb-9 text-5xl font-mono font-bold p-0 mt-4">{{ $tournament->title }}</h1>
        <div class="flex flex-wrap mx-20">

            <div class="w-full px-4 lg:w-1/2">
                <section class="shadow-lg mb-4 text-xl bg-white rounded-md">
                    @if ($tournament->image)
                        <div class="d-flex justify-center">
                            <img src="{{ asset('storage/' . $tournament->image) }}" alt="{{ $tournament->game->name }}" class="max-h-72 max-w-lg">
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
                        <p class="text-4xl">{{ $slot }}/{{ $tournament->slot }}</p>
                    </div>
                </section>
            </div>
    <!-- card -->
            <div class="w-full px-4 lg:w-1/2">
                    <div class="shadow-lg text-lg">
                        <div class="bg-black text-white font-bold rounded-t px-4 py-2">
                                DETAIL TOURNAMENT
                            </div>
                            <div class="border border-t-0 border-black rounded-b bg-white px-4 py-3 text-black">
                                <p class="mb-2   text-xl text-blue-600"><a href="/tournaments?game={{ $tournament->game->slug }}">{{ $tournament->game->name }}</a></p>
                                <p class="card-text">Digelar Oleh : <a href="/tournaments?author={{ $tournament->author->username }}" class="text-blue-600">{{ $tournament->author->name }}</a></p>
                                <p class="card-text">Komunitas : Bigetron Esport</p>
                                <p class="card-text">Lokasi : {{ $tournament->location }}</p>
                                <p class="card-title">Hadiah : {{ $tournament->prize }}</p>
                            </div>
                        </div>
                        <div class="shadow-lg text-lg">
                            <div class="bg-black text-white font-bold rounded-t px-4 py-2 mt-3">
                                INFO
                            </div>
                            <div class="border border-t-0 border-black rounded-b bg-white px-4 py-3 text-black">

                <div class="mb-2">
                    @if ($point->count())
                        <p></p>
                    @else
                        <a href="/dashboard/tournaments/{{ $tournament->slug }}/point/create" class="btn btn-success"><span data-feather="edit"></span> Add Rules Point</a>
                    @endif
                    <a href="/dashboard/tournaments/{{ $tournament->slug }}/edit" class="btn btn-warning w-1/3 h-7 p-0"> Edit</a>
                    <form action="/dashboard/tournaments/{{ $tournament->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger w-1/3 h-7 p-0" onclick="return confirm('Are you sure?' )">Delete</button>
                    </form>
                </div>

                                @if ($tournament->registrationDate >= date('Y-m-d'))
                                <p class="text-2xl text-center text-green-500">Registration Period</p>
                                    @elseif($tournament->registrationDate < date('Y-m-d') && $tournament->matchDate > date('Y-m-d'))
                                        <p class="text-2xl text-center text-yellow-400">Registration Close</p>
                                    @elseif($tournament->matchDate <= date('Y-m-d') && $tournament->matchAndDate >= date('Y-m-d'))
                                        <p class="text-2xl text-center text-blue-500">Torunament in progress</p>
                                    @elseif($tournament->matchAndDate < date('Y-m-d'))
                                        <p class="text-2xl text-center text-red-600">This tournament has ended</p>
                                    @endif

                            </div>
                        </div>
                </div>
            <! close Card Detail Tournament !>
    <! rules and point !>
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
                        @if ($point->count())
                        <div class="w-1/2">
                            <p>Point Eliminasi = {{ $p->kill }}</p>
                            @foreach ($hastags as $hastag)
                                <p>Point Placement {{ $loop->iteration }} = {{ $hastag->hastag }}</p>
                            @endforeach
                        </div>
                        <div class="w-10 mt-3">
                            <a href="/dashboard/tournaments/{{ $tournament->slug }}/point/{{ $p->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        </div>
                        <div class="w-1/2 mt-3">
                            <form action="/dashboard/tournaments/{{ $tournament->slug }}/point/{{ $p->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?' )
                                "><span data-feather="x-circle"></span></button>
                            </form>
                        </div>
                        <p></p>
                        @else
                            
                        @endif
                    </div>
                </div>
            </div>
                @endsection