<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelOrder;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;

class PaymentNotificationController extends Controller
{
    public function handle(Request $request)
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Buat instance notifikasi
        $notification = new Notification();

        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraud = $notification->fraud_status;

        // Cari order berdasarkan ID
        $order = ModelOrder::find($orderId);

        if (!$order) {
            Log::error('Order not found: ' . $orderId);
            return response()->json(['status' => 'order not found'], 404);
        }

        // Update status order berdasarkan notifikasi
        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $order->status = 'Challenge by FDS';
                } else {
                    $order->status = 'Success';
                }
            }
        } elseif ($transaction == 'settlement') {
            $order->status = 'Settlement';
        } elseif ($transaction == 'pending') {
            $order->status = 'Pending';
        } elseif ($transaction == 'deny') {
            $order->status = 'Denied';
        } elseif ($transaction == 'expire') {
            $order->status = 'Expired';
        } elseif ($transaction == 'cancel') {
            $order->status = 'Canceled';
        }

        // Simpan status transaksi
        $order->save();

        return response()->json(['status' => 'success']);
    }
}
