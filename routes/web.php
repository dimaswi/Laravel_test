<?php

use App\Http\Controllers\QueuEmail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\CategoryController::class, 'call_data'])->name('data_category');
Route::post('/', [App\Http\Controllers\CategoryController::class, 'search_data'])->name('search');
Route::post('create_data', [App\Http\Controllers\CategoryController::class, 'create_data'])->name('create_data');
Route::get('/tambah_data', function () {
    return view('create_category');
})->name('tambah_data');
Route::get('/edit_data/{id}', [App\Http\Controllers\CategoryController::class, 'edit_data_index'])->name('edit_data_index');
Route::post('simpan_data', [App\Http\Controllers\CategoryController::class, 'edit_data'])->name('edit_data');
Route::get('/hapus_data/{id}', [App\Http\Controllers\CategoryController::class, 'hapus_data'])->name('hapus_data');
Route::get('sending_emails', [QueuEmail::class,'QueuEmail']);
