@extends('dashboard.layouts.main')

@section('container')

<div class="mt-4">
    <h1 class="mb-4 text-5xl font-bold font-mono text-center">{{ $tournament->title }}</h1>
    {{-- <h1 class="mb-4 text-2xl font-mono">Input Hasil Pertandingan - {{ $_GET['DM'] }} : </h1> --}}
    <div class="text-xl border-2 p-3 max-w-xs shadow-md">
        <h1>DAY {{ $schedule->day }} /MATCH {{ $schedule->match }}</h1>
        <p>Map : {{ $schedule->map }}</p>
        <p>Waktu : {{ $schedule->time }}</p>
    </div>
    <form action="/dashboard/tournaments/{{ $tournament->slug }}/schedules/{{ $schedule->slug }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name='tournament_id' id="tournament_id" placeholder="tournament_id" required value="{{ $tournament->id }}">

        <input type="hidden" name='schedule_id' id="schedule_id" required value="{{ $schedule->id }}">

        <label class="block">
            <span class="text-black">Team</span>
            <select class="form-select" name="team_id" class="form-control rounded-top @error('team_id')is-invalid @enderror" id="team_id" placeholder="test" required>
                @foreach ($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
            @error('team_id')
                <div class="invalid-feedback mb-4">
                    Tim sudah memiliki hasil Pada Match Ini
                </div>
            @enderror
        </label>

        <label class="block">
            <span class="text-black">Rangking</span>
            <select class="form-select" name="rank" class="form-control rounded-top @error('rank')is-invalid @enderror" id="rank" placeholder="Rank #Team" required value="{{ old('rank') }}">
                @foreach ($hastags as $hastag)
                <option value="{{ $hastag->nomor }}">#{{ $hastag->nomor }} </option>
                @endforeach
            </select>
            <label for="rank"></label>
                @error('rank')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </label>

        <label class="block">
            <span class="text-black">Kill Point</span>
            <input type="text" name='killPoint' class="form-control rounded-top @error('killPoint')is-invalid @enderror" id="killPoint" placeholder="kill Team" required value="{{ old('killPoint') }}">
            <label for="killPoint"></label>
                @error('killPoint')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </label>

        {{-- <label class="block">
            <span class="text-black">Screen Shoot Hasil Pertandingan</span>
            <img class="img-preview img-fluid mb-3 col-sm-5 w-1/5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </label> --}}

        <button type="Submit" class="btn btn-primary shadow-lg mt-3 mb-10 card-header w-1/3 bg-sky-500">Kirim Hasil</button>
    </form>
</div>
<script>
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