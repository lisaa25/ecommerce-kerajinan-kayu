<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelUser;

class UserInformationController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('kerangka.userInformation', compact('user'));
    }
    
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_user,email,' . $user->id,
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        // Memastikan bahwa $user adalah instance ModelUser
        if ($user instanceof ModelUser) {
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->no_telepon = $request->no_telepon;
            $user->alamat = $request->alamat;
            $user->save(); // Memastikan menggunakan metode save() pada ModelUser
        } else {
            // Handle error jika $user bukan instance dari ModelUser
            return redirect()->back()->withErrors(['message' => 'User data is invalid.']);
        }

        return redirect()->route('user.show')->with('success', 'Information updated successfully.');
    }

}
