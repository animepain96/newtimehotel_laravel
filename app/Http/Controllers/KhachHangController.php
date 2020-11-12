<?php

namespace App\Http\Controllers;

use App\Khachhang;
use App\Diachi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$khachhangs = Khachhang::with(['thanhpho', 'tinh'])->orderBy('created_at', 'desc')->get();
        //print_r($khachhangs);
        $count_KhachHang = Khachhang::count();
        $count_KhachMoi = Khachhang::whereMonth('created_at', Carbon::now()->format('m'))->count();
        return view('layouts.admin.pages.customer.customer'/*, compact('khachhangs')*/)->with(['count_KhachHang' => $count_KhachHang, 'count_KhachMoi' => $count_KhachMoi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tinhs = Diachi::where('idtinh', null)->orderBy('ten', 'asc')->get();
        return view('layouts.admin.pages.customer.create', compact('tinhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hoten' => 'required|max:150',
            'tendangnhap' => 'bail|required|min:6|max:20|unique:khachhangs,tendangnhap',
            'matkhau' => 'bail|required|min:8|max:50',
            'email' => 'bail|required|email|unique:khachhangs,email',
            'sdt' => ['nullable', 'regex:/^0(1\d{9}|9\d{8})$/'],
            'ngaysinh' => 'required|before_or_equal:2010-01-01|date_format:d/m/Y',
            'gioitinh' => 'nullable',
            'tinh' => 'required|integer',
            'thanhpho' => 'required|integer',
            'avatar' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000'
        ]);

        $hoten = $request->get('hoten');
        $tendangnhap = $request->get('tendangnhap');
        $matkhau = bcrypt($request->get('matkhau'));
        $email = $request->get('email');
        $sdt = $request->get('sdt');
        $ngaysinh = Carbon::createFromFormat('d/m/Y', $request->get('ngaysinh'));
        $gioitinh = $request->get('gioitinh') == "nam" ? 1 : 0;
        $tinh = $request->get('tinh');
        $thanhpho = $request->get('thanhpho');
        $diachi = $request->get('diachi');
        $hoatdong = $request->has('hoatdong');
        $kichhoat = $request->has('kichhoat');
        if ($request->hasFile('avatar')) {
            $avatar = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        } else {
            $avatar = "";
        }

        $khachhang = new Khachhang([
            'hoten' => $hoten,
            'tendangnhap' => $tendangnhap,
            'matkhau' => $matkhau,
            'email' => $email,
            'sdt' => $sdt,
            'gioitinh' => $gioitinh,
            'ngaysinh' => $ngaysinh,
            'iditinh' => $tinh,
            'idthanhpho' => $thanhpho,
            'diachi' => $diachi,
            'avatar' => $avatar,
            'kichhoat' => $kichhoat,
            'hoatdong' => $hoatdong,
        ]);

        $khachhang->save();

        if ($avatar != "") {
            request()->file('avatar')->move(public_path('images/customer'), $avatar);
        }

        return redirect('admin/khachhang')->with('message', array('status' => 'success', 'content' => 'Thêm Khách hàng thành công.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\KhachHang $khachHang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\KhachHang $khachHang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khachhang = Khachhang::find($id);
        if ($khachhang == null) {
            return redirect('admin/khachhang')->with('message', ['status' => 'danger', 'content' => 'Không thể tìm thấy người dùng.']);
        }
        return view('layouts.admin.pages.customer.edit', compact('khachhang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\KhachHang $khachHang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hoten' => 'required|max:150',
            'matkhau' => 'nullable|bail|min:8|max:50',
            'email' => ['bail', 'required', 'email', Rule::unique('khachhangs', 'email')->ignore($id)],
            'ngaysinh' => 'required|before_or_equal:2010-01-01|date_format:d/m/Y',
            'sdt' => ['nullable', 'regex:/^0(1\d{9}|9\d{8})$/'],
            'gioitinh' => 'nullable',
            'tinh' => 'required|integer',
            'thanhpho' => 'required|integer',
            'avatar' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000'
        ]);

        $hoten = $request->get('hoten');
        $matkhau = $request->get('matkhau') != '' ? Hash::make($request->get('matkhau')) : '';
        $email = $request->get('email');
        $ngaysinh = Carbon::createFromFormat('d/m/Y', $request->get('ngaysinh'));
        $sdt = $request->get('sdt');
        $gioitinh = $request->get('gioitinh') == "nam" ? 1 : 0;
        $tinh = $request->get('tinh');
        $thanhpho = $request->get('thanhpho');
        $diachi = $request->get('diachi');
        $hoatdong = $request->has('hoatdong');
        $kichhoat = $request->has('kichhoat');
        if ($request->hasFile('avatar')) {
            $avatar = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        } else {
            $avatar = '';
        }

        $khachhang = Khachhang::find($id);
        if ($khachhang == null) {
            return redirect('admin/khachhang')->with('message', array('status' => 'danger', 'content' => 'Không thể tìm thấy thông tin khách hàng.'));
        }

        $khachhang->hoten = $hoten;
        if ($matkhau != '') {
            $khachhang->matkhau = $matkhau;
        }
        $khachhang->email = $email;
        $khachhang->ngaysinh = $ngaysinh;
        $khachhang->sdt = $sdt;
        $khachhang->gioitinh = $gioitinh;
        $khachhang->idtinh = $tinh;
        $khachhang->idthanhpho = $thanhpho;
        $khachhang->diachi = $diachi;
        $khachhang->hoatdong = $hoatdong;
        $khachhang->kichhoat = $kichhoat;
        if ($avatar != '') {
            File::delete(public_path('images/customer') . '\\' . $khachhang->avatar);
            request()->file('avatar')->move(public_path('images/customer'), $avatar);
            $khachhang->avatar = $avatar;
        }

        $khachhang->save();

        return redirect('admin/khachhang')->with('message', array('status' => 'success', 'content' => 'Thêm Khách hàng thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\KhachHang $khachHang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khachhang = Khachhang::find($id);
        if ($khachhang == null) {
            return redirect('admin/khachhang')->with('message', ['status' => 'danger', 'content' => 'Không thể tìm thấy người dùng.']);
        }
        File::delete(public_path() . 'images/customer/' . '\\' . $khachhang->avatar);
        $khachhang->delete();
        return redirect('admin/khachhang')->with('message', ['status' => 'success', 'content' => 'Xóa người dùng thành công.']);
    }

    public function ajaxGetCustomer(Request $request)
    {
        if ($request->ajax()) {
            $khachhangs = Khachhang::leftJoin('diachis as thanhpho', 'khachhangs.idthanhpho', '=', 'thanhpho.id')
                ->leftJoin('diachis as tinh', 'khachhangs.idtinh', '=', 'tinh.id')
                ->selectRaw('khachhangs.*');

            return DataTables::eloquent($khachhangs)
                ->addIndexColumn()
                ->filterColumn('ngaysinh', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(ngaysinh, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('gioitinh', function ($query, $keyword) {
                    $q = Str::lower($keyword);
                    if (in_array($q, ['nam', 'nữ'])) {
                        $gt = $q == 'nam' ? 1 : 0;
                        $query->whereRaw('gioitinh = ?', ["{$gt}"]);
                    }
                })
                ->filterColumn('diachi', function ($query, $keyword) {
                    $q = Str::lower($keyword);
                    $query->whereRaw('CONCAT(khachhangs.diachi,"-",thanhpho.ten,"-",tinh.ten) LIKE ?', ["%{$q}%"]);
                })
                ->editColumn('avatar', function ($khachhang) {
                    return '<img class="img-thumbnail" src="' . asset('/images/customer/' . $khachhang->avatar) . '" alt="' . $khachhang->hoten . '">';
                })
                ->editColumn('ngaysinh', function ($khachhang) {
                    if ($khachhang->ngaysinh) {
                        return Carbon::make($khachhang->ngaysinh)->format('d/m/Y');
                    }
                    return null;
                })
                ->editColumn('gioitinh', function ($khachhang) {
                    return ($khachhang->gioitinh ? 'Nam' : 'Nữ');
                })
                ->editColumn('diachi', function ($khachhang) {
                    $diachi = $khachhang->diachi;
                    if ($khachhang->thanhpho) {
                        $diachi .= '-' . $khachhang->thanhpho->ten;
                    }
                    if ($khachhang->tinh) {
                        $diachi .= '-' . $khachhang->tinh->ten;
                    }
                    return $diachi;
                })
                ->editColumn('kichhoat', function ($khachhang) {
                    return '<input type="checkbox" ' . ($khachhang->kichhoat ? 'checked ' : '') . 'disabled>';
                })
                ->editColumn('hoatdong', function ($khachhang) {
                    return '<input type="checkbox" ' . ($khachhang->hoatdong ? 'checked ' : '') . 'disabled>';
                })
                ->addColumn('action', function ($khachhang) {
                    $btn = '<form action="' . route('khachhang.destroy', $khachhang->id) . '" method="post">' . csrf_field() . method_field('delete') . '<button class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa Người dùng này?\');" type="submit">Xóa</button></form>';
                    $btn .= '<a class="btn btn-primary" href="' . route('khachhang.edit', $khachhang->id) . '">Sửa</a>';
                    return $btn;
                })
                ->rawColumns(['avatar', 'action', 'kichhoat', 'hoatdong'])
                ->toJson();
        }
        echo 'Bad request';
        die;
    }
}
