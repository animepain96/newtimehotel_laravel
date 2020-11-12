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
Route::post('/contact', 'TinNhanController@store');
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
Route::get('/active/{activeCode}', 'Home\CustomerController@activeAccount');

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
    Route::get('/admin/invoice/{id}', 'AdminController@getInvoice');
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

});

//Admin login
Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@doLogin');

/*Ajax*/
Route::get('/ajax/getcity/{idtinh}', 'AjaxController@getCity');
Route::group(['middleware' => 'staff'], function(){
    Route::post('/admin/ajax/viewChart', 'AjaxController@getView');
    Route::post('/admin/ajax/revenueChart', 'AjaxController@getRevenue');
    Route::post('/admin/ajax/reservationChart', 'AjaxController@getreservation');
    Route::post('/admin/room/ajaxGetRoom', 'PhongController@ajaxGetRoom')->name('admin.room.ajaxGetRoom');
    Route::post('/admin/reservation/ajaxGetReservation', 'ThueController@ajaxGetReservation')->name('admin.reservation.ajaxGetReservation');
    Route::post('/admin/staff/ajaxGetStaff', 'NhanVienController@ajaxGetStaff')->name('admin.staff.ajaxGetStaff');
    Route::post('/admin/customer/ajaxGetCustomer', 'KhachHangController@ajaxGetCustomer')->name('admin.khachhang.ajaxGetCustomer');
    Route::post('/admin/slideshow/ajaxGetSlideShow', 'SlideShowController@ajaxGetSlideShow')->name('admin.slideshow.ajaxGetSlideShow');
    Route::post('/admin/slideshow/ajaxGetNews', 'TinController@ajaxGetNews')->name('admin.news.ajaxGetNews');
    Route::post('/admin/newsletter/ajaxGetNewsletter', 'NhanTinController@ajaxGetNewsletter')->name('admin.newsletter.ajaxGetNewsletter');
    Route::post('/admin/contact/ajaxGetContact', 'TinNhanController@ajaxGetContact')->name('admin.contact.ajaxGetContact');
    Route::post('/admin/review/ajaxGetReview', 'DanhGiaController@ajaxGetReview')->name('admin.comment.ajaxGetReview');
    Route::post('/admin/roomtype/ajaxGetRoomType', 'LoaiPhongController@ajaxGetRoomType')->name('admin.roomtype.ajaxGetRoomType');
    Route::post('/admin/location/ajaxGetLocation', 'ViTriController@ajaxGetLocation')->name('admin.location.ajaxGetLocation');
    Route::post('/admin/newscategory/ajaxGetNewsCategory', 'LoaiTinController@ajaxGetNewsCategory')->name('admin.newscategory.ajaxGetNewsCategory');
    Route::post('/admin/dashboard/ajaxGetNeedPriceRoom', 'AdminController@ajaxGetNeedPriceRoom')->name('admin.dashboard.ajaxGetNeedPriceRoom');
    Route::post('/admin/dashboard/ajaxGetNewReservation', 'AdminController@ajaxGetNewReservation')->name('admin.dashboard.ajaxGetNewReservation');
});

Route::group(['middleware' => 'customer'], function(){
    Route::post('account/ajaxGetReservation', 'Home\CustomerController@ajaxGetReservation')->name('customer.reservation.ajaxGetReservation');
});

/*Captcha*/
Route::get('/createcaptcha', 'CaptchaController@create');
Route::post('/captcha', 'CaptchaController@captchaValidate');
Route::get('/refreshcaptcha', 'CaptchaController@refreshCaptcha');
