<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//jangan lupa jalankan php artisan serve
Route::post('/banner', [BannerController::class, 'store']);
Route::get('/banner', [BannerController::class, 'index']);
Route::delete('/banner/{banner}', [BannerController::class, 'destroy']);
Route::get('/banner/{banner}', [BannerController::class, 'show']);
Route::put('/banner/{banner}', [BannerController::class, 'update']);

// Route::post('/produk', [ProdukController::class, 'store']);
// Route::get('/produk', [ProdukController::class, 'index']);
// Route::delete('/produk/{produk}', [BannerController::class, 'destroy']);

//php artisan route:list
Route::resource('/produk', ProdukController::class);
