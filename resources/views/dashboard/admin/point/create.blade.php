@extends('dashboard.admin.layouts.main')

@section('container')
@if (!$point->count())
<div class="container">
    <h1 class="text-center mb-6 text-4xl font-mono font-bold mt-4">Create Rule Point</h1>
<div class="max-w-3xl text-2xl mx-auto">
    <form method="post" action="/dashboard/tournaments/{{ $tournament->slug }}/point" class="mb-5">
        @csrf
    <div class="grid grid-cols-9 gap-3">
        <div class="mb-3">
            <label for="kill" class="form-label">kill</label>
            <input type="text" class="form-control @error('kill') is-invalid @enderror" id="kill" name="kill" required autofocus placeholder="kill" value="{{ old('kill') }}">
            @error('kill')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>
    <button type="submit" class="btn bg-sky-500">Create Point</button>
    </form>
</div>
</div>
@elseif($point->count())
<div class="container">
    <h1 class="text-center mb-6 text-4xl font-mono font-bold mt-4">Create Rule Point</h1>
<div class="max-w-3xl text-2xl mx-auto">
    <form method="post" action="/dashboard/tournaments/{{ $tournament->slug }}/hastag" class="mb-5">
        @csrf
    <div class="grid grid-cols-9 gap-3">
        @for ($i = 1; $i <= $tournament->slot; $i++)
        <div class="mb-3 mx-6">
            <label for="hastag" class="form-label">#{{ $i }}</label>
            <input type="text" class="form-control @error('hastag') is-invalid @enderror" id="hastag" name="hastag[]" required autofocus placeholder="#" value="{{ old('hastag')}}">
            <input type="hidden" name="nomor[]" value="{{ $i }}">
            @error('hastag')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <input type="hidden" class="form-control" id="tournament_id" name="tournament_id[]" required value="{{ $tournament->id }}">
        <input type="hidden" class="form-control" id="point_id" name="point_id[]" required value="{{ $p->id }}">
        @endfor

    </div>
    <button type="submit" name="submit" class="btn bg-sky-500">Create Point</button>
    </form>
</div>
</div>
@endif
@endsection