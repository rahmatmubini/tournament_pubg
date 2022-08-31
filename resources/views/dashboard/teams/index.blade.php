@extends('dashboard.layouts.main')

@section('container')

@if ($teams->count())
<div class="table-responsive col-lg-9 mb-5 text-lg">

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session()->has('keluar'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('keluar') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="py-12">
        <a href="/tournaments" class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">CARI TURNAMENT</a>
    </div>

        <table class="table table-striped table-md">
            <thead>
                <tr>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                <tr>
                    <td>{{  $loop->iteration}}.</td>
                    <td>{{ $team->tournament->title }}</td>
                    <td>
                        <a href="/dashboard/teams/{{ $team->slug }}" class="badge bg-info">Detail</a>
                        <form action="/dashboard/teams/{{ $team->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?' )
                            ">Keluar Dari Turnamen</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
<div class="py-12">
    <p class="text-lg">Kamu Belum Terdaftar Pada Turnamen Manapun - <a href="/tournaments" class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">CARI TURNAMENT</a></p>
</div>
@endif



{{-- --------------------------------------------------------------------------------------- --}}


@endsection