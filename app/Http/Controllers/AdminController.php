<?php

namespace App\Http\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelProduk;
use App\Models\ModelUser;
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
            return redirect()
                ->route('loginAdmin')
                ->withErrors(['email' => 'Email or password is incorrect']);
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

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('admin.loginAdmin');
        //return redirect('/admin/login'); // Redirect to admin login page
    }

    // Menampilkan produk
    public function showProducts()
    {
        $products = ModelProduk::all();
        return view('admin.products.index', compact('products'));
    }

    // Menghapus produk
    public function deleteProduct($id)
    {
        $product = ModelProduk::find($id);
        if ($product) {
            $product->delete();
            return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
        }
        return redirect()->route('admin.products')->with('error', 'Product not found');
    }

    // Edit produk (menampilkan form edit)
    public function editProduct($id)
    {
        $product = ModelProduk::find($id);
        if ($product) {
            return view('admin.products.edit', compact('product'));
        }
        return redirect()->route('admin.products')->with('error', 'Product not found');
    }

    // Update produk (memproses form edit)
    public function updateProduct(Request $request, $id)
    {
        $product = ModelProduk::find($id);
        if ($product) {
            $product->update($request->all());
            return redirect()->route('admin.products')->with('success', 'Product updated successfully');
        }
        return redirect()->route('admin.products')->with('error', 'Product not found');
    }

    // Nonaktifkan produk
    public function deactivateProduct($id)
    {
        $product = ModelProduk::find($id);
        if ($product) {
            $product->is_active = false; // Asumsikan ada kolom is_active di tabel produk
            $product->save();
            return redirect()->route('admin.products')->with('success', 'Product deactivated successfully');
        }
        return redirect()->route('admin.products')->with('error', 'Product not found');
    }

    // Mengaktifkan produk
    public function activateProduct($id)
    {
        $product = ModelProduk::find($id);
        if ($product) {
            $product->is_active = true; // Aktifkan produk
            $product->save();
            return redirect()->route('admin.products')->with('success', 'Product activated successfully');
        }
        return redirect()->route('admin.products')->with('error', 'Product not found');
    }

    // Menampilkan data pengguna
    public function showUsers()
    {
        $users = ModelUser::all(); // Ambil semua data pengguna dari tabel tb_user
        return view('admin.dataUser', compact('users'));
    }
}
