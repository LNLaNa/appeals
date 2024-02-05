<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppealController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AppealController::class,'index']);
Route::post('/create', [AppealController::class,'store'])->name('appeals.store');

Route::get('/admin',[AdminController::class,'index'])->name('admin');
Route::put('/admin/addAnswer/{appeal}',[AdminController::class,'addAnswer'])->name('addAnswer');
Route::get('/admin/deleteAppeal/{appeal}',[AdminController::class,'deleteAppeal'])->name('deleteAppeal');
