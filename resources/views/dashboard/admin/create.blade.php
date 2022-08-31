@extends('dashboard.layouts.main')

@section('container')
<div class="row mb-8 mx-auto text-xl">
        <h1 class="text-center mb-10 mt-4 text-4xl font-mono font-bold">Create New Tournament</h1>

    <div class="w-1/2">
        <form method="post" action="/dashboard/tournaments" class="mb-5" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
            </div>

            <div class="mb-3">
                <label for="prize" class="form-label">Prize</label>
                <input type="text" class="form-control @error('prize') is-invalid @enderror" id="prize" name="prize" required value="{{ old('prize') }}" placeholder="Rp. 1.5000.000">
                @error('prize')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="game" class="form-label">Game</label>
                <select class="form-select" name="game_id">
                    @foreach ($games as $game)
                        @if (old('game_id') == $game->id)
                            <option value="{{  $game->id }}" selected>{{ $game->name }}</option>
                        @else
                            <option value="{{  $game->id }}">{{ $game->name }}</option>
                        @endif                     
                    @endforeach
                </select>
            </div> --}}
            <input type="hidden" class="form-control @error('game_id') is-invalid @enderror" id="game_id" name="game_id" required value="{{ 1 }}">

            <div class="mb-3">
                <label for="registrationDate" class="form-label">Registration Deadline</label>
                <input autocomplete="off" class="date form-control @error('registrationDate') is-invalid @enderror" id="registrationDate" name="registrationDate" required autofocus value="{{ old('registrationDate') }}" placeholder="yyyy-mm-dd">
                @error('registrationDate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    </div>

    <div class="w-1/2">
        <div class="mb-3 grid grid-cols-2 gap-4">
            <div class="">
                <label for="matchDate" class="form-label">Match Start Date</label>
                <input autocomplete="off" class="date form-control @error('matchDate') is-invalid @enderror" id="matchDate" name="matchDate" required autofocus value="{{ old('matchDate') }}" placeholder="yyyy-mm-dd">
                @error('matchDate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="">
                <label for="matchAndDate" class="form-label">Match End Date</label>
                <input autocomplete="off" class="date form-control @error('matchAndDate') is-invalid @enderror" id="matchAndDate" name="matchAndDate" required autofocus value="{{ old('matchAndDate') }}" placeholder="yyyy-mm-dd">
                @error('matchAndDate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
            
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input autocomplete="off" class="time form-control @error('time') is-invalid @enderror" id="time" name="time" required autofocus value="{{ old('time') }}" placeholder="00:00">
                @error('time')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slot" class="form-label">Slot</label>
                <input type="text" class="form-control @error('slot') is-invalid @enderror" id="slot" name="slot" required autofocus value="{{ old('slot') }}" placeholder="16">
                @error('slot')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" required autofocus value="{{ old('location') }}" placeholder="Online">
                @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    </div>

            <div class="mb-3">
                <label for="image" class="form-label">Tournament Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="form-label">Rule</label>
                    @error('body')
                        <p class="text-danger">{{ $message }}</p>                  
                    @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>
            
            <button type="submit" class="btn bg-sky-500 max-w-sm">Create Tournament</button>
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