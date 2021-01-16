<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('donvitinh','Api\DonViTinhController')->only(['index']);
Route::apiResource('monan','Api\MonAnController')->only(['index']);
Route::apiResource('ban','Api\BanController')->only(['index']);
Route::apiResource('danhmuc','Api\DanhMucController')->only(['index']);
Route::apiResource('hoadon','Api\HoaDonController')->only(['index']);
Route::apiResource('chitiethoadon','Api\ChiTietHoaDonController')->only(['index']);
Route::apiResource('thongtin','Api\ThongTinController')->only(['index']);
Route::apiResource('nhanvien','Api\NhanVienController')->only(['index']);
Route::apiResource('lichlam','Api\LichLamController')->only(['index']);
Route::apiResource('loaiban','Api\LoaiBanController')->only(['index']);