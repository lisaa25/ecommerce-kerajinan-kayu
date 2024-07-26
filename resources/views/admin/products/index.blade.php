@extends('admin.dashboard')
@section('content')
<div class="container">
    <h1>Product List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar Produk</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id_produk }}</td>
                <td>
                    @if ($product->gambar_produk)
                        <img src="{{ asset('img/produk/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}" width="100">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>{{ $product->nama_produk }}</td>
                <td>{{ number_format($product->harga, 0, ',', '.') }}</td>
                <td>{{ $product->deskripsi }}</td>
                <td>
                    <div class="button-container">
                        @if ($product->is_active)
                            <!-- Deactivate Button -->
                            <form action="{{ route('admin.products.deactivate', $product->id_produk) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-deactivate">Deactivate</button>
                            </form>
                        @else
                            <!-- Activate Button -->
                            <form action="{{ route('admin.products.activate', $product->id_produk) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-success">Activate</button>
                            </form>
                        @endif
                        <!-- Edit and Delete Buttons -->
                        <a href="{{ route('admin.products.edit', $product->id_produk) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.products.delete', $product->id_produk) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- css -->
<link rel="stylesheet" href="{{ asset('css/admin/tabelProduk.css') }}">

@endsection
