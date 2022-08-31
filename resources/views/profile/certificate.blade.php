@extends('dashboard.layouts.main')

@section('container')
<div class="pt-5 mb-5">
    <a class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out" href="/profile">MY PROFILE</a>
    <a class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out" href="/certificate">MY CERTIFICATE</a>
</div>
<table class="table table-striped table-lg">
    <thead class="">
    </thead>
    <tbody>
        @foreach ($certificate as $c)
            <tr>
                <td>{{$loop->iteration}}.</td>
                <td>{{ $c->tournament }}</td>
                <td>Juara {{ $c->juara }}</td>
                <td>
                    <a href="/certificate/{{ $c->id }}" class="badge bg-info"><span></span>Detail</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
