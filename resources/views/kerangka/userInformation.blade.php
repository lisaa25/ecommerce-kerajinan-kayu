@extends('layout.master')

@section('user-information')
<div class="container">
    <h1>User Information</h1>
        <!-- Form untuk mengupdate informasi pengguna -->
        <form action="{{ route('user.update') }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="form-group">
                <label for="nama"><strong>Name:</strong></label>
                <input type="text" id="nama" name="nama" value="{{ $user->nama }}" required>
            </div>
    
            <div class="form-group">
                <label for="email"><strong>Email:</strong></label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
            </div>
    
            <div class="form-group">
                <label for="no_telepon"><strong>Phone Number:</strong></label>
                <input type="text" id="no_telepon" name="no_telepon" value="{{ $user->no_telepon }}" required>
            </div>
    
            <div class="form-group">
                <label for="alamat"><strong>Address:</strong></label>
                <input type="text" id="alamat" name="alamat" value="{{ $user->alamat }}" required style="color: black; background-color: white; border: 1px solid #666;">
            </div>
    
            <button type="submit" class="update-btn">Update Information</button>
        </form>
    </div>
    <link rel="stylesheet" href="{{ asset('css/user-information.css') }}">
    @endsection
    