<?php

namespace App\Http\Controllers;

use App\Danhgia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$danhgias = Danhgia::with('khachhang')->orderBy('created_at', 'desc')->get();

        $count_DanhGia = Danhgia::count();
        return view('layouts.admin.pages.review.review', compact('count_DanhGia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Danhgia $danhgia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $danhgia = Danhgia::find($id);
        if ($danhgia != null) {
            $danhgia->hienthi = !boolval($danhgia->hienthi);
            $danhgia->save();
        }

        return redirect('admin/danhgia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Danhgia $danhgia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhgia = Danhgia::find($id);

        if ($danhgia != null) {
            $danhgia->delete();

            return redirect()->route('danhgia.index')->with('message', array('status' => 'success', 'content' => 'Xóa Đánh giá thành công.'));
        }

        return redirect()->route('danhgia.index')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
    }

    public function ajaxGetReview(Request $request)
    {
        if ($request->ajax()) {
            $danhgias = Danhgia::with('khachhang');
            return DataTables::eloquent($danhgias)
                ->addIndexColumn()
                ->filterColumn('created_at', function($query, $keyword){
                    $sql = 'DATE_FORMAT(created_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('updated_at', function($query, $keyword){
                    $sql = 'DATE_FORMAT(updated_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->editColumn('hienthi', function ($danhgia) {
                    $btn = '<form action="' . route('danhgia.update', $danhgia->id) . '" method="post">' . csrf_field() . method_field('patch');
                    if ($danhgia->hienthi == 1) {
                        $btn .= '<button type="submit" class="btn btn-success">Hiển thị</button>';
                    } else {
                        $btn .= '<button type="submit" class="btn btn-secondary">Ẩn</button>';
                    }
                    return $btn;
                })
                ->editColumn('created_at', function($danhgia){
                    return Carbon::make($danhgia->created_at)->format('d/m/Y');
                })
                ->editColumn('updated_at', function($danhgia){
                    return Carbon::make($danhgia->updated_at)->format('d/m/Y');
                })
                ->addColumn('action', function ($danhgia) {
                    return '<form action="' . route('danhgia.destroy', $danhgia->id) . '" method="post">' . csrf_field() . method_field('delete') . '<button class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa Đánh giá này?\');" type="submit">Xóa</button></form>';
                })
                ->rawColumns(['action', 'hienthi'])
                ->toJson();
        }

        echo 'Bad request';
        die;
    }
}
