@extends('dashboard.layouts.main')

@section('container')

{{-- --------------------------------------------------------------------------------------- --}}
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-9" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger col-lg-9" role="alert">
            {{ session('error') }}
        </div>
    @endif

@if ($tournaments->count())
<div class="table-responsive col-lg-9 text-lg pt-12">
    <div class="pb-12">
        <a href="/dashboard/tournaments/create" class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">CREATE TURNAMENT</a>
    </div>
    <table class="table table-striped table-lg">
        <thead class="">
        </thead>
        <tbody>
            @foreach ($tournaments as $tournament)
                <tr>
                    <td>{{  $loop->iteration}}.</td>
                    <td>{{ $tournament->title }}</td>
                    <td>
                        <a href="/dashboard/tournaments/{{ $tournament->slug }}" class="badge bg-info"><span></span>Detail</a>
                        <a href="/dashboard/tournaments/{{ $tournament->slug }}/edit" class="badge bg-warning"><span></span>Edit</a>
                        <form action="/dashboard/tournaments/{{ $tournament->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?' )
                            "><span>Hapus</span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="mt-5">
    <a href="/dashboard/tournaments/create" class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">BUAT TURNAMEN</a>
</div>
@endif


@endsection