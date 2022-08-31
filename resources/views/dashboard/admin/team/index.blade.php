@extends('dashboard.admin.layouts.main')

@section('container')
<div class="container">
    <div class="row mt-3 mb-5 mr-8">
        <h1 class="text-center mb-6 text-5xl font-mono font-bold mt-2">{{ $tournament->title }}</h1>
        @if(session()->has('success'))
        <div class="alert alert-success col-lg-9 w-1/2" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger col-lg-9 w-1/2" role="alert">
            {{ session('error') }}
        </div>
        @endif
    <table class="table table-striped table-sm text-2xl text-center">
        <tbody>
            {{-- <tr>
                <a href="/dashboard/tournaments/{{ $tournament->slug }}/teams/create" class="shadow-md text-2xl p-0 text-center mb-8 mt-2">
                    <div class="border border-black text-center">
                        + Add Team
                    </div>
                </a>
            </tr> --}}
            <tr class="bg-black">
                <td class="text-white">Logo</td>
                <td class="text-white">Name Team</td>
                <td class="text-white">Action</td>
            </tr>
            @foreach ($teams as $team)
                <tr class="shadow-sm">
                    <td>
                    @if ($team->image)
                        <img src="{{ asset('storage/' . $team->image) }}" alt="" class="ml-3 w-20">
                    @else
                        <img src="https://1.bp.blogspot.com/--bouxTF55Go/YFokr7Y9a8I/AAAAAAAACJE/TfWqt09_HnMEYBz0hs918fiVdGitu2Y_gCNcBGAsYHQ/s2048/Onic%2BEsports.png" class="ml-3 w-20" alt="{{ $tournament->game->name }}">
                    @endif
                    </td>
                    <td class="pt-4">{{ $team->name }}</td>
                    <td class="py-3">
                        <div>

                            <a href="/dashboard/tournaments/{{ $team->tournament->slug }}/teams/{{ $team->slug }}" class="badge bg-info text-sm">Detail Tim</a>
                            
                            <a href="/dashboard/tournaments/{{ $team->tournament->slug }}/teams/{{ $team->slug }}/edit" class="badge bg-warning text-sm">Update Tim</a>
                            
                            <form action="/dashboard/tournaments/{{ $team->tournament->slug }}/teams/{{ $team->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0 text-sm" onclick="return confirm('Are you sure?' )
                                ">Kick Tim</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection