<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/')->name('sanpham.')->group(function () {
    Route::get('/san-pham', [ProductController::class, 'san_pham'])->name('san_pham');
    Route::get('/tao_moi-san-pham', [ProductController::class, 'tao_moi_san_pham'])->name('tao_moi_san_pham');
    Route::post('/tao-moi-san-pham', [ProductController::class, 'store_san_pham'])->name('store_san_pham');
    Route::get('/sua-san-pham/{id}', [ProductController::class, 'sua_san_pham'])->name('sua_san_pham');
    Route::post('/edit-san-pham/{id}', [ProductController::class, 'edit_san_pham'])->name('edit_san_pham');
    Route::delete('/xoa-san-pham/{id}', [ProductController::class, 'xoa_san_pham'])->name('xoa_san_pham');
});
Route::prefix('/danh-muc')->name('danhmuc.')->group(function(){
    Route::get('/', [CategoryController::class, 'danhmuc'])->name('danhmuc');
    Route::get('/tao-moi-danh-muc', [CategoryController::class, 'tao_moi_danh_muc'])->name('tao_moi_danh_muc');
    Route::post('/tao-moi-danh-muc', [CategoryController::class, 'store_danh_muc'])->name('store_danh_muc');
    Route::get('/sua-danh-muc/{id}', [CategoryController::class, 'sua_danh_muc'])->name('sua_danh_muc');
    Route::post('/sua-danh-muc/{id}', [CategoryController::class, 'edit_danh_muc'])->name('edit_danh_muc');
    Route::delete('/xoa-danh-muc/{id}', [CategoryController::class, 'xoa_danh_muc'])->name('xoa_danh_muc');
});
Route::prefix('/thuong-hieu')->name('thuonghieu.')->group(function(){
    Route::get('/', [BrandController::class, 'thuonghieu'])->name('thuonghieu');
    Route::get('/tao-moi-thuong-hieu', [BrandController::class, 'tao_moi_thuong_hieu'])->name('tao_moi_thuong_hieu');
    Route::post('/tao-moi-thuong-hieu', [BrandController::class, 'store_thuong_hieu'])->name('store_thuong_hieu');
    Route::get('/sua-thuong-hieu/{id}', [BrandController::class, 'sua_thuong_hieu'])->name('sua_thuong_hieu');
    Route::post('/sua-thuong-hieu/{id}', [BrandController::class, 'edit_thuong_hieu'])->name('edit_thuong_hieu');
    Route::delete('/xoa-thuong-hieu/{id}', [BrandController::class, 'xoa_thuong_hieu'])->name('xoa_thuong_hieu');
});
