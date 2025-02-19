<?php

namespace App\Http\Controllers;

use App\Models\ModelContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'pesan' => 'required|string',
        ]);

        ModelContact::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

    
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }
}
