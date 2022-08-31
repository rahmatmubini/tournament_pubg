@extends('dashboard.admin.layouts.main')

@section('container')

<div class="container">
    <h1 class="my-3 text-5xl font-bold font-mono text-center">{{ $tournament->title }}</h1>
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

    <div class="mt-4 mr-16">
        <table class="table table-striped table-sm text-xl text-center">
            <tbody>
                <tr>
                    @if ($tournament->matchAndDate <= date('Y-m-d'))
                    <div class="btn btn-success mb-3 mr-3 text-xl float-right">
                        <a href="/dashboard/tournaments/{{ $tournament->slug }}/standing/otomatis">
                            Otomatis
                        </a>
                    </div>
                    <p class="float-right mr-3 text-2xl">or</p>
                    <div class="btn btn-success mb-3 mr-3 text-xl float-right">
                        <a href="/dashboard/tournaments/{{ $tournament->slug }}/standing/sendiri">
                            import
                        </a>
                    </div>
                    <div class="btn mb-3 mr-3 text-xl float-right">Buat Sertifikat : </div>
                    @endif
                </tr>
                <tr class="bg-black">
                    <td class="text-white">Logo</td>
                    <td class="text-white">Name Team</td>
                    <td class="text-white">Kill Point</td>
                    <td class="text-white">Rank Point</td>
                    <td class="text-white">Total Point</td>
                </tr>
                @foreach ($results as $result)
                    @foreach ($teams as $team)
                        @if ($result->team_id === $team->id)
                        <tr class="shadow-sm">
                            <td>
                                <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}" class="ml-3 w-20">
                            </td>
                            <td class="py-3">{{ $team->name }}</td>
                            <td class="py-3">{{ $result->totalkill }}</td>
                            <td class="py-3">{{ $result->totalrank }}</td>
                            <td class="py-3">{{ $result->total }}</td>
                        </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection