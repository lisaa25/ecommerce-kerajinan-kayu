@extends('layout.master')

@section('detailProduk')
<section id="detail-produk">
    <div class="container-detail">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('img/produk/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1 id="nama-produk">{{ $produk->nama_produk }}</h1>
                <p class="price">Rp.{{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p>{{ $produk->deskripsi }}</p>
                <!-- Tombol Add to Cart -->
                <button type="button" class="btn btn-primary" onclick="addToCart('{{ $produk->id_produk }}', '{{ $produk->nama_produk }}', '{{ $produk->harga }}','{{ $produk->gambar_produk }}')">Add to Cart</button>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="{{ asset('css/detail-produk.css') }}">
@endsection

@section('scripts')
<script>
function addToCart(id_produk, nama_produk, harga, gambar_produk) {
    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            id_produk: id_produk,
            gambar_produk: gambar_produk,
            nama_produk: nama_produk,
            harga: harga
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            refreshCartBadge();
        }
    })
    .catch(error => console.error('Error:', error));
}

function refreshCartBadge() {
    fetch('{{ route("cart.count") }}')
    .then(response => response.json())
    .then(data => {
        var cartBadge = document.querySelector('.shopping-cart-badge');
        if (cartBadge) {
            cartBadge.textContent = data.count;
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
