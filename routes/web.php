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

//customer
Route::middleware('customer')->group(function () {
    Route::get('/logout', 'Home\CustomerController@logout');
    Route::get('/account', 'Home\CustomerController@getAccount');
    Route::get('/review', 'Home\CustomerController@getReview');
    Route::post('/review', 'Home\CustomerController@postReview');
    Route::get('/account/edit', 'Home\CustomerController@getEditAccount');
    Route::post('/account/edit', 'Home\CustomerController@postEditAccount');
    Route::post('/room/reservation', 'Home\HomeController@postReservation');
});

/*home*/
Route::get('/', 'Home\HomeController@index');
Route::get('/about', 'Home\HomeController@getAbout');
Route::get('/contact', 'Home\HomeController@getContact');
Route::get('/news', 'Home\HomeController@getNews');
Route::get('/news/{id}', 'Home\HomeController@getSingleNews');
Route::get('/login', 'Home\CustomerController@getLogin');
Route::post('/login', 'Home\CustomerController@postLogin');
Route::get('/register', 'Home\CustomerController@getRegister');
Route::post('/register', 'Home\CustomerController@postRegister');
Route::get('/room', 'Home\HomeController@getRoom');
Route::get('/room/{id}', 'Home\HomeController@getSingleRoom');
Route::get('/search', 'Home\HomeController@searchRoom');
Route::get('/service', 'Home\HomeController@getService');

//staff
Route::middleware('staff')->group(function () {
    Route::get('/admin/logout', 'AdminController@logout');
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::resource('/admin/khachhang', 'KhachHangController')->only(['index']);
    Route::resource('/admin/vitri', 'ViTriController')->only(['index']);
    Route::resource('/admin/loaiphong', 'LoaiPhongController')->only(['index']);
    Route::resource('/admin/loaitin', 'LoaiTinController')->only(['index']);
    Route::resource('/admin/slideshow', 'SlideShowController')->only(['index']);
    Route::resource('/admin/danhgia', 'DanhGiaController')->only(['index']);
    Route::resource('/admin/nhantin', 'NhanTinController')->only(['index']);
    Route::resource('/admin/tin', 'TinController')->only(['index']);
    Route::resource('/admin/phong', 'PhongController')->only(['index']);
    Route::resource('/admin/anhmota', 'AnhMoTaController')->only(['index']);
    Route::resource('/admin/tinnhan', 'TinNhanController')->only(['index']);
    Route::resource('/admin/thue', 'ThueController')->only(['index', 'edit', 'update']);
    Route::get('/admin/gia/{idphong}', 'BangGiaController@index');
    Route::get('/admin/edit', 'AdminController@getPersonalInformation');
    Route::post('/admin/edit', 'AdminController@postPersonalInformation');
});

//admin
Route::middleware('admin')->group(function () {
    Route::get('/admin/mail/{email?}', 'MailController@index');
    Route::post('/admin/mail', 'MailController@sendMail');
    Route::resource('/admin/tinnhan', 'TinNhanController')->only(['destroy']);
    Route::resource('/admin/phong', 'PhongController')->except(['show']);
    Route::resource('/admin/tin', 'TinController')->except(['show']);
    Route::resource('/admin/nhanvien', 'NhanVienController')->except(['show']);
    Route::resource('/admin/nhantin', 'NhanTinController')->only(['destroy']);
    Route::resource('/admin/danhgia', 'DanhGiaController')->only(['update', 'destroy']);
    Route::resource('/admin/slideshow', 'SlideShowController')->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('/admin/loaitin', 'LoaiTinController')->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('/admin/loaiphong', 'LoaiPhongController')->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('/admin/vitri', 'ViTriController')->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('/admin/khachhang', 'KhachHangController')->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('/admin/thue', 'ThueController')->only(['destroy']);
    Route::get('/admin/gia/{idphong}/delete/{id}', 'BangGiaController@destroy');
    Route::post('/admin/gia', 'BangGiaController@store');
    Route::get('/admin/thongke', 'AdminController@getStatistics');
    Route::post('/admin/ajax/viewChart', 'AjaxController@getView');
    Route::post('/admin/ajax/revenueChart', 'AjaxController@getRevenue');
    Route::post('/admin/ajax/reservationChart', 'AjaxController@getreservation');
});

//Admin login
Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@doLogin');

/*Ajax*/
Route::get('/ajax/getcity/{idtinh}', 'AjaxController@getCity');
