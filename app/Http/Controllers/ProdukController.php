<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelProduk; //model produk

class ProdukController extends Controller
{
 // Menampilkan semua produk di halaman produk
    public function showproduk()
    {
        $kerajinan = ModelProduk::where('kategori', 'kerajinan')->where('is_active', true)->get();
        $furniture = ModelProduk::where('kategori', 'furniture')->where('is_active', true)->get();
    
        return view('kerangka.produk', compact('kerajinan', 'furniture'));
    }

    // Menampilkan 5 produk di landingpage
    public function produkLandingpage()
    {
        $kerajinan = ModelProduk::where('kategori', 'kerajinan')->where('is_active', true)->take(5)->get();
        $furniture = ModelProduk::where('kategori', 'furniture')->where('is_active', true)->take(5)->get();
    
        return view('layout.landingpage', compact('kerajinan', 'furniture'));
    }

    // Menampilkan detail produk
    public function show($id_produk)
    {
        $produk = ModelProduk::findOrFail($id_produk);
        return view('kerangka.detailProduk', compact('produk'));
    }

    // Mencari produk
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Mencari produk berdasarkan nama atau deskripsi
        $products = ModelProduk::where('nama_produk', 'LIKE', "%{$query}%")
            ->orWhere('deskripsi', 'LIKE', "%{$query}%")
            ->get();

        return view('kerangka.search', compact('products', 'query'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('admin.products.create');
    }

    // Menyimpan produk baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string|max:255',
            'gambar_produk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = new ModelProduk();
        $product->nama_produk = $request->nama_produk;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->kategori = $request->kategori;

        if ($request->hasFile('gambar_produk')) {
            $image = $request->file('gambar_produk');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/produk'), $imageName);
            $product->gambar_produk = $imageName;
        } else {
            $product->gambar_produk = null;
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Produk berhasil ditambahkan');
    }
}
