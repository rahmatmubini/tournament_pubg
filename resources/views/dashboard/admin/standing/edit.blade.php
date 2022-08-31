@extends('dashboard.admin.layouts.main')

@section('container')
<div class="container">
        <h1 class="text-center mb-6 text-4xl font-mono font-bold mt-4">Edit Standings</h1>
    <div class="max-w-lg text-2xl mx-auto">
        <form method="post" action="/dashboard/tournaments/{{ $tournament->slug }}/standings/{{ $standing->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <input type="hidden" class="form-control @error('tournament_id') is-invalid @enderror" id="tournament_id" name="tournament_id" required value="{{ $tournament->id }}">
                @error('tournament_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="team" class="form-label">Team</label>
                <select class="form-select @error('team_id') is-invalid @enderror" name="team_id">
                    @foreach ($teams as $team)
                        @if (old('team_id', $standing->team_id) == $team->id)
                            <option value="{{  $team->id }}" selected>{{ $team->name }}</option>
                        @else
                            <option value="{{  $team->id }}">{{ $team->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('team_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="chicken" class="form-label">Chicken</label>
                <input type="text" class="form-control @error('chicken') is-invalid @enderror" id="chicken" name="chicken" required autofocus value="{{ old('chicken', $standing->chicken) }}">
                @error('chicken')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="rank_point" class="form-label">Rank Point</label>
                <input type="text" class="form-control @error('rank_point') is-invalid @enderror" id="rank_point" name="rank_point" required  value="{{ old('rank_point', $standing->rank_point) }}">
                @error('rank_point')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kill_point" class="form-label">kill Point</label>
                <input type="text" class="form-control @error('kill_point') is-invalid @enderror" id="kill_point" name="kill_point" required value="{{ old('kill_point', $standing->kill_point) }}">
                @error('kill_point')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn bg-sky-500">Edit standings</button>
        </form>
    </div>
</div>
@endsection