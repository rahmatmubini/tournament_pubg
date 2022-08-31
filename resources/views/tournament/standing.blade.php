@extends('layouts.main-single')

@section('container')

<div class="container">
    <h1 class="my-3 text-5xl font-bold font-mono text-center">{{ $tournament->title }}</h1>

    <div class="mt-4 mr-16">
        <table class="table table-striped table-sm text-xl text-center">
            <tbody>
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