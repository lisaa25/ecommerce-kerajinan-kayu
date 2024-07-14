<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProdukController;//produk
use App\Http\Controllers\NavbarController; //navbar
use App\Http\Controllers\ContactController; //kontak
use App\Http\Controllers\AuthController; //auth
use App\Http\Controllers\AdminController; //admin
use App\Http\Controllers\CartController; //cart
use App\Http\Controllers\UserInformationController; //user information
use App\Http\Controllers\CheckoutController; //checkout

//menguji database
Route::get('test-connection', function() { 
    dd(DB::connection()->getPdo());
    });

//tampilan landingpage
Route::get('', function () {
    return view('layout.landingpage');
});

//route navbar
Route::get('/home', [NavbarController::class, 'home'])->name('home');
Route::get('/produk', [NavbarController::class, 'produk'])->name('produk');
Route::get('/about', [NavbarController::class, 'about'])->name('about');
Route::get('/kontak', [NavbarController::class, 'kontak'])->name('kontak');

//route navbar produk
Route::get('/viewproduk', [ProdukController::class, 'showproduk'])->name('viewproduk');
//route landingpage produk
Route::get('', [ProdukController::class, 'produkLandingpage'])->name('test');

//route kontak
Route::post('/pesan', [ContactController::class, 'store'])->name('pesan.store');

// registrasi
route::get('/registration', [AuthController::class, 'registration'])->name('registration');
route::post('/registration', [AuthController::class, 'registrationPost'])->name('registrationPost');

// login
route::get('/login', [AuthController::class, 'login'])->name('login');
route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');

// login admin
Route::get('/loginAdmin', [AdminController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/admin', [AdminController::class, 'adminPost'])->name('adminPost');

//dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

//detail produk
route::get('/produk/{id_produk}', [ProdukController::class, 'show'])->name('produk.show');

//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//middleware untuk menampilkan user information
Route::get('/user-information', [UserInformationController::class, 'show'])->name('user.information')->middleware('auth');

//informasi user
Route::get('/user-information', [UserInformationController::class, 'show'])->name('user.show')->middleware('auth');
// update informasi user
Route::put('/user-update', [UserInformationController::class, 'update'])->name('user.update')->middleware('auth');

// cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show')->middleware('auth');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

// hapus produk dicart
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');

//search
Route::get('/search', [ProdukController::class, 'search'])->name('search');


//checkout
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
