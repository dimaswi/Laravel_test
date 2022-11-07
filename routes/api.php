<?php

use App\Http\Controllers\CategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/get_data', [CategoryApiController::class, 'get_data']);
Route::post('/tambah_data', [CategoryApiController::class, 'create_data']);
Route::post('/edit_data/{id}', [CategoryApiController::class, 'edit_data']);
Route::post('/delete_data/{id}', [CategoryApiController::class, 'delete_data']);
