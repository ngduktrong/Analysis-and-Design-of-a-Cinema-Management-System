<?php

use App\Http\Controllers\CustomerGheController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\VeController;
use App\Http\Controllers\SChieuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerHomeController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\CustomerVeController;
use App\Http\Controllers\PhimController;


Route::get('/', function () {
    return view('welcome');
});




Route::get('/login',function (){
    return view('auth.login');
})->name('login');
Route::post('/login',[CustomerAuthController::class,'login'])->name('auth.login');

Route::get('/register',function(){
    return view('auth.register');
})->name('auth.registerForm');
Route::post('/register',[CustomerAuthController::class,'register'])->name('auth.register');

Route::get('/home',[CustomerHomeController::class,'index'])->name('home');
Route::get('/home/{id}',[CustomerHomeController::class,'show'])->name('home.show');
//chon ghe
Route::get('/chon-ghe/{masuatchieu}',[CustomerGheController::class,'index'])->name('customer.ghe.index');
Route::middleware('auth')->group(function (){
    
    Route::post('/chon-ghe/{masuatchieu}',[CustomerGheController::class,'chonGhe'])->name('customer.ghe.chon');
    //xac nhan ve
    Route::get('/ve/confirm',[CustomerVeController::class,'confirm'])->name('ve.confirm');
    //dat ve
    Route::post('/ve/book',[CustomerVeController::class,'bookTicket'])->name('ve.book');
});


// Trang quản lý phim (hiển thị view AdminPhim.php)
Route::get('/admin/phim', [PhimController::class, 'showAdminPage'])->name('admin.phim');

// CRUD phim (tận dụng BaseCrudController)
Route::resource('phim', PhimController::class);
// Routes cho quản lý phòng chiếu
Route::prefix('admin')->group(function () {
    Route::get('/phongchieu', [PhongChieuController::class, 'index'])->name('admin.phongchieu.index');
    Route::post('/phongchieu', [PhongChieuController::class, 'store'])->name('admin.phongchieu.store');
    Route::put('/phongchieu/{id}', [PhongChieuController::class, 'update'])->name('admin.phongchieu.update');
    Route::delete('/phongchieu/{id}', [PhongChieuController::class, 'destroy'])->name('admin.phongchieu.destroy');
});