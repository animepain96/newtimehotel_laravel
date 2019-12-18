<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function getRegister(){
        return view('layouts.home.pages.register');
    }

    public function postRegister(Request $request){
        $request->validate([
            'tendangnhap' => 'bail|required|min:6|max:20|unique:khachhangs,tendangnhap',
            'hoten' => 'required|max:150',
            'matkhau' => 'required|bail|min:8|max:50',
            'xacnhan' => 'required|bail|min:8|max:50|same:matkhau',
            'email' => ['bail','required','email', Rule::unique('khachhangs', 'email')],
            'ngaysinh' => 'required|date|before_or_equal:2010-01-01',
            'sdt' => ['regex:/^0(1\d{9}|9\d{8})$/'],
            'gioitinh' => 'nullable',
            'tinh' => 'required|integer',
            'thanhpho' => 'required|integer',
            'avatar' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        }
        else{
            $avatar = "";
        }

        $khachhang = new Khachhang([
            'hoten' => $request->get('hoten'),
            'tendangnhap' => $request->get('tendangnhap'),
            'matkhau' => Hash::make($request->get('matkhau')),
            'email' => $request->get('email'),
            'sdt' => $request->get('sdt'),
            'gioitinh' => $request->has('gioitinh'),
            'ngaysinh' => $request->get('ngaysinh'),
            'iditinh' => $request->get('tinh'),
            'idthanhpho' => $request->get('thanhpho'),
            'diachi' => $request->get('diachi'),
            'avatar' => $avatar,
            'kichhoat' => 0,
            'hoatdong' => 0,
        ]);

        $khachhang->save();

        if ($avatar != "") {
            request()->file('avatar')->move(public_path('images/customer'), $avatar);
        }

        return redirect('/login')->with('message', array('status' => 'success', 'content' => 'Đăng kí tài khoản thành công. Vui lòng xác nhận tài khoản của bạn trong email chúng tôi đã gửi.'));
    }
}
