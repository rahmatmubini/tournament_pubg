@extends('dashboard.layouts.main')

@section('container')

<div class="mt-4">
    <h1 class="mb-4 text-5xl font-bold font-mono text-center">{{ $team->tournament->title }}</h1>
    <h1 class="mb-4 text-2xl font-mono">Input Hasil Pertandingan - {{ $_GET['DM'] }} : </h1>
    <form action="/dashboard/teams/{{ $team->slug }}/schedule/result/store" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name='tournament_id' class="form-control rounded-top @error('tournament_id')is-invalid @enderror" id="tournament_id" placeholder="tournament_id" required value="{{ $team->tournament->id }}">
        
        <input type="hidden" name='team_id' class="form-control rounded-top @error('team_id')is-invalid @enderror" id="team_id" placeholder="Team" required value="{{ $team->id }}">
        @error('team_id')
            <div class="invalid-feedback mb-4">
                Kamu Sudah Memasukkan Data Pada Match Ini
            </div>
        @enderror

        <input type="hidden" name='schedule_id' class="form-control rounded-top @error('schedule_id')is-invalid @enderror" id="schedule_id" placeholder="schedule_id" required value="{{ $_GET['id'] }}">

        <label class="block">
            <span class="text-black">Rangking</span>
            <select class="form-select" name="rank" class="form-control rounded-top @error('rank')is-invalid @enderror" id="rank" placeholder="Rank #Team" required value="{{ old('rank') }}">
                @foreach ($points as $point)
                <option value="{{ $point->hastag1 }}" selected>#1</option>
                <option value="{{ $point->hastag2 }}">#2</option>
                <option value="{{ $point->hastag3 }}">#3</option>
                <option value="{{ $point->hastag4 }}">#4</option>
                <option value="{{ $point->hastag5 }}">#5</option>
                <option value="{{ $point->hastag6 }}">#6</option>
                <option value="{{ $point->hastag7 }}">#7</option>
                <option value="{{ $point->hastag8 }}">#8</option>
                <option value="{{ $point->hastag9 }}">#9</option>
                <option value="{{ $point->hastag10 }}">#10</option>
                <option value="{{ $point->hastag11 }}">#11</option>
                <option value="{{ $point->hastag12 }}">#12</option>
                <option value="{{ $point->hastag13 }}">#13</option>
                <option value="{{ $point->hastag14 }}">#14</option>
                <option value="{{ $point->hastag15 }}">#15</option>
                <option value="{{ $point->hastag16 }}">#16</option>
                <option value="{{ $point->hastag17 }}">#17</option>
                <option value="{{ $point->hastag18 }}">#18</option>
                <option value="{{ $point->hastag19 }}">#19</option>
                <option value="{{ $point->hastag20 }}">#20</option>
                <option value="{{ $point->hastag21 }}">#21</option>
                <option value="{{ $point->hastag22 }}">#22</option>
                <option value="{{ $point->hastag23 }}">#23</option>
                <option value="{{ $point->hastag24 }}">#24</option>
                <option value="{{ $point->hastag25 }}">#25</option>
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
        <label class="block">
            <span class="text-black">Screen Shoot Hasil Pertandingan</span>
            <img class="img-preview img-fluid mb-3 col-sm-5 w-1/5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </label>

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