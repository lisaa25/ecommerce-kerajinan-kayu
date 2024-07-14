<?php

namespace App\Http\Controllers;

use App\Models\ModelAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // Login admin
    public function loginAdmin()
    {
        return view('admin.loginAdmin');
    }
 
    // Login admin post
    public function adminPost(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $admin = ModelAdmin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard')->with('success', 'Admin logged in successfully');
        } else {
            return redirect()->route('loginAdmin')->withErrors(['email' => 'Email or password is incorrect']);
        }
    }

    //dashboard admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function createAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_admin',
            'password' => 'required|string|min:8',
        ]);

        $admin = new ModelAdmin([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $admin->save();

        return redirect()->route('loginAdmin')->with('success', 'Admin created successfully');
    }
}
