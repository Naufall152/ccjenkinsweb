@extends('layouts.app')
@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container py-5 fade-in">
    <div class="card mx-auto shadow-lg fade-in" style="max-width: 500px;">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Form Donasi</h4>
            <form action="{{ route('donasi.tunai.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan Donasi</label>
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Tulis pesan untuk penerima donasi" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah Donasi</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Masukkan jumlah donasi" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Opsi Pembayaran</label>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_option" id="gopay" value="Gopay" required>
                            <label class="form-check-label" for="gopay">
                                <img src="{{ Vite::asset('resources/images/gopay3.jpg') }}" alt="Gopay" class="img-fluid" style="width: 80px;">

                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_option" id="ovo" value="Ovo" required>
                            <label class="form-check-label" for="ovo">
                                <img src="{{ Vite::asset('resources/images/ovo3.jpg') }}" alt="Ovo" class="img-fluid" style="width: 80px;">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_option" id="dana" value="Dana" required>
                            <label class="form-check-label" for="dana">
                                <img src="{{ Vite::asset('resources/images/dana3.jpg') }}" alt="Ovo" class="img-fluid" style="width: 80px;">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Donasi Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
