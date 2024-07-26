@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Input Produk Baru</h1>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama_produk">Nama Produk</label>
        <input type="text" id="nama_produk" name="nama_produk" required>

        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>

        <label for="kategori">Kategori</label>
        <input type="text" id="kategori" name="kategori" required>

        <label for="gambar_produk" class="file-label">Pilih Gambar Produk</label>
        <input type="file" id="gambar_produk" name="gambar_produk">
        <span id="file-name">Tidak ada file yang dipilih</span>

        <button type="submit">Simpan Produk</button>
    </form>
</div>
<!-- Link ke CSS -->
<link rel="stylesheet" href="{{ asset('css/admin/createProduk.css') }}">
<!-- JavaScript di dalam HTML -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('gambar_produk');
    const fileName = document.getElementById('file-name');

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            fileName.textContent = fileInput.files[0].name;
        } else {
            fileName.textContent = 'Tidak ada file yang dipilih';
        }
    });
});
</script>
@endsection
