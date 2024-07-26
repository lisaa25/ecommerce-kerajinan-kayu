@extends('admin.dashboard') <!-- Pastikan Anda memiliki layout admin yang digunakan -->

@section('content')
<div class="container">
    <h1>Data User</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id_user }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->no_telepon }}</td>
                <td>{{ $user->alamat }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <!-- Contoh action, misalnya untuk melihat detail -->
                    <a href="#" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<link rel="stylesheet" href="{{ asset('css/admin/dataUser.css') }}">

@endsection
