@extends('dashboard.admin.layouts.main')

@section('container')
<div class="container">
        <h1 class="text-center mb-6 text-4xl font-mono font-bold mt-4">Create Certificate</h1>
    <div class="max-w-lg text-2xl mx-auto">
        <form method="post" action="/dashboard/tournaments/{{ $tournament->slug }}/standing/sendiri/store" class="mb-5" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <input type="hidden" class="form-control @error('tournament_id') is-invalid @enderror" id="tournament_id" name="tournament_id" required value="{{ $tournament->id }}">
                @error('tournament_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            {{-- <div class="mb-3">
                <input type="hidden" class="form-control @error('tournament') is-invalid @enderror" id="tournament" name="tournament" required autofocus value="{{$tournament->title, old('tournament') }}">
                @error('tournament')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="team_id" class="form-label">Team</label>
                <select class="form-select @error('team_id') is-invalid @enderror" name="team_id">
                    @foreach ($teams as $team)
                        @if (old('team_id') == $team->id)
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
                <label for="image" class="form-label">Upload Certificate</label>
                <img class="img-preview img-fluid mb-3 ">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn bg-sky-500">Kirim</button>
        </form>
    </div>
</div>
<script>
    function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display= 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
</script>
@endsection