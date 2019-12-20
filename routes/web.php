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
Route::post('/review', 'Home\CustomerController@postReview')->middleware('customer');
Route::get('/account/edit', 'Home\CustomerController@getEditAccount')->middleware('customer');
Route::post('/account/edit', 'Home\CustomerController@postEditAccount')->middleware('customer');
Route::get('/room', 'Home\HomeController@getRoom');
Route::get('/room/{id}', 'Home\HomeController@getSingleRoom');
Route::post('/room/reservation', 'Home\HomeController@postReservation')->middleware('customer');
Route::get('/search', 'Home\HomeController@searchRoom');

/*Admin*/
Route::get('/admin/logout', 'AdminController@logout')->middleware('admin');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::resource('/admin/khachhang', 'KhachHangController')->middleware('admin');
Route::resource('/admin/vitri', 'ViTriController')->middleware('admin');
Route::resource('/admin/loaiphong', 'LoaiPhongController')->middleware('admin');
Route::resource('/admin/loaitin', 'LoaiTinController')->middleware('admin');
Route::resource('/admin/slideshow', 'SlideShowController')->middleware('admin');
Route::resource('/admin/danhgia', 'DanhGiaController')->middleware('admin');
Route::resource('/admin/nhantin', 'NhanTinController')->middleware('admin');
Route::resource('/admin/nhanvien', 'NhanVienController')->middleware('admin');
Route::resource('/admin/tin', 'TinController')->middleware('admin');
Route::resource('/admin/phong', 'PhongController')->middleware('admin');
Route::resource('/admin/anhmota', 'AnhMoTaController')->middleware('admin');
Route::resource('/admin/tinnhan', 'TinNhanController')->middleware('admin');
Route::resource('/admin/thue', 'ThueController')->middleware('admin');
Route::get('/admin/gia/{idphong}', 'BangGiaController@index')->middleware('admin');
Route::get('/admin/gia/{idphong}/delete/{id}', 'BangGiaController@destroy')->middleware('admin');
Route::post('/admin/gia', 'BangGiaController@store')->middleware('admin');
Route::get('/admin/sendmail/{email?}', 'SendMailController@index')->middleware('admin');
Route::post('/admin/sendmail', 'SendMailController@sendmail')->middleware('admin');
Route::get('/admin/thongke', 'AdminController@getStatistics')->middleware('admin');
Route::post('/admin/ajax/viewChart', 'AjaxController@getView')->middleware('admin');
Route::post('/admin/ajax/revenueChart', 'AjaxController@getRevenue')->middleware('admin');
Route::post('/admin/ajax/reservationChart', 'AjaxController@getreservation')->middleware('admin');
Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@doLogin');

/*Ajax*/
Route::get('/ajax/getcity/{idtinh}', 'AjaxController@getCity');
