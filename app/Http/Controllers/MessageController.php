<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelContact; 
use Illuminate\Support\Facades\Mail; // email
use App\Mail\ReplyMessage;


class MessageController extends Controller
{
    // Menampilkan semua pesan dari user
    public function index()
    {
        $messages = ModelContact::all(); // Pastikan nama model dan table sesuai
        return view('admin.messages', compact('messages'));
    }

    // Mengirim balasan email ke user
    public function reply(Request $request)
    {
        $request->validate([
            'message_id' => 'required|exists:tb_kontak,id_kontak',
            'reply_message' => 'required|string',
        ]);

        $message = ModelContact::where('id_kontak', $request->message_id)->firstOrFail();

        Mail::to($message->email)->send(new ReplyMessage($request->reply_message));

        //return redirect()->route('admin.messages')->with('success', 'Balasan berhasil dikirim!');
    }

    public function destroy($id)
    {
        $message = ModelContact::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}

