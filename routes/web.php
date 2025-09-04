<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\VeController;
use App\Http\Controllers\SChieuController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phim',[PhimController::class,'index']);

Route::get('/nguoi_dung', [UserController::class, 'index']);