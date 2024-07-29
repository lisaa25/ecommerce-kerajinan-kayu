@extends('layout.master')

@section('galeri')
<div class="gallery-container">
    <div class="responsive">
        <div class="gallery">
            <img src="{{ asset('img/galeri1.png') }}" alt="Foto 1">
        </div>
    </div>
    
    <div class="responsive">
        <div class="gallery">
            <img src="{{ asset('img/galeri2.png') }}" alt="Foto 2">
        </div>
    </div>
    
    <div class="responsive">
        <div class="gallery">
            <img src="{{ asset('img/galeri3.png') }}" alt="Foto 3">
        </div>
    </div>
    
    <div class="responsive">
        <div class="gallery">
            <img src="{{ asset('img/galeri4.png') }}" alt="Foto 4">
        </div>
    </div>
    <div class="responsive">

        <div class="gallery">
            <img src="{{ asset('img/galeri5.png') }}" alt="Foto 4">
        </div>
    </div>
    
    <div class="clearfix"></div>
</div>

<link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
@endsection
