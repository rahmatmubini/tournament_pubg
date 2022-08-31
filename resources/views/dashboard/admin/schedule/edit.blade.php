@extends('dashboard.admin.layouts.main')

@section('container')
<div class="container">
        <h1 class="text-center mb-6 text-4xl font-mono font-bold mt-4">Room Id Password</h1>
    <div class="max-w-lg text-2xl mx-auto">
        <form method="post" action="/dashboard/tournaments/{{ $tournament->slug }}/schedules/{{ $schedule->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="idRoom" class="form-label">Id</label>
                <input type="text" class="form-control @error('idRoom') is-invalid @enderror" id="idRoom" name="idRoom" required autofocus placeholder="id room" value="{{ old('idRoom', $schedule->idRoom) }}">
                @error('idRoom')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="passRoom" class="form-label">Password</label>
                <input type="text" class="form-control @error('passRoom') is-invalid @enderror" id="passRoom" name="passRoom" required autofocus placeholder="password room" value="{{ old('passRoom', $schedule->passRoom) }}">
                @error('passRoom')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn bg-sky-500">Update Room</button>
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