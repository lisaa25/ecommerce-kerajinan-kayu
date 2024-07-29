@extends('layout.master')

@section('content')
<section id="success" style="background-color: #d6efd8;">
    <div class="container">
        <h1>Checkout Berhasil</h1>
        <p>Terima kasih atas pesanan Anda! Checkout berhasil dan pesanan Anda sedang diproses.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</section>
@endsection
