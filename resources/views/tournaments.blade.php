@extends('layouts.main')

@section('container')
    <div class="row justify-content-center my-3 font-mono">
            <form action="/tournaments">
                @if (request('game'))
                    <input type="hidden" name="game" value="{{ request('game')}}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author')}}">
                @endif
                <div class="flex input-group mb-4 w-full">
                    <div class="w-10/12 mx-1">
                        <input type="text" class="form-control lg:w-auto h-9 w-full border-2 rounded" placeholder=" Search.." name="search" value="{{ request('search') }}">
                    </div>
                    <div class="w-2/12">
                        <button class="shadow-md bg-blue-500 hover:bg-blue-700 text-white transition duration-100 cursor-pointer h-9 rounded w-full" type="submit">Q</button>
                    </div>
                </div>
            </form>
    </div>

@if ($tournaments->count())
{{-- start hero tournament --}}
<div class="container">
    <a href="/tournaments/{{ $tournaments[0]->slug }}" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:w-full hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

        @if ($tournaments[0]->image)
            <img class="object-cover w-full h-56 rounded-t-lg md:h-auto md:w-96 md:rounded-none md:rounded-l-lg lg:m-2" src="{{ asset('storage/' . $tournaments[0]->image) }}" alt="{{ $tournaments[0]->game->name }}">
        @else
            <img class="object-cover w-full h-56 rounded-t-lg md:h-auto md:w-96 md:rounded-none md:rounded-l-lg lg:m-2" src="https://www.tipspintar.com/wp-content/uploads/2018/08/Wallpaper-PUBG-Mobile-1.jpg" alt="{{ $tournaments[0]->game->name }}">
        @endif

        <div class="flex flex-col justify-between leading-normal text-white">
            <div class="px-4 pt-4 pb-3">
                <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $tournaments[0]->title }}</h5>
                <small class="text-slate-400">{{ $tournaments[0]->author->name }} . {{ $tournaments[0]->created_at->diffForHumans() }}</small>
            </div>
            <div class="flex dark:bg-neutral-900 rounded-lg">
                <div class="w-1/4 px-5 pb-3 pt-2 text-center">
                    <p class="text-sm lg:text-xl font-bold text-slate-400">Mulai</p>
                    <p class="text-sm lg:text-xl">{{ $tournaments[0]->matchDate }}</p>
                </div>
                <div class="w-1/4 px-5 pb-3 pt-2 text-center">
                    <p class="text-sm lg:text-xl font-bold text-slate-400">Waktu</p>
                    <p class="text-sm lg:text-xl">{{ $tournaments[0]->time }}</p>
                </div>
                <div class="w-1/4 px-5 pb-3 pt-2 text-center">
                    <p class="text-sm lg:text-xl font-bold text-slate-400">Status</p> @if ($tournaments[0]->matchDate < date('Y-m-d'))
                    <p class="text-sm lg:text-xl">Mulai</p>
                    @elseif($tournaments[0]->matchAndDate < date('Y-m-d'))
                    <p class="text-sm lg:text-xl">Selesai</p>
                    @endif
                    
                </div>
                <div class="w-1/4 px-5 pb-3 pt-2 text-center">
                    <p class="text-sm lg:text-xl font-bold text-slate-400">Slot</p>
                    <p class="text-sm lg:text-xl">{{$slot->where('tournament_id', $tournaments[0]->id)->count() . '/' . $tournaments[0]->slot }}</p>
                </div>
            </div>
        </div>
            
    </a>
    {{-- <div class="mb-5 shadow-lg w-full font-mono">

        @if ($tournaments[0]->image)
            <div class="bg-black p-3">
                <img src="{{ asset('storage/' . $tournaments[0]->image) }}" alt="{{ $tournaments[0]->game->name }}" class="h-60 mx-auto">
            </div>
        @else
            <div class="bg-black p-3">
                <img src="https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/clans/27971017/12d043970554638fde8296b8ad06f9eea85d61da.png" class="h-60 mx-auto" alt="{{ $tournaments[0]->game->name }}">
            </div>
        @endif
        
        <div class="container ml-4">
            <h1 class="text-2xl font-semibold mt-3"> <a href="/tournaments/{{ $tournaments[0]->slug }}" class="text-decoration-none text-dark">{{ $tournaments[0]->title }}</a></h1>
            
            <p class="text-xl">
                <small class="text-muted text-sm">
                By. <a class="text-blue-600" href="/tournaments?author={{ $tournaments[0]->author->username }}" class="text-decoration-none">{{ $tournaments[0]->author->name }}</a> in <a class=" text-blue-600" href="/tournaments?game={{ $tournaments[0]->game->slug }}" class="text-decoration-none" >{{ $tournaments[0]->game->name }} </a> {{ $tournaments[0]->created_at->diffForHumans() }}
                @if ($tournaments[0]->matchDate < date('Y-m-d'))
                    <p class="text-xl ">Status : Mulai </p>
                @elseif($tournaments[0]->matchAndDate < date('Y-m-d'))
                    <p class="text-xl ">Status : Selesai </p>
                @endif
                </small>
            </p>

            <section class="row">
                <div class="w-1/2">
                    <p class="text-sm lg:text-xl mt-3 ">Mulai : {{ $tournaments[0]->matchDate }} - {{ $tournaments[0]->matchAndDate }}</p>
                    <p class="text-sm lg:text-xl">Waktu : {{ $tournaments[0]->time }}</p>
                </div>
                <div class="w-1/2">
                    <p class="text-sm lg:text-xl mt-3 ">Location : {{ $tournaments[0]->location }}</p>
                    <p class="text-sm lg:text-xl">{{'Slot : ' . $slot->where('tournament_id', $tournaments[0]->id)->count() . '/' . $tournaments[0]->slot }}</p>
                </div>
            </section>

            <a href="/tournaments/{{ $tournaments[0]->slug }}" class="text-decoration-none btn btn-primary my-3">Registration</a>

        </div>
    </div> --}}
