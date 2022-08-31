@extends('dashboard.admin.layouts.main')

@section('container')
<section class="pt-4">
    <div class= "mx-28">
        <div class="flex flex-wrap border-5 border-hijau bg-black h-[13cm]">
            <div class="w-full text-3xl">
                <p class="flex justify-center pt-16 text-4xl font-bold text-amber-300" >E-CERTIFICATE OF ACHIEVEMENT</p>
                <h1 class="text-base mt-2 text-center font-semibold text-hijau md:text-xl">Sertifikat ini diberikan kepada: 
            </div>
            <div class="w-md self-center px-4 mx-auto ">
                <form method="post" action="/dashboard/tournaments/{{ $tournament->slug }}/standing/otomatis/store" enctype="multipart/form-data" class="self-center justify-center">
                    @csrf
                <select class="form-select block font-bold text-hitam mt-1 text-3xl" name="team_id" required>
                        @foreach ($teams as $team)
                            @if (old('team_id') == $team->id)
                                <option class="text-base" value="{{  $team->id }}" selected>{{ $team->name }}</option>
                            @else
                                <option class="text-base" value="{{  $team->id }}">{{ $team->name }}</option>
                            @endif                     
                        @endforeach
                    </select>
                <select class="form-select font-medium text-slate-500 text-lg mb-4 lg:text-xl" name="juara" id="juara" required>
                        <option class="text-base" value="1" selected>Juara 1 (Satu)</option>
                        <option class="text-base" value="2" >Juara 2 (Dua)</option>
                        <option class="text-base" value="3" >Juara 3 (Tiga)</option>
                </select>
                <p class="font-semibold text-base leading-relaxed text-center text-white">Turnamen <span class="text-hijau">{{ $tournament->title }}</span></p>
                <p class="font-semibold text-base mb-10 leading-relaxed text-center text-white">yang diselenggarakan pada <span class="text-hijau">{{ $tournament->matchDate }}</span>-<span class="text-hijau">{{ $tournament->matchAndDate }}</span>.</p>
            </div>
        </div>
    </div>
</section>
                <input type="hidden" class="form-control @error('tournament_id') is-invalid @enderror" id="tournament_id" name="tournament_id" required value="{{ $tournament->id }}">
            <button type="submit" class="btn bg-sky-500 ml-32 mt-3">Kirim</button>
        </form>
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