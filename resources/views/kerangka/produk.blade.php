@extends('layout.master')

@section('produk')
    <section id="produk">
        <div class="container">
            <h1>KERAJINAN</h1>
            <div class="product-container">
                @foreach ($kerajinan as $val)
                    <div class="col-md-3">
                        <a href="{{ route('produk.show', $val->id_produk) }}" class="card-link">
                            <div class="card">
                                <img src="{{ asset('img/produk/' . $val->gambar_produk) }}" alt="{{ $val->nama_produk }}" style="width:100%">
                                <h2>{{ $val->nama_produk }}</h2>
                                <p class="price">Rp.{{ number_format($val->harga, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container">
            <h1>FURNITURE</h1>
            <div class="product-container">
                @foreach ($furniture as $val)
                    <div class="col-md-3">
                        <a href="{{ route('produk.show', $val->id_produk) }}" class="card-link">
                            <div class="card">
                                <img src="{{ asset('img/produk/' . $val->gambar_produk) }}" alt="{{ $val->nama_produk }}" style="width:100%">
                                <h2>{{ $val->nama_produk }}</h2>
                                <p class="price">Rp.{{ number_format($val->harga, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endsection
