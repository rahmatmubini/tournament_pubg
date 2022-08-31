@extends('dashboard.admin.layouts.main')

@section('container')

<div class="container">
    <div class="row mt-3 mb-5 font-mono">
            
                <h1 class="mb-3 text-5xl font-bold font-mono text-center">{{ $tournament->title }}</h1>

            <a href="/dashboard/tournaments/{{ $tournament->slug }}/schedules/create" class="border-2 font-mono shadow-md bg-white text-xl text-center rounded-lg">
                <p class="text-black">+ Add Schedule</p>
            </a>

            <div class="grid grid-cols-5 gap-5 mt-3 mb-3">
                @foreach ($schedules as $schedule)
                <div>
                    <div class="font-mono shadow-lg">
                        <div class="bg-black text-white text-xl text-center rounded-t-lg">
                            <p>{{ $schedule->day }} / {{ $schedule->match }}</p>
                        </div>
                        <div class="bg-white text-black">
                            <img src="https://d1nglqw9e0mrau.cloudfront.net/assets/images/thumbs/erangel-ee673d73.jpg" alt="">
                        </div>
                        <div class="bg-black text-white text-xl text-center rounded-b-lg">
                            <p>{{ $schedule->map }} : {{ $schedule->time }}</p>
                        </div>
                    </div>

                    <div class="btn btn-primary p-0 w-full bg-blue-500 mt-3 rounded-t-lg"><a href="/dashboard/tournaments/{{ $schedule->tournament->slug }}/schedules/{{ $schedule->slug }}">Match Results</a></div>
                    <div class="grid grid-cols-2">
                        <div class="bg-yellow-400 text-white rounded-bl-lg">
                            <a href="/dashboard/tournaments/{{ $schedule->tournament->slug }}/schedules/{{ $schedule->slug }}/edit"><span data-feather="edit"></span></a>
                        </div>
                        <div class="bg-red-600 text-white rounded-br-lg">
                            <form action="/dashboard/tournaments/{{ $schedule->tournament->slug }}/schedules/{{ $schedule->slug }}" method="post">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Are you sure?' )"><span class="pl-24"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
</div>
@endsection