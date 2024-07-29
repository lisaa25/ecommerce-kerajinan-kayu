@extends('layout.master')
@section('register')
    <section id="register">
        <form action="{{ route('registrationPost') }}" method="POST">
            <div class="container">
                @csrf
                <h1>Buat Akun</h1>
                <p>Isi form dibawah ini untuk mendaftar akun </p>

                <div class="signin">
                    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a>.</p>
                </div>
                <hr>
                <label for="nama"><b>Nama</b></label>
                <input type="text" placeholder="Masukkan nama anda" name="nama" id="nama" required>

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Masukkan email anda" name="email" id="email" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Buat password" name="password" id="password" required>

                <label for="password_confirmation"><b>Konfirmasi Password</b></label>
                <input type="password" placeholder="Ulangi password" name="password_confirmation" id="password_confirmation"
                    required>

                <label for="no_telepon"><b>No. Telepon</b></label>
                <input type="text" placeholder="Masukkan nomor telepon" name="no_telepon" id="no_telepon" required>

                <label for="alamat"><b>Alamat</b></label>
                <input type="text" placeholder="Masukkan alamat" name="alamat" id="alamat" required>

                <hr>
                <button type="submit" class="register-btn">Register</button>
            </div>
        </form>
    </section>
    <!-- memanggil css navbar -->
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
