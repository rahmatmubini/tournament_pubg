@extends('dashboard.admin.layouts.main')

@section('container')
<div class="container">
        <h1 class="text-center mb-6 text-4xl font-mono font-bold mt-4">Create New Schedule</h1>
    <div class="max-w-lg text-2xl mx-auto">
        <form method="post" action="/dashboard/tournaments/{{ $tournament->slug }}/schedules" class="mb-5" enctype="multipart/form-data">
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
                <label for="day" class="form-label">Day</label>
                <input type="text" class="form-control @error('day') is-invalid @enderror" id="day" name="day" required autofocus autocomplete="off" placeholder="Harus Angka" value="{{ old('day') }}">
                @error('day')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <input type="hidden" class="mb-3 form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="text" class="date form-control @error('date') is-invalid @enderror" id="date" name="date" required autocomplete="off" value="{{ old('date') }}" placeholder="yyyy-mm-dd">

                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            

            {{-- --------1 --}}
            <div class="mb-3">
                <label for="match" class="form-label">Match</label>
                <input type="text" class="form-control @error('match') is-invalid @enderror" id="match" name="match" required autocomplete="off" placeholder="Harus Angka" value="{{ old('match') }}">
                @error('match')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
            <label for="map" class="form-label @error('map') is-invalid @enderror" id="map" name="map" required  value="{{ old('map') }}">Map</label>
            <select class="form-select" name="map">
                <option value="ERANGEL" selected>ERANGEL</option>
                <option value="MIRAMAR" >MIRAMAR</option>
                <option value="SANHOK" >SANHOK</option>
                <option value="VIKENDI" >VIKENDI</option>
                <option value="LIVIK" >LIVIK</option>
            </select>
            @error('map')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="text" class="time form-control @error('time') is-invalid @enderror" id="time" name="time" required autocomplete="off" value="{{ old('time') }}" placeholder="00:00">
                @error('time')
                    <div class="invalid-feedback">
                        {{ $message }}
                        @if(session()->has('error'))
                        <div class="alert alert-danger col-lg-9 w-1/2" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn bg-sky-500">Create schedule</button>
        </form>
    </div>
</div>

    <script>
        const day = document.querySelector('#day');
        const slug = document.querySelector('#slug');

        day.addEventListener('change', function() {
            fetch('/dashboard/tournaments/{tournament:slug}/schedules/checkSlug?day=' + day.value)
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