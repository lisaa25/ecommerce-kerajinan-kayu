@extends('layout.master')

@section('cart')
<section id="cart">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if (session('cart') && count(session('cart')) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach (session('cart') as $id => $details)
                        <tr>
                            <td>
                                @if(isset($details['gambar_produk']))
                                    <img src="{{ $details['gambar_produk'] }}" alt="{{ $details['nama_produk'] }}" class="product-image">
                                @else
                                    <span>Gambar tidak tersedia</span>
                                @endif
                            </td>
                            <td>{{ $details['nama_produk'] }}</td>
                            <td>Rp.{{ number_format($details['harga'], 0, ',', '.') }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>Rp.{{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $id }}">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $totalPrice += $details['harga'] * $details['quantity'];
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="4"><strong>Total</strong></td>
                        <td><strong>Rp.{{ number_format($totalPrice, 0, ',', '.') }}</strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('checkout.show') }}" class="btn btn-primary">Checkout</a>
        @else
            <p>Keranjang belanja Anda kosong.</p>
        @endif
    </div>
</section>
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection
