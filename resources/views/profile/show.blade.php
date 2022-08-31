@extends('dashboard.layouts.main')

@section('container')

@if ($certi->juara)
<div class= "mx-28 mt-4">
    <div class="flex flex-wrap border-5 border-hijau bg-black h-[13cm]">
        <div class="w-full text-3xl">
            <p class="flex justify-center pt-16 text-4xl font-bold text-amber-300" >E-CERTIFICATE OF ACHIEVEMENT</p>
            <h1 class="text-base mt-2 text-center font-semibold text-hijau md:text-xl">Sertifikat ini diberikan kepada: 
        </div>
        <div class="w-md self-center px-4 mx-auto ">
            <img src="/storage/{{ $certi->image }}" alt="{{ $certi->team }}" class="mx-auto mb-3 w-[100px]">
            <p class="font-mono text-center text-amber-300 mt-1 text-4xl">{{ $certi->team }}</p>
                <p class="font-medium text-center text-slate-400 text-xl mb-5 lg:text-xl">Juara {{ $certi->juara }}</p>
            <p class="font-semibold text-base leading-relaxed text-center text-white">Turnamen <span class="text-hijau">{{ $certi->tournament }}</span></p>
            <p class="font-semibold text-base mb-10 leading-relaxed text-center text-white">yang diselenggarakan pada <span class="text-hijau">{{ $certi->keterangan }}</span>.</p>
        </div>
    </div>
</div>
@else
<div class="">
    <img center src="{{ asset('storage/' . $certi->image) }}" alt="{{ $certi->team }}" class="mt-4 w-[70%] mx-auto">
</div>
@endif

@endsection