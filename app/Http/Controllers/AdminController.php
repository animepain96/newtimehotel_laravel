<?php

namespace App\Http\Controllers;

use App\Banggia;
use App\Khachhang;
use App\Nhanvien;
use App\Phong;
use App\Thue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{

    public function index()
    {
        $summary['khachmoi'] = Khachhang::whereMonth('created_at', '=', Carbon::now()->month)->count();
        $summary['phieuthuemoi'] = Thue::whereMonth('created_at', '=', Carbon::now()->month)
            ->where('idtrangthai', '!=', 4)
            ->count();
        $summary['doanhthu'] = Thue::selectRaw('sum(datediff(thues.ketthuc,thues.batdau)*gia) as doanhthu')
            ->join('banggias', 'thues.idphong', 'banggias.idphong')
            ->whereMonth('thues.ketthuc', '=', Carbon::now()->month)
            ->where('idtrangthai', '=', 5)
            ->whereRaw('thues.created_at between banggias.batdau and banggias.ketthuc')
            ->first();

        /*$phongthemgias = Phong::with('loaiphong', 'vitri')
            ->whereNotIn('id', Banggia::select('banggias.idphong')
                ->whereRaw('? between batdau and ketthuc', Carbon::now()->format('Y-m-d')))
            ->get();*/
        //$phieuthuemois = Thue::with('khachhang', 'phong')->where('idtrangthai', '=', 1)->get();
        return view('layouts.admin.pages.admin', compact('summary'/*, 'phongthemgias','phieuthuemois'*/));
    }

    public function login()
    {
        $message = session()->get('message');
        return view('layouts.admin.pages.login', compact('message'));
    }

    public function doLogin(Request $request)
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

        if (Auth::guard('nhanvien')->attempt($data)) {
            if (Auth::guard('nhanvien')->user()->hoatdong == 1) {
                return redirect('admin');
            } else {
                Auth::guard('nhanvien')->logout();
                return redirect('admin/login')->with('message', 'Tài khoản tạm khóa. Vui lòng liên hệ Quản trị viên.');
            }
        } else {
            return redirect('admin/login')->with('message', 'Thông tin đăng nhập không chính xác.');
        }
    }

    public function logout()
    {
        Auth::guard('nhanvien')->logout();
        return redirect('admin/login');
    }

    public function getStatistics()
    {
        return view('layouts.admin.pages.statistic');
    }

    public function getPersonalInformation()
    {
        $nhanvien = Auth::guard('nhanvien')->user();
        return view('layouts.admin.pages.profile', compact('nhanvien'));
    }

    public function postPersonalInformation(Request $request)
    {
        if ($request->has('image')) {
            $request->validate([
                'avatar' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);

            $nhanvien = Nhanvien::find(Auth::guard('nhanvien')->user()->id);

            File::delete(public_path('images/staff') . '\\' . $nhanvien->avatar);
            $avatar = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $nhanvien->avatar = $avatar;
            $nhanvien->save();
            request()->file('avatar')->move(public_path('images/staff'), $avatar);

            return redirect('admin/edit')->with('message', array('status' => 'success', 'content' => 'Cập nhật Ảnh đại diện thành công.'));
        } else if ($request->has('password')) {
            $request->validate([
                'matkhau' => 'required|bail|min:8|max:50',
                'matkhaumoi' => 'required|bail|min:8|max:50',
                'xacnhan' => 'same:matkhaumoi',
            ]);

            $nhanvien = Nhanvien::where('id', '=', Auth::guard('nhanvien')->user()->id)
                ->where('matkhau', '=', Hash::make($request->get('matkhau')))
                ->first();

            if ($nhanvien != null) {
                $nhanvien->matkhau = Hash::make($request->get('matkhaumoi'));
                $nhanvien->save();

                return redirect('admin/edit')->with('message', array('status' => 'success', 'content' => 'Cập nhật Mật khẩu thành công.'));
            } else {
                return redirect('admin/edit')->with('message', array('status' => 'danger', 'content' => 'Mật khẩu của bạn không đúng.'));
            }
        }
        return redirect('/admin')->with('message', array('status' => 'danger', 'message' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
    }

    public function getInvoice($id)
    {
        $thue = Thue::selectRaw('khachhangs.*, banggias.gia, thues.*, (datediff(thues.ketthuc, thues.batdau) + 1)*banggias.gia as tongtien')
            ->join('banggias', 'thues.idphong', 'banggias.idphong')
            ->join('khachhangs', 'thues.idkhach', 'khachhangs.id')
            ->where('thues.id', '=', $id)
            ->whereRaw('? between banggias.batdau and banggias.ketthuc', Carbon::now()->format('Y-m-d'))
            ->first();

        if ($thue != null) {
            return view('layouts.admin.pages.invoice', compact('thue'));
        }

        return redirect()->route('thue.index')->with('message', array('status' => 'danger', 'content' => 'Không lấy được thông tin. Vui lòng thử lại.'));
    }

    public function ajaxGetNeedPriceRoom(Request $request)
    {
        if ($request->ajax()) {
            $phongsThemGia = Phong::with('loaiphong', 'vitri')
                ->whereNotIn('phongs.id', Banggia::select('banggias.idphong')
                    ->whereRaw('? between batdau and ketthuc', Carbon::now()->format('Y-m-d')));
            return DataTables::eloquent($phongsThemGia)
                ->filterColumn('created_at', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(created_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('updated_at', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(updated_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->editColumn('hinhdaidien', function ($phong) {
                    return '<img class="img-thumbnail" alt="' . $phong->tenphong . '" src="' . asset('images/room/' . $phong->hinhdaidien) . '">';
                })
                ->editColumn('created_at', function ($thue) {
                    return $thue->created_at->format('d/m/Y');
                })
                ->editColumn('updated_at', function ($thue) {
                    return $thue->updated_at->format('d/m/Y');
                })
                ->addColumn('action', function ($phong) {
                    return '<a href="' . url('admin/gia/' . $phong->id) . '" title="Đến trang cập nhật Giá" class="btn btn-primary">Cập nhật</a>';
                })
                ->rawColumns(['action', 'hinhdaidien'])
                ->toJson();
        }

        echo 'Bad request';
        die;
    }

    public function ajaxGetNewReservation(Request $request)
    {
        if ($request->ajax()) {
            $phieuThueMoi = Thue::with('khachhang', 'phong')->where('idtrangthai', '=', 1);
            return DataTables::eloquent($phieuThueMoi)
                ->addIndexColumn()
                ->filterColumn('created_at', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(created_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('batdau', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(batdau, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('ketthuc', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(ketthuc, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->editColumn('created_at', function ($thue) {
                    return $thue->created_at->format('d/m/Y');
                })
                ->editColumn('batdau', function ($thue) {
                    return Carbon::make($thue->batdau)->format('d/m/Y');
                })
                ->editColumn('ketthuc', function ($thue) {
                    return Carbon::make($thue->ketthuc)->format('d/m/Y');
                })
                ->addColumn('action', function ($thue) {
                    return '<a class="btn btn-primary" title="Cập nhật" href="' . route('thue.edit', $thue->id) . '">Cập nhật</a>';
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        echo 'Bad request';
        die;
    }
}
