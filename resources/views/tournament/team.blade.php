@extends('layouts.main-single')

@section('container')

<div class="container">
    <div class="row mt-3 mb-5 mr-8">
        <h1 class="text-center mb-6 text-5xl font-mono font-bold mt-2">{{ $tournament->title }}</h1>
    
    <table class="table table-striped table-sm text-2xl text-center max-w-4xl mx-auto">
        <tbody>
            <tr class="bg-black">
                
                <td class="text-white">Team</td>
                <td class="text-white"></td>
                <td class="text-white">Name Team</td>
            </tr>
            @foreach ($teams as $team)
                <tr class="shadow-sm">
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <p class="ml-60">
                        @if ($team->image)
                            <img src="{{ asset('storage/' . $team->image) }}" alt="" class="w-20">
                        @else
                            <img src="https://1.bp.blogspot.com/--bouxTF55Go/YFokr7Y9a8I/AAAAAAAACJE/TfWqt09_HnMEYBz0hs918fiVdGitu2Y_gCNcBGAsYHQ/s2048/Onic%2BEsports.png" class="w-20" alt="{{ $tournament->game->name }}">
                        @endif
                        </p>
                    </td>
                    <td class="pt-4">{{ $team->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection