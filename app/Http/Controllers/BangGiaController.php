<?php

namespace App\Http\Controllers;

use App\Banggia;
use App\Phong;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BangGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($idphong)
    {
        if (is_numeric($idphong) && $idphong > 0) {
            $phong = Phong::with('loaiphong')->where('id', '=', $idphong)->first();
            if ($phong != null) {
                $message = session()->get('message');
                $banggias = Banggia::where('idphong', '=', $phong->id)->orderBy('ketthuc', 'desc')->get();
                return view('layouts.admin.pages.price.price', compact('banggias', 'phong', 'message'));
            }
        }
        return view('layouts.admin.pages.price.price');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'idphong' => 'integer|required|gt:0',
            'gia' => 'numeric|required|gt:0',
            'batdau' => 'required|date_format:d/m/Y',
            'ketthuc' => 'required|date_format:d/m/Y|after_or_equal:batdau',
            'ghichu' => 'nullable|string|max:500',
        ]);

        $batdau = Carbon::createFromFormat('d/m/Y', $request->get('batdau'));
        $ketthuc = Carbon::createFromFormat('d/m/Y', $request->get('ketthuc'));

        $is_valid = Banggia::where('idphong', '=', $request->get('idphong'))
            ->where(function($query) use ($batdau, $ketthuc){
                $query->orwhere(function($query) use ($batdau){
                    $query->where('batdau', '<=', $batdau)->where('ketthuc', '>=', $batdau);
                })->orwhere(function($query) use ($ketthuc){
                    $query->where('batdau', '<=', $ketthuc)->where('ketthuc', '>=', $ketthuc);
                })->orwhere(function($query) use ($batdau, $ketthuc){
                    $query->where('batdau', '>=', $batdau)->where('ketthuc', '<=', $ketthuc);
                });
            })
            ->get();
        if(count($is_valid) > 0){
            return redirect('admin/gia/'.$request->get('idphong'))->with('message', array('status' => 'danger', 'content' => 'Thời gian áp dụng không hợp lệ. Vui lòng kiểm tra lại.'));
        }

        $banggia = new Banggia([
            'idphong' => $request->get('idphong'),
            'gia' => $request->get('gia'),
            'batdau' => Carbon::createFromFormat('d/m/Y', $request->get('batdau')),
            'ketthuc' => Carbon::createFromFormat('d/m/Y', $request->get('ketthuc')),
            'ghichu' => $request->get('ghichu'),
        ]);

        $banggia->save();

        return redirect('admin/gia/'.$request->get('idphong'))->with('message', array('status' => 'success', 'content' => 'Thêm Giá thành công.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Banggia $banggia
     * @return \Illuminate\Http\Response
     */
    public function show(Banggia $banggia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Banggia $banggia
     * @return \Illuminate\Http\Response
     */
    public function edit(Banggia $banggia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Banggia $banggia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banggia $banggia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Banggia $banggia
     * @return \Illuminate\Http\Response
     */
    public function destroy($idphong, $id)
    {
        if(is_numeric($idphong) && is_numeric($id)){
            $banggia = Banggia::where('id', '=', $id)->where('idphong', '=', $idphong)->first();
            if($banggia != null){
                $banggia->delete();
                return redirect('admin/gia/'.$idphong)->with('message', array('status' => 'success', 'content' => 'Xóa Giá thành công.'));
            }
        }
        return url()->previous();
    }
}
