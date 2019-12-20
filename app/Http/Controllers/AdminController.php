<?php

namespace App\Http\Controllers;

use App\Banggia;
use App\Khachhang;
use App\Phong;
use App\Thue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $phongthemgias = Phong::with('loaiphong', 'vitri')
            ->whereNotIn('id', Banggia::select('banggias.idphong')
                ->whereRaw('? between batdau and ketthuc', Carbon::now()->format('Y-m-d')))
            ->get();
        $phieuthuemois = Thue::with('khachhang', 'phong')->where('idtrangthai', '=', 1)->get();
        return view('layouts.admin.pages.admin', compact('summary', 'phongthemgias', 'phieuthuemois'));
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
        ]);
        $data = [
            'tendangnhap' => $request->get('tendangnhap'),
            'password' => $request->get('matkhau'),
        ];

        if (Auth::guard('nhanvien')->attempt($data)) {
            return redirect('admin');
        } else {
            return redirect('admin/login')->with('message', 'Thông tin đăng nhập không chính xác.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function getStatistics(){
        return view('layouts.admin.pages.statistic');
    }

}
