@extends('layout.master')

@section('checkout')
<section id="cart" style=" background-color: #d6efd8;">
    <div class="container">
        <h1>Checkout</h1>
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
                                    <img src="{{ asset('img/produk/'.$details['gambar_produk']) }}" alt="{{ $details['nama_produk'] }}" class="product-image">
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
            <div class="checkout-button">
                <form id="payment-form" method="post" action="{{ route('checkout.process') }}">
                    @csrf
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <input type="hidden" name="cart" value="{{ json_encode(session('cart')) }}">
                    <button id="pay-button" type="submit">Bayar Sekarang</button>
                </form>
            </div>
        @else
            <p>Keranjang belanja Anda kosong.</p>
        @endif
    </div>
</section>
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
    document.getElementById('payment-form').addEventListener('submit', function (event) {
        event.preventDefault();
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                console.log(result);
                document.getElementById('payment-form').submit();
            },
            onPending: function(result) {
                console.log(result);
                document.getElementById('payment-form').submit();
            },
            onError: function(result) {
                console.log(result);
                alert('Pembayaran gagal! Silakan coba lagi.');
            },
            onClose: function() {
                alert('Anda menutup popup tanpa menyelesaikan pembayaran.');
            }
        });
    });
</script>
@endsection
