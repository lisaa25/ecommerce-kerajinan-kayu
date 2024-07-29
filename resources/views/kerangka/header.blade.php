@extends('layout.master')

@section('header')
 <!-- Header -->
 <header id="home">
    <div class="container-satu">
      <h1>WELCOME <b>Korean Food</b></h1>
      <p>
        Selamat datang di situs kami yang menghadirkan kelezatan makanan
        Korea! <br />
        Temukan ragam hidangan autentik yang memikat lidah Anda. Selamat
        menikmati pengalaman kuliner Korea yang tak terlupakan!
      </p>
      <button id="loginButton">Login</button>
      <button id="pesanButton">Pesan Sekarang</button>
    </div>
  </header>
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <!-- Header end -->
  @endsection
