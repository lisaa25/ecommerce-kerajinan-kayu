<!-- resources/views/produk/search.blade.php -->
@extends('layout.master')

@section('search')
<section id="search-results">
    <div class="container">
        <h1>Search Results for "{{ $query }}"</h1>
        <div class="product-container">
            @if ($products->isEmpty())
                <p>No products found matching your search query.</p>
            @else
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <a href="{{ route('produk.show', $product->id_produk) }}" class="card-link">
                            <div class="card">
                                <img src="{{ asset('img/produk/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}" style="width:100%">
                                <h2>{{ $product->nama_produk }}</h2>
                                <p class="price">Rp.{{ number_format($product->harga, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection
