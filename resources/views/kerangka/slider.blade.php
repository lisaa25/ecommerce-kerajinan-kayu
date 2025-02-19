<!-- Slider.blade.php -->
@extends('layout.master')

@section('slider')
<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="{{ asset('img/slider/1.png') }}">
        <div class="text">Garansi Furniture</div>
    </div>
    <div class="mySlides fade">
        <img src="{{ asset('img/slider/2.png') }}">
        <div class="text">Hadiah pembelian</div>
    </div>
    <div class="mySlides fade">
        <img src="{{ asset('img/slider/3.png') }}">
        <div class="text">Produk Baru</div>
    </div>
    <div class="mySlides fade">
        <img src="{{ asset('img/slider/4.png') }}">
        <div class="text">Kurasi Pasar</div>
    </div>
</div>

<!-- Panggil CSS -->
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">

<!-- Panggil JavaScript -->
<script src="{{ asset('js/slider.js') }}"></script>
@endsection 