</div>
{{-- end hero tournament --}}

{{-- tournaments --}}
<div class="w-full px-4 flex flex-wrap justify-center xl:10/12 xl:mx-auto">
    @foreach ($tournaments->skip(1) as $tournament)
    <div class="my-2 lg:my-0 lg:p-2 md:w-1/2">
        <a href="#" class="flex  items-center bg-white rounded-lg border shadow-md flex-row w-full hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover rounded-t-lg max-h-40 w-32 lg:w-48 rounded-none rounded-l-lg m-2" src="{{ asset('storage/' . $tournament->image) }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions.</p>
            </div>
        </a>
    </div>
    @endforeach
</div>

<div class="container">
    <div class="row">
        @foreach ($tournaments->skip(1) as $tournament)        
            <section class="shadow-lg mb-4 mx-auto max-w-sm font-mono">

                <div class="position-absolute bg-dark px-3 py-2 mt-2" style="background-color: rgba(0, 0, 0, 0,7)"><a href="/tournaments?game={{ $tournament->game->slug }}" class="text-white text-decoration-none">{{ $tournament->game->name }}</a></div>

                @if ($tournament->image)
                <div class="d-flex justify-center p-2">
                    <img src="{{ asset('storage/' . $tournament->image) }}" alt="{{ $tournament->game->name }}" class="img-fluid mt-2 max-h-72">
                </div>
                @else
                    <img src="https://source.unsplash.com/500x400?{{ $tournament->game->name }}" class="card-img-top mt-2" alt="{{ $tournament->game->name }}">
                @endif

            <div class="p-7 my-auto pb-10 ">
                <p class="text-2xl font-semibold text-gray-800">{{  $tournament->title }} - {{$slot->where('tournament_id', $tournament->id)->count() . '/' . $tournament->slot }}</p>
                <p class="">
                    <small class="text-muted text-sm ">
                    By. <a class="text-blue-600" href="/tournaments?author={{ $tournament->author->username }}" class="text-decoration-none">{{ $tournament->author->name }}</a> {{ $tournament->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="text-xl mt-3 ">Mulai : {{ $tournament->matchDate }}</p>
                <p class="text-xl ">Location : {{ $tournament->location }}</p>
                @if ($tournament->matchDate < date('Y-m-d'))
                    <p class="text-xl">Status : Mulai </p>
                @elseif($tournament->matchAndDate < date('Y-m-d'))
                    <p class="text-xl">Status : Selesai </p>
                @endif
                
                <a href="/tournaments/{{ $tournament->slug }}" class="text-decoration-none btn btn-primary mt-3">Registration</a>
            </div>
            </section>
        @endforeach
    </div>
</div>

@else
    <p class="text-center fs-4">No tournament found</p>
@endif

<div class="d-flex justify-content-end mb-5">
    {{ $tournaments->links() }}
</div>


@endsection