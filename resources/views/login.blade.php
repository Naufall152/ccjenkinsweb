@extends('layouts.app2')

@section('content')
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center" style="background-color: #f7f7f7;">
    <div class="row w-100 shadow-lg" style="max-width: 1000px; border-radius: 20px; overflow: hidden;">
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center bg-dark text-white p-5">
            <h1 class="mb-3" style="font-size: 2.5rem; font-weight: bold; color: #ffa500;">Selamat Datang!</h1>
            <img src="{{ Vite::asset('resources/images/faf.png') }}" alt="Illustration" class="img-fluid mt-4" style="border-radius: 10px;">
        </div>
        <div class="col-md-6 bg-white d-flex align-items-center justify-content-center p-5">
            <div class="w-100" style="max-width: 400px;">
                <h4 class="text-center mb-4" style="font-size: 1.8rem; font-weight: bold; color: #ffa500;">LOGIN</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-4">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button type="submit" class="btn btn-lg text-white" style="background-color: #ffa500; border: none;">
                            Log In
                        </button>
                    </div>
                    <div class="text-center">
                        <p>Belum punya akun?
                            <a href="{{ route('register') }}" class="text-decoration-none" style="color: #ffa500;">
                                Klik disini!
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
