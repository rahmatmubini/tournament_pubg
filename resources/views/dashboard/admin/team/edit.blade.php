@extends('dashboard.admin.layouts.main')

@section('container')
<div class="row mt-4 mb-2">
    <h1 class="text-center mb-9 text-5xl font-mono font-bold">Edit   Team</h1>

    <form method="post" action="/dashboard/tournaments/{{ $tournament->slug }}/teams/{{ $team->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        {{-- --------------------------------- --}}
        <label class="block">
            <input type="hidden" name='tournament_id' class="form-control rounded-top @error('tournament_id')is-invalid @enderror" id="tournament_id" placeholder="tournament_id" required value="{{ $tournament->id }}">
        </label>
        
        <div class="row">
            <div class="shadow-lg rounded-lg p-4 max-w-auto mr-10 mb-10">
                <div class="row">

                    <div class="mb-3 max-w-xs">
                        <input type="hidden" name="oldImage" value="{{ $team->image }}">
                        @if ($team->image)
                            <img src="{{ asset('storage/' . $team->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block w-20 mx-auto">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5 w-20 mx-auto">    
                        @endif
                        <img class="img-preview img-fluid mb-3 col-sm-5 w-20 mx-auto">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="max-w-xs">
                    <label class="block">
                        <span class="text-gray-700">Nama Team</span>
                        <input type="text" name='name' class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name Team" required value="{{ old('name', $team->name)}}">
                        <label for="name"></label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </label>
                
                    {{-- slug --}}
                    <input type="hidden" name='slug' class="form-control rounded-top @error('slug')is-invalid @enderror" id="slug" placeholder="Slug" required value="{{ old('slug', $team->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label class="block">
                        <input type="hidden" class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required  value="{{ old('user_id', $team->user_id) }}">
                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </label>
                    </div>
                
                    <div class="max-w-xs">
                    <label class="block">
                        <span class="text-gray-700">Email address</span>
                        <input type="email" name='email' class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email', $team->email) }}">
                                        <label for="email"></label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                    </label>
                
                    <label class="block">
                        <span class="text-gray-700">Nomor Telepon</span>
                        <input type="nomor" name='nomor' class="form-control rounded-bottom @error('nomor')is-invalid @enderror" id="nomor" placeholder="Nomor Telepon" required value="{{ old('nomor', $team->nomor) }}">
                                        <label for="nomor"></label>
                                        @error('nomor')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                    </label>
                    </div>
                </div>
            </div>


            {{-- ---------------------------------player --}}
            <div class="max-w-md ml-14">
                <div class="font-mono p-3 shadow-lg rounded-lg max-w-lg">
                    <h2 class="text-2xl font-bold mb-3">Player 1</h2>
                        <label class="block">
                        <input type="player1" name='player1' class="form-control rounded-bottom @error('player1')is-invalid @enderror" id="player1" placeholder="Nickname In Game" required value="{{ old('player1', $team->player1) }}">
                        <label for="player1"></label>
                        @error('player1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="idPlayer1" name='idPlayer1' class="form-control rounded-bottom @error('idPlayer1')is-invalid @enderror" id="idPlayer1" placeholder="Id In Game" required value="{{ old('idPlayer1', $team->idPlayer1) }}">
                        <label for="idPlayer1"></label>
                        @error('idPlayer1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </label>
                </div>

                <div class="font-mono p-3 shadow-lg rounded-lg max-w-lg mt-5">
                    <h2 class="text-2xl font-bold mb-3">Player 3</h2>
                        <label class="block">
                        <input type="player3" name='player3' class="form-control rounded-bottom @error('player3')is-invalid @enderror" id="player3" placeholder="Nickname In Game" required value="{{ old('player3', $team->player3) }}">
                        <label for="player3"></label>
                        @error('player3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="idPlayer3" name='idPlayer3' class="form-control rounded-bottom @error('idPlayer3')is-invalid @enderror" id="idPlayer3" placeholder="Id In Game" required value="{{ old('idPlayer3', $team->idPlayer3) }}">
                        <label for="idPlayer3"></label>
                        @error('idPlayer3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </label>
                </div>
            </div>

            <div class="max-w-md">
                <div class="font-mono p-3 shadow-lg rounded-lg max-w-lg">
                    <h2 class="text-2xl font-bold mb-3">Player 2</h2>
                        <label class="block">
                        <input type="player2" name='player2' class="form-control rounded-bottom @error('player2')is-invalid @enderror" id="player2" placeholder="Nickname In Game" required value="{{ old('player2', $team->player2) }}">
                        <label for="player2"></label>
                        @error('player2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="idPlayer2" name='idPlayer2' class="form-control rounded-bottom @error('idPlayer2')is-invalid @enderror" id="idPlayer2" placeholder="Id In Game" required value="{{ old('idPlayer2', $team->idPlayer2) }}">
                        <label for="idPlayer2"></label>
                        @error('idPlayer2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </label>
                </div>

                <div class="font-mono p-3 shadow-lg rounded-lg max-w-lg mt-5">
                    <h2 class="text-2xl font-bold mb-3">Player 4</h2>
                        <label class="block">
                        <input type="player4" name='player4' class="form-control rounded-bottom @error('player4')is-invalid @enderror" id="player4" placeholder="Nickname In Game" required value="{{ old('player4', $team->player4) }}">
                        <label for="player4"></label>
                        @error('player4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="idPlayer4" name='idPlayer4' class="form-control rounded-bottom @error('idPlayer4')is-invalid @enderror" id="idPlayer4" placeholder="Id In Game" required value="{{ old('idPlayer4', $team->idPlayer4) }}">
                        <label for="idPlayer4"></label>
                        @error('idPlayer4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </label>
                </div>
            </div>
        </div>
        <button class="shadow-lg mt-5 mb-10 card-header w-1/3 bg-sky-500" type="submit">Update Team</button>
    </form>
</div>
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/tournaments/{tournament:slug}/teams/checkSlug?name=' + name.value)
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