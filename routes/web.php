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

