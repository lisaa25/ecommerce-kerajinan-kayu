@extends('layout.master')

@section('checkout')
<section id="checkout">
    <div class="container">
        <h1>Checkout</h1>
        <form id="payment-form" method="post" action="{{ route('checkout.process') }}">
            @csrf
            <input type="hidden" name="total_price" value="{{ $totalPrice }}">
            <input type="hidden" name="cart" value="{{ json_encode(session('cart')) }}">
            <button id="pay-button" type="submit">Pay Now</button>
        </form>
    </div>
</section>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
    document.getElementById('payment-form').addEventListener('submit', function (event) {
        event.preventDefault();
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                console.log(result);
            },
            onPending: function(result) {
                console.log(result);
            },
            onError: function(result) {
                console.log(result);
            }
        });
    });
</script>
@endsection
