<?php

namespace App\Http\Controllers\Home;

use App\Danhgia;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Khachhang;
use App\Kichhoat;
use App\Thue;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function getRegister()
    {
        return view('layouts.home.pages.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'tendangnhap' => 'bail|required|min:6|max:20|unique:khachhangs,tendangnhap',
            'hoten' => 'required|max:150',
            'matkhau' => 'required|bail|min:8|max:50',
            'xacnhan' => 'required|bail|min:8|max:50|same:matkhau',
            'email' => ['bail', 'required', 'email', Rule::unique('khachhangs', 'email')],
            'ngaysinh' => 'required|date|before_or_equal:2010-01-01',
            'sdt' => ['regex:/^0(1\d{9}|9\d{8})$/'],
            'gioitinh' => 'nullable',
            'tinh' => 'required|integer',
            'thanhpho' => 'required|integer',
            'avatar' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'captcha' => 'required|captcha',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        } else {
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

        $kichhoat = new Kichhoat([
            'idkhachhang' => $khachhang->id,
            'makichhoat' => Str::uuid()->toString(),
        ]);

        $kichhoat->save();

        MailController::sendActiveMail($khachhang, $kichhoat->makichhoat);

        if ($avatar != "") {
            request()->file('avatar')->move(public_path('images/customer'), $avatar);
        }

        return redirect('/login')->with('message', array('status' => 'success', 'content' => 'Đăng kí tài khoản thành công. Vui lòng xác nhận tài khoản của bạn trong email chúng tôi đã gửi.'));
    }

    public function getLogin()
    {
        return view('layouts.home.pages.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'tendangnhap' => 'required|string|max:50',
            'matkhau' => 'required|string|max:100',
            'captcha' => 'required|captcha',
        ]);
        $data = [
            'tendangnhap' => $request->get('tendangnhap'),
            'password' => $request->get('matkhau'),
        ];

        if (Auth::guard('khachhang')->attempt($data)) {
            if (Auth::guard('khachhang')->user()->kichhoat == 1) {
                if (Auth::guard('khachhang')->user()->hoatdong == 1) {
                    return redirect('/');
                } else {
                    Auth::guard('khachhang')->logout();
                    return redirect('/login')->with('message', array('status' => 'danger', 'content' => 'Tài khoản của bạn bị tạm ngưng. Vui lòng liên hệ hỗ trợ.'));
                }
            } else {
                Auth::guard('khachhang')->logout();
                return redirect('/login')->with('message', array('status' => 'danger', 'content' => 'Vui lòng kích hoạt tài khoản của bạn.'));
            }
        } else {
            return redirect('/login')->with('message', array('status' => 'danger', 'content' => 'Thông tin đăng nhập không chính xác.'));
        }
    }

    public function logout()
    {
        Auth::guard('khachhang')->logout();
        return redirect('/');
    }

    public function getAccount()
    {
        $khachhang = Khachhang::find(Auth::guard('khachhang')->user()->id);
        if ($khachhang != null) {
            $thues = Thue::with('phong', 'khachhang')
                ->where('idkhach', '=', $khachhang->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            return view('layouts.home.pages.account', compact('khachhang', 'thues'));
        }
    }

    public function getReview()
    {
        return view('layouts.home.pages.review');
    }

    public function postReview(Request $request)
    {
        $request->validate(
            [
                'noidung' => 'required|string|min:50|max:500',
            ]);

        $danhgia = new Danhgia([
            'idkhachhang' => Auth::guard('khachhang')->user()->id,
            'noidung' => $request->get('noidung'),
            'hienthi' => 0,
        ]);

        $danhgia->save();

        return redirect('review')->with('message', array('status' => 'success', 'content' => 'Gửi đánh giá thành công.'));
    }

    public function getEditAccount()
    {
        $khachhang = Khachhang::find(Auth::guard('khachhang')->user()->id);
        return view('layouts.home.pages.edit_account', compact('khachhang'));
    }

    public function postEditAccount(Request $request)
    {
        if ($request->has('password')) {
            $request->validate([
                'matkhau' => 'bail|required|min:8|max:50',
                'matkhaumoi' => 'bail|required|min:8|max:50',
                'xacnhan' => 'same:matkhaumoi',
            ]);

            $khachhang = Khachhang::where('id', '=', Auth::guard('khachhang')->user()->id)
                ->where('matkhau', '=', Hash::make($request->get('matkhau')))->first();
            if ($khachhang != null) {
                $khachhang->matkhau = Hash::make($request->get('matkhaumoi'));
                $khachhang->save();

                return redirect('/account/edit')
                    ->with('message', array('status' => 'success', 'content' => 'Cập nhật Mật khẩu thành công.'));
            }
        } else if ($request->has('profile')) {
            $request->validate([
                'hoten' => 'required|max:150',
                'ngaysinh' => 'required|before_or_equal:2010-01-01|date_format:d/m/Y',
                'sdt' => ['nullable', 'regex:/^0(1\d{9}|9\d{8})$/'],
                'gioitinh' => 'nullable',
                'diachi' => 'required|string|max:250',
                'tinh' => 'required|integer|gt:0',
                'thanhpho' => 'required|integer|gt:0',
            ]);

            $khachhang = Khachhang::where('id', '=', Auth::guard('khachhang')->user()->id)->first();
            if ($khachhang != null) {
                $khachhang->hoten = $request->get('hoten');
                $khachhang->ngaysinh = Carbon::createFromFormat('d/m/Y', $request->get('ngaysinh'))->format('Y-m-d');
                $khachhang->sdt = $request->get('sdt');
                $khachhang->gioitinh = $request->has('gioitinh') ? 1 : 0;
                $khachhang->diachi = $request->get('diachi');
                $khachhang->idtinh = $request->get('tinh');
                $khachhang->idthanhpho = $request->get('thanhpho');
                $khachhang->save();

                return redirect('/account/edit')
                    ->with('message', array('status' => 'success', 'content' => 'Cập nhật Thông tin cá nhân thành công.'));
            }
        } else if ($request->has('avatar')) {
            $request->validate([
                'avatar' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);
            $khachhang = Khachhang::where('id', '=', Auth::guard('khachhang')->user()->id)->first();
            if ($khachhang != null) {
                if ($request->hasFile('avatar')) {
                    $avatar = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
                } else {
                    $avatar = "";
                }
                if ($avatar != "") {
                    File::delete(public_path('images/customer') . '\\' . $khachhang->avatar);
                    request()->file('avatar')->move(public_path('images/customer'), $avatar);
                    $khachhang->avatar = $avatar;
                    $khachhang->save();

                    return redirect('/account')->with('message', array('status' => 'success', 'content' => 'Cập nhật Ảnh thành công.'));
                }
            }

        }

        return view('layouts.home.pages.edit_account', compact('khachhang'));
    }

    public function activeAccount($activeCode)
    {
        $kichhoat = Kichhoat::where('makichhoat', '=', $activeCode)->first();
        if ($kichhoat != null) {
            $khachhang = Khachhang::find($kichhoat->idkhachhang);
            if ($khachhang != null) {
                $khachhang->kichhoat = 1;
                $khachhang->hoatdong = 1;
                $khachhang->save();

                $kichhoat->delete();

                return redirect('/login')->with('message', array('status' => 'success', 'content' => 'Kích hoạt tài khoản thành công. Vui lòng đăng nhập.'));
            }
        }

        return redirect('/login')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau hoặc gửi tin nhắn cho chúng tôi.'));
    }
}
