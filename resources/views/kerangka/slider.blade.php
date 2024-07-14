<!-- Slider.blade.php -->
@extends('layout.master')

@section('slider')
<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="{{ asset('img/slider2.png') }}">
        <div class="text">Caption Text</div>
    </div>
    <div class="mySlides fade">
        <img src="{{ asset('img/slider5.png') }}">
        <div class="text">Caption Text</div>
    </div>
    <div class="mySlides fade">
        <img src="{{ asset('img/slider3.png') }}">
        <div class="text">Caption Text</div>
    </div>
</div>

<!-- Panggil CSS -->
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">

<!-- Panggil JavaScript -->
<script src="{{ asset('js/slider.js') }}"></script>
@endsection 
