@extends('dashboard.teams.layouts.main')

@section('container')

<div class="container">
    <div class="row mt-3 mb-5">
        <h1 class="mt-2 mb-5 text-5xl font-bold font-mono text-center">{{ $tournament->title }}</h1>
        <div class="text-xl border-2 p-3 max-w-xs shadow-md">
            <h1>DAY {{ $schedule->day }} /MATCH {{ $schedule->match }}</h1>
            <p>Map : {{ $schedule->map }}</p>
            <p>Waktu : {{ $schedule->time }}</p>
        </div>
        
        <div class="mt-2">
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show w-1/2" role="alert">
                    {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="mt-2">
            <table class="table table-striped table-sm text-xl text-center">
                <tbody>
                    <tr class="bg-black">
                        <td class="text-white">Name Team</td>
                        <td class="text-white">Rank Point</td>
                        <td class="text-white">Kill Point</td>
                        <td class="text-white">Total Point</td>
                        {{-- <td class="text-white">ScreenShot</td> --}}
                        <td class="text-white"></td>
                    </tr>
                    @foreach ($results as $result)
                        <tr class="shadow-sm">
                            <td class="py-3">{{ $result->team->name }}</td>
                            <td class="py-3">{{ $result->rankPoint }}</td>
                            <td class="py-3">{{ $result->killPoint }}</td>
                            <td class="py-3">{{ $result->rankPoint+$result->killPoint }}</td>
                            {{-- <td>
                                <a href="http://127.0.0.1:8000/storage/{{ $result->image }}" class="badge bg-info text-base">View Gambar</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection