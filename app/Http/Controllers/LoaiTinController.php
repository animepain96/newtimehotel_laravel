<?php

namespace App\Http\Controllers;

use App\Loaitin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LoaiTinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$loaitins = Loaitin::all();
        $count_LoaiTin = Loaitin::count();
        return view('layouts.admin.pages.newscategory.newscategory', compact(/*'loaitins'*/ 'count_LoaiTin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.pages.newscategory.create');
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
            'ten' => 'required|max:250',
            'mota' => 'nullable|max:500',
        ]);

        $loaitin = new Loaitin([
            'ten' => $request->get('ten'),
            'mota' => $request->get('mota'),
        ]);

        $loaitin->save();

        return redirect('admin/loaitin')->with('message', array('status' => 'success', 'content' => 'Thêm Loại tin thành công.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Loaitin $loaitin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Loaitin $loaitin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaitin = Loaitin::find($id);
        if ($loaitin != null) {
            return view('layouts.admin.pages.newscategory.edit', compact('loaitin'));
        }
        return redirect('admin/loaitin')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Loaitin $loaitin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required|max:250',
            'mota' => 'nullable|max:500',
        ]);

        $loaitin = Loaitin::find($id);
        if ($loaitin != null) {
            $loaitin->ten = $request->get('ten');
            $loaitin->mota = $request->get('mota');

            $loaitin->save();
            return redirect('admin/loaitin')->with('message', array('status' => 'success', 'content' => 'Cập nhật Loại tin thành công.'));
        }

        return redirect('admin/loaitin')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Loaitin $loaitin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaitin = Loaitin::find($id);
        if ($loaitin != null) {
            $loaitin->delete();

            return redirect('admin/loaitin')->with('message', array('status' => 'success', 'content' => 'Xóa Loại tin thành công.'));
        }

        return redirect('admin/loaitin')->with('message', array('status' => 'danger', 'content' => 'Không thể lấy thông tin. Vui lòng thử lại sau.'));
    }

    public function ajaxGetNewsCategory(Request $request)
    {
        if ($request->ajax()) {
            $loaitins = Loaitin::query();
            return DataTables::eloquent($loaitins)
                ->filterColumn('created_at', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(created_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->filterColumn('updated_at', function ($query, $keyword) {
                    $sql = 'DATE_FORMAT(updated_at, "%d/%m/%Y") LIKE ?';
                    $query->whereRaw($sql, ["{$keyword}%"]);
                })
                ->editColumn('created_at', function($loaitin){
                    return $loaitin->created_at->format('d/m/Y');
                })
                ->editColumn('updated_at', function($loaitin){
                    return $loaitin->updated_at->format('d/m/Y');
                })
                ->editColumn('action', function ($loaitin) {
                    $btn = '<form action="' . route('loaitin.destroy', $loaitin->id) . '" method="post">' . csrf_field() . method_field('delete') . '<button class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa Loại tin này?\');" type="submit">Xóa</button></form>';
                    $btn .= '<a class="btn btn-primary" href="' . route('loaitin.edit', $loaitin->id) . '">Sửa</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        echo 'Bad request';
        die;
    }
}
