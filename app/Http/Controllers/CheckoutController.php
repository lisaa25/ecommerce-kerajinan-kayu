<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;


class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $totalPrice = 0;
        if (session('cart')) {
            foreach (session('cart') as $id => $details) {
                $totalPrice += $details['harga'] * $details['quantity'];
            }
        }

        // Debugging
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
            //dd($transaction, $snapToken); // Debugging
        } catch (\Exception $e) {
            //dd($e->getMessage()); // Debugging
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
            'gross_amount' => $request->total_price,
        ];

        $items = [];
        foreach (json_decode($request->cart, true) as $item) {
            $items[] = [
                'id' => $item['id'],
                'price' => $item['harga'],
                'quantity' => $item['quantity'],
                'name' => $item['nama_produk'],
            ];
        }

        $customer_details = [
            'first_name' => $request->user()->nama,
            'email' => $request->user()->email,
        ];

        $transaction = [
            'transaction_details' => $transaction_details,
            'item_details' => $items,
            'customer_details' => $customer_details,
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction);
            return view('kerangka.checkout', ['totalPrice' => $request->total_price, 'snapToken' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

