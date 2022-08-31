@extends('dashboard.admin.layouts.main')

@section('container')

<div class="container">
    <div class="row mt-3 mb-5">
        <h1 class="mt-2 mb-5 text-5xl font-bold font-mono text-center">{{ $tournament->title }}</h1>
        <div class="text-xl border-2 p-3 max-w-xs shadow-md">
            <h1>{{ $schedule->day }} / {{ $schedule->match }}</h1>
            <p>Map : {{ $schedule->map }}</p>
            <p>Waktu : {{ $schedule->time }}</p>
        </div>

        <div class="mt-4 mr-4">
            <table class="table table-striped table-sm text-xl text-center">
                <tbody>
                    <tr class="bg-black">
                        <td class="text-white">Rangking</td>
                        <td class="text-white">Name Team</td>
                        <td class="text-white">Kill</td>
                        <td class="text-white">Input To Standing</td>
                    </tr>
                    @foreach ($results as $result)
                        <tr class="shadow-sm">
                            <td class="py-3">#{{ $result->rank }}</td>
                            <td class="py-3">{{ $result->team->name }}</td>
                            <td class="py-3">{{ $result->killPoint }}</td>
                            <td class="py-3"><a href="" class="bg-sky-500 rounded-lg "></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection