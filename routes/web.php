<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserInformationController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentNotificationController;


// Menguji koneksi database
Route::get('test-connection', function () {
    dd(DB::connection()->getPdo());
});

// Tampilan landingpage
Route::get('', function () {
    return view('layout.landingpage');
});

// Rute Navbar
Route::get('/home', [NavbarController::class, 'home'])->name('home');
Route::get('/produk', [NavbarController::class, 'produk'])->name('produk');
Route::get('/about', [NavbarController::class, 'about'])->name('about');
Route::get('/kontak', [NavbarController::class, 'kontak'])->name('kontak');

// Rute produk di navbar dan landingpage
Route::get('/viewproduk', [ProdukController::class, 'showproduk'])->name('viewproduk');
Route::get('', [ProdukController::class, 'produkLandingpage'])->name('test');

// Rute kontak
Route::post('/pesan', [ContactController::class, 'store'])->name('pesan.store');

// Rute untuk autentikasi
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/registration', [AuthController::class, 'registrationPost'])->name('registrationPost');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute admin login dan logout
Route::get('/loginAdmin', [AdminController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/admin', [AdminController::class, 'adminPost'])->name('adminPost');

// Middleware untuk admin
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Menampilkan form input produk
    Route::get('/admin/products/create', [ProdukController::class, 'create'])->name('admin.products.create');

    // Menyimpan produk baru
    Route::post('/admin/products/store', [ProdukController::class, 'store'])->name('admin.products.store');

    Route::get('/admin/products', [AdminController::class, 'showProducts'])->name('admin.products');
    Route::delete('/admin/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
    Route::get('/admin/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::post('/admin/products/{id}/deactivate', [AdminController::class, 'deactivateProduct'])->name('admin.products.deactivate');
    Route::post('/admin/products/{id}/activate', [AdminController::class, 'activateProduct'])->name('admin.products.activate');

    // Routes untuk data user
    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
});



// Rute detail produk
Route::get('/produk/{id_produk}', [ProdukController::class, 'show'])->name('produk.show');

// Middleware untuk menampilkan dan mengupdate informasi pengguna
Route::get('/user-information', [UserInformationController::class, 'show'])
    ->name('user.show')
    ->middleware('auth');
Route::put('/user-update', [UserInformationController::class, 'update'])
    ->name('user.update')
    ->middleware('auth');

// Rute keranjang belanja (cart)
Route::post('/cart/add', [CartController::class, 'addToCart'])
    ->name('cart.add')
    ->middleware('auth');
Route::get('/cart', [CartController::class, 'showCart'])
    ->name('cart.show')
    ->middleware('auth');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


// Rute pencarian
Route::get('/search', [ProdukController::class, 'search'])->name('search');

// Rute checkout
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

//route membalas pesan
Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
Route::post('/admin/messages/reply', [MessageController::class, 'reply'])->name('admin.messages.reply');
Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.delete');

//pemanggilan database
Route::post('/payment/notification', [PaymentNotificationController::class, 'handle']);
