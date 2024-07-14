@extends('layout.master')

@section('content')

<div class="slider">
    @include('kerangka.slider')
</div>

<div class="content">
    @include('kerangka.about')
</div>

<div class="produk">
    @include('kerangka.produk')
</div>

<div class="content">
    @include('kerangka.kontak')
</div>
@endsection
