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
                    @if($tournament->matchDate <= date('Y-m-d'))
                    <div class="btn btn-primary mb-3 mr-4 text-xl">
                        <a href="/dashboard/tournaments/{{ $tournament->slug }}/standings/create">
                            Tambah Standing
                        </a>
                    </div>
                    <div class="btn btn-primary mb-3 text-xl">
                        <a href="/dashboard/tournaments/{{ $tournament->slug }}/certi/create">
                            Buat Sertifikat
                        </a>
                    </div>
                    @endif
                </tr>
                <tr class="bg-black">
                    <td class="text-white">Logo</td>
                    <td class="text-white">Name Team</td>
                    <td class="text-white">Rank Point</td>
                    <td class="text-white">Kill Point</td>
                    <td class="text-white">Chicken</td>
                    <td class="text-white">Total Point</td>
                    <td class="text-white">Action</td>
                </tr>
                @foreach ($standings as $standing)
                    <tr class="shadow-sm">
                        <td>
                            <img src="{{ asset('storage/' . $standing->team->image) }}" alt="{{ $standing->team->name }}" class="ml-3 w-20">
                        </td>
                        <td class="py-3">{{ $standing->team->name }}</td>
                        <td class="py-3">{{ $standing->rank_point }}</td>
                        <td class="py-3">{{ $standing->kill_point }}</td>
                        <td class="py-3">{{ $standing->chicken }}</td>
                        <td class="py-3">{{ $standing->kill_point+$standing->rank_point }}</td>
                        <td class="py-3">
                            <a href="/dashboard/tournaments/{{ $standing->tournament->slug }}/standings/{{ $standing->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="/dashboard/tournaments/{{ $standing->tournament->slug }}/standings/{{ $standing->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?' )
                                "><span data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection