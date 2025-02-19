<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $totalPrice = 0;
        $snapToken = null; // Default value untuk snapToken

        if (session('cart')) {
            foreach (session('cart') as $id => $details) {
                $totalPrice += $details['harga'] * $details['quantity'];
            }
        }

        // Proses hanya jika ada item di dalam keranjang
        if ($totalPrice > 0) {
            try {
                $transaction_details = [
                    'order_id' => uniqid(),
                    'gross_amount' => $totalPrice,
                ];
                $items = [];
                foreach (session('cart') as $item) {
                    $items[] = [
                        'id' => $item['id'],
                        'price' => $item['harga'],
                        'quantity' => $item['quantity'],
                        'name' => $item['nama_produk'],
                    ];
                }
                $customer_details = [
                    'first_name' => auth()->user()->nama,
                    'email' => auth()->user()->email,
                ];
                $transaction = [
                    'transaction_details' => $transaction_details,
                    'item_details' => $items,
                    'customer_details' => $customer_details,
                ];
                Config::$serverKey = config('midtrans.server_key');
                Config::$isProduction = config('midtrans.is_production');
                Config::$isSanitized = config('midtrans.is_sanitized');
                Config::$is3ds = config('midtrans.is_3ds');
                $snapToken = Snap::getSnapToken($transaction);
            } catch (\Exception $e) {
                // Handle the exception
            }
        }

        return view('kerangka.checkout', compact('totalPrice', 'snapToken'));
    }

    public function processCheckout(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $transaction_details = [ 
            'order_id' => uniqid(),
            'gross_amount' => $request->input('total_price'),
        ];

        // Proses lebih lanjut seperti menyimpan ke database, dll.

        // Kosongkan session cart setelah checkout berhasil
        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', 'Checkout berhasil! Terima kasih atas pesanan Anda.');
    }
}
