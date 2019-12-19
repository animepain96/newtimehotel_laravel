<?php

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

/*Home*/
Route::get('/', 'Home\HomeController@index');
Route::get('/about', 'Home\HomeController@getAbout');
Route::get('/contact', 'Home\HomeController@getContact');
Route::get('/news', 'Home\HomeController@getNews');
Route::get('/news/{id}', 'Home\HomeController@getSingleNews');
Route::get('/login', 'Home\CustomerController@getLogin');
Route::post('/login', 'Home\CustomerController@postLogin');
Route::get('/register', 'Home\CustomerController@getRegister');
Route::post('/register', 'Home\CustomerController@postRegister');
Route::get('/logout', 'Home\CustomerController@logout')->middleware('customer');
Route::get('/account', 'Home\CustomerController@getAccount')->middleware('customer');
Route::get('/review', 'Home\CustomerController@getReview')->middleware('customer');
Route::get('/account/edit', 'Home\CustomerController@getEditAccount')->middleware('customer');
Route::post('/account/edit', 'Home\CustomerController@postEditAccount')->middleware('customer');
Route::get('/room', 'Home\HomeController@getRoom');
Route::get('/room/{id}', 'Home\HomeController@getSingleRoom');
Route::post('/room/reservation', 'Home\HomeController@postReservation')->middleware('customer');
Route::get('/search', 'Home\HomeController@searchRoom');

/*Admin*/
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::resource('/admin/khachhang', 'KhachHangController');
Route::resource('/admin/vitri', 'ViTriController');
Route::resource('/admin/loaiphong', 'LoaiPhongController');
Route::resource('/admin/loaitin', 'LoaiTinController');
Route::resource('/admin/slideshow', 'SlideShowController');
Route::resource('/admin/danhgia', 'DanhGiaController');
Route::resource('/admin/nhantin', 'NhanTinController');
Route::resource('/admin/nhanvien', 'NhanVienController');
Route::resource('/admin/tin', 'TinController');
Route::resource('/admin/phong', 'PhongController');
Route::resource('/admin/anhmota', 'AnhMoTaController');
Route::resource('/admin/tinnhan', 'TinNhanController');
Route::resource('/admin/thue', 'ThueController');
Route::get('/admin/gia/{idphong}', 'BangGiaController@index');
Route::get('/admin/gia/{idphong}/delete/{id}', 'BangGiaController@destroy');
Route::post('/admin/gia', 'BangGiaController@store');
Route::get('/admin/sendmail/{email?}', 'SendMailController@index');
Route::post('/admin/sendmail', 'SendMailController@sendmail');
Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@doLogin');

/*Ajax*/
Route::get('/ajax/getcity/{idtinh}', 'AjaxController@getCity');
