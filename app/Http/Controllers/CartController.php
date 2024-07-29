<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelProduk;

class CartController extends Controller
{
    // Menampilkan keranjang belanja
    public function showCart()
    {
        // Contoh penghitungan total harga dari session 'cart'
        $totalPrice = 0;
        if (session('cart')) {
            foreach (session('cart') as $id => $details) {
                $totalPrice += $details['harga'] * $details['quantity'];
            }
        }
    
        return view('kerangka.cart', compact('totalPrice'));
    }
    

    // Menambah produk ke keranjang belanja
    public function addToCart(Request $request)
    {
        $productId = $request->input('id_produk');
        $productName = $request->input('nama_produk');
        $productPrice = $request->input('harga');
        $productImg = asset('img/produk/' . $request->input('gambar_produk')); // Ubah sesuai struktur penyimpanan gambar Anda
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di keranjang, tambahkan jumlahnya
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            // Jika produk belum ada di keranjang, tambahkan ke keranjang
            $cart[$productId] = [
                'id' => $productId,
                'nama_produk' => $productName,
                'harga' => $productPrice,
                'quantity' => 1,
                'gambar_produk' => $productImg,
            ];
        }

        // Menyimpan ke session
        session()->put('cart', $cart);

        return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang']);
        // Alternatif, jika ingin redirect kembali ke halaman sebelumnya setelah menambah ke keranjang
        // return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json(['count' => $count]);
    }

    //menghapus prodak dari keranjang
    public function removeFromCart(Request $request)
    {
        $productId = $request->input('id_produk');
        $cart = session()->get('cart', []);
    
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }
    
        session()->put('cart', $cart);
    
        return redirect()->route('cart.show'); //->with('success', 'Produk berhasil dihapus dari keranjang');
    }
    

    public function checkout()
{
    // Proses checkout disini, misalnya menyimpan pesanan ke database
    
    // Kosongkan session cart setelah checkout
    session()->forget('cart');

    return redirect()->route('cart.show')->with('success', 'Checkout berhasil! Terima kasih atas pesanan Anda.');
}

}
