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

Route::get('/', function () {
    return view('layouts.home.pages.home');
});
Route::get('/about', function () {
    return view('layouts.home.pages.about');
});
Route::get('/contact', function () {
    return view('layouts.home.pages.contact');
});
Route::get('/news', function () {
    return view('layouts.home.pages.news');
});
Route::get('/news/{id}', function ($id) {
    $tin = \App\Tin::with('nhanvien', 'loaitin')->where('id', '=', $id)->first();
    if($tin != null)
        return view('layouts.home.pages.news-single', compact('tin'));
    else
        return redirect()->back();
});
Route::get('/login', function () {
    return view('layouts.home.pages.login');
});
Route::get('/register', 'Home\CustomerController@getRegister');
Route::post('/register', 'Home\CustomerController@postRegister');
Route::get('/room', function (){
    $rooms = \App\Phong::with('vitri', 'loaiphong')
        ->join('banggias', 'phongs.id', 'banggias.idphong')
        ->whereIn('phongs.id', \App\Banggia::whereRaw('? between batdau and ketthuc', \Carbon\Carbon::now()->format('Y-m-d'))->get()->pluck('idphong'))
        ->paginate(6);
    return view('layouts.home.pages.room', compact('rooms'));
});

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
Route::get('/ajax/getcity/{idtinh}', 'AjaxController@getCity');
Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@doLogin');
