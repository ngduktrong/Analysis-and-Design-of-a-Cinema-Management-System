<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\VeController;
use App\Http\Controllers\SChieuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('phim',PhimController::class);

Route::get('/login',function (){
    return view('auth.login');
})->name('auth.loginForm');
Route::post('/login',[AuthController::class,'login'])->name('auth.login');

Route::get('/register',function(){
    return view('auth.register');
})->name('auth.registerForm');
Route::post('/register',[AuthController::class,'register'])->name('auth.register');

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/home/{id}',[HomeController::class,'show'])->name('home.show');

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