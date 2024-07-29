@extends('layout.master')

@section('about')
<section id="about">
    <div class="about-section">
        <h1>Tentang kami</h1>
        <div class="about-content">
            <div class="description">
                <p>
                    Produk-produk DC Woodcraft dibuat menggunakan kayu jati Belanda ex Peti Kemas dan kayu pinus
                    pilihan. Kami memilih bahan-bahan ini bukan hanya karena seratnya yang indah dan berkualitas tinggi,
                    tetapi juga karena komitmen kami terhadap keberlanjutan lingkungan. Dengan memanfaatkan kayu daur
                    ulang, kami berusaha untuk mengurangi penebangan pohon baru.<br>
                    <br>
                    Ketika Anda membeli produk kami, Anda tidak hanya mendapatkan kerajinan kayu berkualitas, tetapi
                    juga ikut berpartisipasi dalam langkah kecil kami untuk menjaga kelestarian alam.
                </p>
            </div>
            <div class="image">
                <img src="{{ asset('img/kolase.png') }}">
            </div>
        </div>
    </div>
    <div id="kelebihan">
        <h1>Kenapa harus DC.Woodcraft?</h1>
        <p style="color: white">Beberapa kelebihan produk DC.Woodraft</p>
        <div class="satu">
            <h3>High Quality</h3>
            <p>Dibuat dengan kayu pilihan<br> kualitas terbaik</p>
        </div>
        <div class="satu">
            <h3>Affordable Prices</h3>
            <p>Produk berkwalitas <br>dengan harga terjangkau</p>
        </div>
        <div class="satu">
            <h3>Aesthetic Design</h3>
            <p>Desainnya unik dan estetis,<br> cocok untuk berbagai dekorasi</p>
        </div>
        <div class="satu">
            <h3>Fast Shipping</h3>
            <p>Pengiriman cepat dan aman <br>untuk setiap pembelian</p>
        </div>
    </div>
</section>
<!-- memanggil css about -->
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection
