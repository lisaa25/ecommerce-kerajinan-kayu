<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //untuk registrasi user
    public function registration()
    {
        return view('kerangka.register');
    }

    // registration user post dari form
    public function registrationPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_user',
            'password' => 'required|string|min:8|confirmed',
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        // Membuat user baru
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ];

        ModelUser::create($data);
        //redirect ke halaman login setelah registrasi
        return redirect()->route('login');
    }



    // login user
    public function login()
    {
        return view('kerangka.login');
    }

    // login user post dari form
    public function loginPost(Request $request)
    {
        //validasi input
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        //kredensial
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        } else {
            return redirect()->route('login')->withErrors(['email' => 'Email atau password salah']);
        }

    }

    // logout user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); //ke halaman utama
    }

}
