@extends('layout.master')

@section('checkout')
<section id="checkout">
    <div class="container-checkout">
        <h1 id="checkout-h1">Checkout</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @auth
            <div class="user-info">
                <p><strong>Informasi Penerima :</strong></p>
                <p><strong>Nama:</strong> {{ auth()->user()->nama }}</p>
                <p><strong>Alamat:</strong> {{ auth()->user()->alamat }}</p>
                <p><strong>Telepon:</strong> {{ auth()->user()->no_telepon }}</p>
            </div>
        @endauth

        @if (session('cart') && count(session('cart')) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach (session('cart') as $id => $details)
                        <tr>
                            <td>{{ $details['nama_produk'] }}</td>
                            <td>Rp.{{ number_format($details['harga'], 0, ',', '.') }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>Rp.{{ number_format($details['harga'] * $details['quantity'], 0, ',', '.') }}</td>
                        </tr>
                        @php
                            $totalPrice += $details['harga'] * $details['quantity'];
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong>Rp.{{ number_format($totalPrice, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>

            <div class="checkout-buttons">
                <a href="{{ route('cart.show') }}" class="btn btn-secondary" id="cancel-button">Batal</a>
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
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

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
