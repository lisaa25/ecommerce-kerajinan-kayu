<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelProduk; //model produk

class ProdukController extends Controller
{
    //menampilkan semua produk di produk
    public function showproduk()
    {
        $result = ModelProduk::get();
        $kerajinan = ModelProduk::where('kategori', 'kerajinan')->get();
        $furniture = ModelProduk::where('kategori', 'furniture')->get();

        return view('kerangka.produk', compact('kerajinan', 'furniture'));

        //(produknya semua)
        //$data = ModelProduk::all();
        //return view('kerangka.produk', compact('data'));
    }

    //menampilkan 5 produk di landingpage
    public function produkLandingpage()
    {
        $kerajinan = ModelProduk::where('kategori', 'kerajinan')->take(5)->get();
        $furniture = ModelProduk::where('kategori', 'furniture')->take(5)->get();

        return view('layout.landingpage', compact('kerajinan', 'furniture'));
    }

    //menampilkan detail produk
    public function show($id_produk)
    {
        $produk = ModelProduk::findOrFail($id_produk);
        return view('kerangka.detailProduk', compact('produk'));
    }

    //search produk
    public function search(Request $request)
    {
        $query = $request->input('query');

        //mencari produk berdasarkan nama atau deskripsi
        $products = ModelProduk::where('nama_produk', 'LIKE', "%{$query}%")
            ->orWhere('deskripsi', 'LIKE', "%{$query}%")
            ->get();

        //dd($products);

        // menampilkan hasil pencarian ke view
        return view('kerangka.search', compact('products', 'query'));
    }
}
