@extends('dashboard.layouts.main')

@section('container')
<div class="pt-5">
    <a class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out" href="/profile">MY PROFILE</a>
    <a class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out" href="/certificate">MY CERTIFICATE</a>
</div>
<div class="row justify-content-center font-mono">
    <div class="col-md-4">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <main class="form-signin my-4">
            <form action="/profile/edit" method="post">
                @method('put')
                @csrf
                <div class="form-floating">
                    <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ $profile->name }}">
                    <label for="name">Nama</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required value="{{ $profile->username }}">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ $profile->email }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary bg-sky-500 text-2xl" type="submit">Ganti</button>
            </form>
        </main>
    </div>
</div>
@endsection