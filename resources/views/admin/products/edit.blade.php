@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Edit Produk</h1>
    <form action="{{ route('admin.products.update', $product->id_produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" id="nama_produk" name="nama_produk" value="{{ $product->nama_produk }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" value="{{ $product->harga }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" required>{{ $product->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar_produk">Gambar Produk</label>
            <input type="file" id="gambar_produk" name="gambar_produk">
            <img src="{{ asset('img/produk/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Update Produk</button>
    </form>
</div>
<link rel="stylesheet" href="{{ asset('css/admin/editProduk.css') }}">
@endsection
