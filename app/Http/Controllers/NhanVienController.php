<?php

namespace App\Http\Controllers;

use App\Nhanvien;
use App\Diachi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$nhanviens = Nhanvien::with('tinh', 'thanhpho')->get();
        return view('layouts.admin.pages.staff.staff'/*, compact('nhanviens')*/)->with('count_NhanVien', Nhanvien::count());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tinhs = Diachi::where('idtinh', null)->orderBy('ten', 'asc')->get();
        return view('layouts.admin.pages.staff.create', compact('tinhs'));
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
            'ngaysinh' => 'required|before_or_equal:2010-01-01|date_format:d/m/Y',
            'sdt' => ['nullable', 'regex:/^0(1\d{9}|9\d{8})$/'],
            'gioitinh' => 'nullable',
            'hoatdong' => 'nullable',
            'tinh' => 'required|integer',
            'thanhpho' => 'required|integer',
            'avatar' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000'
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        } else {
            $avatar = "";
        }

        $nhanvien = new Nhanvien([
            'hoten' => $request->get('hoten'),
            'tendangnhap' => $request->get('tendangnhap'),
            'matkhau' => Hash::make($request->get('matkhau')),
            'email' => $request->get('email'),
            'ngaysinh' => Carbon::createFromFormat('d/m/Y', $request->get('ngaysinh')),
            'sdt' => $request->get('sdt'),
            'gioitinh' => $request->get('gioitinh') == 'nam' ? 1 : 0,
            'hoatdong' => $request->has('hoatdong'),
            'idtinh' => $request->get('tinh'),
            'idthanhpho' => $request->get('thanhpho'),
            'avatar' => $avatar
        ]);

        if ($avatar != "") {
            request()->file('avatar')->move(public_path('images/staff'), $avatar);
        }

        $nhanvien->save();

        return redirect()->route('nhanvien.index')->with('message', array('status' => 'success', 'content' => 'Thêm Nhân viên thành công.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Nhanvien $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Nhanvien $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nhanvien = Nhanvien::find($id);
        if ($nhanvien != null && $nhanvien->isAdmin != 1) {
            return view('layouts.admin.pages.staff.edit', compact('nhanvien'));
        }

        return redirect('admin/nhanvien')->with('message', ['status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Nhanvien $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hoten' => 'required|max:150',
            'matkhau' => 'nullable|bail|min:8|max:50',
            'email' => ['bail', 'required', 'email', Rule::unique('nhanviens', 'email')->ignore($id)],
            'ngaysinh' => 'required|date_format:d/m/Y|before_or_equal:2010-01-01',
            'sdt' => ['nullable', 'regex:/^0(1\d{9}|9\d{8})$/'],
            'gioitinh' => 'nullable',
            'tinh' => 'required|integer',
            'thanhpho' => 'required|integer',
            'avatar' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000'
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        } else {
            $avatar = '';
        }

        $nhanvien = Nhanvien::find($id);
        if ($nhanvien == null || $nhanvien->isAdmin == 1) {
            return redirect('admin/nhanvien')->with('message', array('status' => 'danger', 'content' => 'Không thể tìm thấy thông tin khách hàng.'));
        }

        $nhanvien->hoten = $request->get('hoten');
        if ($request->has('matkhau') && $request->get('matkhau') != '') {
            $nhanvien->matkhau = Hash::make($request->get('matkhau'));
        }
        $nhanvien->email = $request->get('email');
        $nhanvien->ngaysinh = Carbon::createFromFormat('d/m/Y', $request->get('ngaysinh'));
        $nhanvien->sdt = $request->get('sdt');
        $nhanvien->gioitinh = $request->get('gioitinh') == "nam" ? 1 : 0;
        $nhanvien->idtinh = $request->get('tinh');
        $nhanvien->idthanhpho = $request->get('thanhpho');
        $nhanvien->diachi = $request->get('diachi');
        $nhanvien->hoatdong = $request->has('hoatdong');
        if ($avatar != '') {
            File::delete(public_path('images/staff') . '\\' . $nhanvien->avatar);
            request()->file('avatar')->move(public_path('images/staff'), $avatar);
            $nhanvien->avatar = $avatar;
        }

        $nhanvien->save();

        return redirect('admin/nhanvien')->with('message', array('status' => 'success', 'content' => 'Cập nhật Nhân viên thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Nhanvien $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhanvien = Nhanvien::find($id);
        if ($nhanvien == null || $nhanvien->isAdmin == 1) {
            return redirect('admin/nhanvien')->with('message', ['status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.']);
        }
        File::delete(public_path() . 'images/staff/' . '\\' . $nhanvien->avatar);
        $nhanvien->delete();
        return redirect('admin/nhanvien')->with('message', ['status' => 'success', 'content' => 'Xóa Nhân viên thành công.']);
    }

    public function ajaxGetStaff(Request $request)
    {
        if ($request->ajax()) {
            $nhanviens = Nhanvien::leftJoin('diachis as thanhpho', 'nhanviens.idthanhpho', '=', 'thanhpho.id')
                ->leftJoin('diachis as tinh', 'nhanviens.idtinh', '=', 'tinh.id')
                ->selectRaw('nhanviens.*');

            return DataTables::eloquent($nhanviens)
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
                ->filterColumn('hoatdong', function ($query, $keyword) {
                    $q = Str::lower($keyword);
                    if (in_array($q, ['hoạt động', 'không hoạt động'])) {
                        $hd = $q == 'hoạt động' ? 1 : 0;
                        $query->whereRaw('hoatdong = ?', ["{$hd}"]);
                    }
                })
                ->filterColumn('diachi', function ($query, $keyword) {
                    $q = Str::lower($keyword);
                    $query->whereRaw('CONCAT(nhanviens.diachi,"-",thanhpho.ten,"-",tinh.ten) LIKE ?', ["%{$q}%"]);
                })
                ->editColumn('avatar', function ($nhanvien) {
                    return '<img class="img-thumbnail" src="' . asset('images/staff/' . $nhanvien->avatar) . '" alt="' . $nhanvien->hoten . '">';
                })
                ->editColumn('ngaysinh', function ($nhanvien) {
                    return $nhanvien->ngaysinh ? Carbon::make($nhanvien->ngaysinh)->format('d/m/Y') : '';
                })
                ->editColumn('gioitinh', function ($nhanvien) {
                    return $nhanvien->gioitinh ? 'Nam' : 'Nữ';
                })
                ->editColumn('hoatdong', function ($nhanvien) {
                    return '<input type="checkbox"' . ($nhanvien->hoatdong ? 'checked' : '') . ' disabled>';
                })
                ->editColumn('diachi', function ($nhanvien) {
                    $diachi = $nhanvien->diachi;
                    if ($nhanvien->thanhpho) {
                        $diachi .= '-' . $nhanvien->thanhpho->ten;
                    }
                    if ($nhanvien->tinh) {
                        $diachi .= '-' . $nhanvien->tinh->ten;
                    }
                    return $diachi;
                })
                ->addColumn('action', function ($nhanvien) {
                    $btn = '';
                    if ($nhanvien->isAdmin !== 1) {
                        $btn .= '<form action="' . route('nhanvien.destroy', $nhanvien->id) . '" method="post">' . csrf_field() . method_field('delete') . '<button class="btn btn-danger"onclick="return confirm(\'Bạn có chắc chắn muốn xóa Nhân viên này?\');" type="submit">Xóa</button></form>';
                        $btn .= '<a class="btn btn-primary" href="' . route('nhanvien.edit', $nhanvien->id) . '">Sửa</a>';
                    }
                    return $btn;
                })
                ->rawColumns(['avatar', 'action', 'hoatdong'])
                ->toJson();
        }

        echo 'Bad request';
        die;
    }
}
