@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Tournament</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/tournaments/{{ $tournament->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $tournament->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $tournament->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="game" class="form-label">Game</label>
                <select class="form-select" name="game_id">
                    @foreach ($games as $game)
                        @if (old('game_id', $tournament->game_id) == $game->id)
                            <option value="{{  $game->id }}" selected>{{ $game->name }}</option>
                        @else
                            <option value="{{  $game->id }}">{{ $game->name }}</option>
                        @endif                     
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Tournament Image</label>
                <input type="hidden" name="oldImage" value="{{ $tournament->image }}">
                @if ($tournament->image)
                    <img src="{{ asset('storage/' . $tournament->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">    
                @endif
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="prize" class="form-label">Hadiah</label>
                <input type="text" class="form-control @error('prize') is-invalid @enderror" id="prize" name="prize" required value="{{ old('prize', $tournament->prize) }}">
                @error('prize')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="registrationDate" class="form-label">Batas Pendaftaran</label>
                <input type="text" class="form-control @error('registrationDate') is-invalid @enderror" id="registrationDate" name="registrationDate" required value="{{ old('registrationDate', $tournament->registrationDate) }}">
                @error('registrationDate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="matchDate" class="form-label">Tanggal Mulai</label>
                <input type="text" class="form-control @error('matchDate') is-invalid @enderror" id="matchDate" name="matchDate" required value="{{ old('matchDate', $tournament->matchDate) }}">
                @error('matchDate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="matchAndDate" class="form-label">Tanggal Berakhir</label>
                <input type="text" class="form-control @error('matchAndDate') is-invalid @enderror" id="matchAndDate" name="matchAndDate" required value="{{ old('matchAndDate', $tournament->matchAndDate) }}">
                @error('matchAndDate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="time" class="form-label">Waktu</label>
                <input type="text" class="form-control @error('time') is-invalid @enderror" id="time" name="time" required value="{{ old('time', $tournament->time) }}">
                @error('time')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slot" class="form-label">Slot</label>
                <input type="text" class="form-control @error('slot') is-invalid @enderror" id="slot" name="slot" required value="{{ old('slot', $tournament->slot) }}">
                @error('slot')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" required value="{{ old('location', $tournament->location) }}">
                @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">body</label>
                    @error('body')
                        <p class="text-danger">{{ $message }}</p>                  
                    @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $tournament->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Tournament</button>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/tournaments/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault
        })

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