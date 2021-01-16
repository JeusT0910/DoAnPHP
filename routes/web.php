<?php

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
Route::middleware(['checklogin'])->group(function () {


Route::get('/notification',("ThongBaoController@index"))->name('thongbao.create');

Route::post('/notification/submit',("ThongBaoController@hienthi"))->name('thongbao.store');

//Món ăn


Route::get('/',("MonAnController@index"))->name('monan.index');


Route::get('/monan',("MonAnController@index"))->name('monan.index');

Route::get('/monan/create',("MonAnController@create"))->name('monan.create');

Route::post('/monan/store',("MonAnController@store"))->name('monan.store');

Route::get('/monan/{id}/edit',("MonAnController@edit"))->name('monan.edit');

Route::delete('/monan/{id}',("MonAnController@destroy"))->name('monan.destroy');

Route::put('/monan/{id}',("MonAnController@update"))->name('monan.update');

Route::put('/monan/update/{id}',("MonAnController@updatetrangthai"))->name('monan.updatetrangthai');

Route::get('/monan/{id}',("MonAnController@show"))->name('monan.show');

Route::get('/search',("MonAnController@search"))->name('monan.search');
//Hóa đơn

Route::get('/hoadon',("HoaDonController@index"))->name('hoadon.index');

Route::get('/hoadon/create',("HoaDonController@create"))->name('hoadon.create');

Route::post('/hoadon/store',("HoaDonController@store"))->name('hoadon.store');

Route::get('/hoadon/{id}/edit',("HoaDonController@edit"))->name('hoadon.edit');

Route::put('/hoadon/{id}',("HoaDonController@update"))->name('hoadon.update');

Route::put('/hoadon/update/{id}',("HoaDonController@updatetrangthai"))->name('hoadon.updatetrangthai');

Route::get('hoadon/search',("HoaDonController@search"))->name('hoadon.search');

//Bàn
//Route::get('/search', 'BanController@search');
Route::get('/ban',("BanController@index"))->name('ban.index');

Route::get('/ban/create',("BanController@create"))->name('ban.create');

Route::post('/ban/store',("BanController@store"))->name('ban.store');

Route::get('/ban/{id}/edit',("BanController@edit"))->name('ban.edit');

Route::put('/ban/{id}',("BanController@update"))->name('ban.update');

Route::put('/ban/update/{id}',("BanController@updatetrangthai"))->name('ban.updatetrangthai');

Route::get('ban/search',("BanController@search"))->name('ban.search');


//Nhân Viên

Route::get('/nhanvien',("NhanVienController@index"))->name('nhanvien.index');

Route::get('/nhanvien/create',("NhanVienController@create"))->name('nhanvien.create');

Route::post('/nhanvien/store',("NhanVienController@store"))->name('nhanvien.store');

Route::get('/nhanvien/{id}/edit',("NhanVienController@edit"))->name('nhanvien.edit');

Route::put('/nhanvien/{id}',("NhanVienController@update"))->name('nhanvien.update');

Route::put('/nhanvien/update/{id}',("NhanVienController@updatetrangthai"))->name('nhanvien.updatetrangthai');

Route::get('nhanvien/search',("NhanVienController@search"))->name('nhanvien.search');

//Danh Mục
Route::get('/danhmuc',("DanhMucController@index"))->name('danhmuc.index');

Route::get('/danhmuc/create',("DanhMucController@create"))->name('danhmuc.create');

Route::post('/danhmuc/store',("DanhMucController@store"))->name('danhmuc.store');

Route::get('/danhmuc/{id}/edit',("DanhMucController@edit"))->name('danhmuc.edit');

Route::put('/danhmuc/{id}',("DanhMucController@update"))->name('danhmuc.update');

Route::put('/danhmuc/update/{id}',("DanhMucController@updatetrangthai"))->name('danhmuc.updatetrangthai');

Route::get('danhmuc/search',("DanhMucController@search"))->name('danhmuc.search');

//Đơn vị Tính
Route::get('/donvitinh',("DonViTinhController@index"))->name('donvitinh.index');

Route::get('/donvitinh/create',("DonViTinhController@create"))->name('donvitinh.create');

Route::post('/donvitinh/store',("DonViTinhController@store"))->name('donvitinh.store');

Route::get('/donvitinh/{id}/edit',("DonViTinhController@edit"))->name('donvitinh.edit');

Route::put('/donvitinh/{id}',("DonViTinhController@update"))->name('donvitinh.update');

Route::get('donvitinh/search',("DonViTinhController@search"))->name('donvitinh.search');

Route::put('/donvitinh/update/{id}',("DonViTinhController@updatetrangthai"))->name('donvitinh.updatetrangthai');
//Loại bàn

Route::get('/loaiban',("LoaiBanController@index"))->name('loaiban.index');

Route::get('/loaiban/create',("LoaiBanController@create"))->name('loaiban.create');

Route::post('/loaiban/store',("LoaiBanController@store"))->name('loaiban.store');

Route::get('/loaiban/{id}/edit',("LoaiBanController@edit"))->name('loaiban.edit');

Route::put('/loaiban/{id}',("LoaiBanController@update"))->name('loaiban.update');

Route::put('/loaiban/update/{id}',("LoaiBanController@updatetrangthai"))->name('loaiban.updatetrangthai');

Route::get('/loaiban/search',("LoaiBanController@search"))->name('loaiban.search');
// Lịch làm
Route::get('/lichlam',("LichLamController@index"))->name('lichlam.index');

Route::get('/lichlam/create',("LichLamController@create"))->name('lichlam.create');

Route::post('/lichlam/store',("LichLamController@store"))->name('lichlam.store');


Route::get('/lichlam/{id}/edit',("LichLamController@edit"))->name('lichlam.edit');

Route::put('/lichlam/{id}',("LichLamController@update"))->name('lichlam.update');

Route::delete('/lichlam/delete/{id}',("LichLamController@destroy"))->name('lichlam.delete');

Route::get('/lichlam/search',("LichLamController@search"))->name('lichlam.search');



});

//Login


Route::get('login',"LoginController@index")->name('login.index');

Route::post('login',"LoginController@login")->name('login.login');

Route::get('logout',"LoginController@logout")->name('login.logout');

