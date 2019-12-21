<?php

namespace App\Http\Controllers;

use App\Danhgia;
use Illuminate\Http\Request;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhgias = Danhgia::with('khachhang')->orderBy('created_at', 'desc')->get();

        return view('layouts.admin.pages.review.review', compact('danhgias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Danhgia  $danhgia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $danhgia = Danhgia::find($id);
        if($danhgia != null){
            $danhgia->hienthi = !boolval($danhgia->hienthi);
            $danhgia->save();
        }

        return  redirect('admin/danhgia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Danhgia  $danhgia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhgia = Danhgia::find($id);

        if($danhgia != null){
            $danhgia->delete();

            return redirect()->route('danhgia.index')->with('message', array('status' => 'success', 'content' => 'Xóa Đánh giá thành công.'));
        }

        return redirect()->route('danhgia.index')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
    }
}
