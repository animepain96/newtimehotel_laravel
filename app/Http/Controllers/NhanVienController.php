<?php

namespace App\Http\Controllers;

use App\Nhanvien;
use App\Diachi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanviens = Nhanvien::with('tinh', 'thanhpho')->get();
        $message = session()->get('message');
        return view('layouts.admin.pages.staff.staff', compact('nhanviens', 'message'));
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
     * @param  \Illuminate\Http\Request  $request
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
        }
        else{
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
     * @param  \App\Nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nhanvien = Nhanvien::find($id);
        if($nhanvien != null){
            return view('layouts.admin.pages.staff.edit', compact('nhanvien'));
        }

        return redirect('admin/nhanvien')->with('message', ['status' => 'danger', 'content' => 'Không tìm thấy thông tin Nhân viên.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hoten' => 'required|max:150',
            'matkhau' => 'nullable|bail|min:8|max:50',
            'email' => ['bail','required','email', Rule::unique('nhanviens', 'email')->ignore($id)],
            'ngaysinh' => 'required|date_format:d/m/Y|before_or_equal:2010-01-01',
            'sdt' => ['nullable', 'regex:/^0(1\d{9}|9\d{8})$/'],
            'gioitinh' => 'nullable',
            'tinh' => 'required|integer',
            'thanhpho' => 'required|integer',
            'avatar' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000'
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        }
        else{
            $avatar = '';
        }

        $nhanvien = Nhanvien::find($id);
        if($nhanvien == null){
            return redirect('admin/nhanvien')->with('message', array('status' => 'danger', 'content' => 'Không thể tìm thấy thông tin khách hàng.'));
        }

        $nhanvien->hoten = $request->get('hoten');
        if($request->has('matkhau') && $request->get('matkhau') != ''){
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
        if($avatar != ''){
            File::delete(public_path('images/staff').'\\'.$nhanvien->avatar);
            request()->file('avatar')->move(public_path('images/staff'), $avatar);
            $nhanvien->avatar = $avatar;
        }

        $nhanvien->save();

        return redirect('admin/nhanvien')->with('message', array('status' => 'success', 'content' => 'Sửa thông tin Nhân viên thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhanvien = Nhanvien::find($id);
        if($nhanvien == null){
            return redirect('admin/nhanvien')->with('message', ['status' => 'danger', 'content' => 'Không thể tìm thấy thông tin Nhân viên.']);
        }
        File::delete(public_path().'images/staff/'.'\\'.$nhanvien->avatar);
        $nhanvien->delete();
        return redirect('admin/nhanvien')->with('message', ['status' => 'success', 'content' => 'Xóa Nhân viên thành công.']);
    }
}
